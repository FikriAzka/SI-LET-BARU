<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Irs;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class IRSController extends Controller
{
// public function submitIRS(Request $request)
// {
//     $mhs = Mahasiswa::where('user_id',  Auth::user()->id)->first();
//     Log::info('IRS Submission Request:', $request->all());

//     try {
        // $check = Irs::where('nim', $mhs->nim)
        // ->where('jadwal_id', $request->jadwal_id)
        // ->where('semester', $mhs->semester)
        // ->first();
        // if(is_null($check)){
        //     $irs = Irs::create([
        //         'nim' => $mhs->nim, 
        //         'jadwal_id' => intval($request->jadwal_id),
        //         'semester' => $mhs->semester,
        //         'prioritas' => 1,
        //         'status' => 'pending'
        //     ]);
            
        //     Log::info('IRS Submission Successful', ['irs_id' => $irs->id]);
    
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Rencana Studi berhasil disimpan',
        //         'irs_id' => $irs->id
        //     ]);
        // } else{
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Rencana Studi berhasil disimpan',
        //         'irs_id' => $check->id
        //     ]);
        // }

//     } catch (\Illuminate\Validation\ValidationException $e) {
//         // Handle validation errors
//         DB::rollBack();
        
//         // Log validation errors
//         Log::error('IRS Submission Validation Error', [
//             'errors' => $e->errors(),
//             'request' => $request->all()
//         ]);

//         return response()->json([
//             'success' => false,
//             'message' => $e->errors()
//         ], 422);
//     } catch (\Exception $e) {
//         // Rollback the transaction in case of error
//         DB::rollBack();

//         // Log the error with full details
//         Log::error('IRS Submission Error', [
//             'message' => $e->getMessage(),
//             'trace' => $e->getTraceAsString(),
//             'request' => $request->all()
//         ]);

//         return response()->json([
//             'success' => false,
//             'message' => 'Gagal menyimpan Rencana Studi: ' . $e->getMessage()
//         ], 500);
//     }
// }
// public function submitIRS(Request $request)
// {
//     $mhs = Mahasiswa::where('user_id', Auth::user()->id)->first();
//     Log::info('IRS Submission Request:', $request->all());

//     try {
//         $check = Irs::where('nim', $mhs->nim)
//             ->where('jadwal_id', $request->jadwal_id)
//             ->where('semester', $mhs->semester)
//             ->first();

//         // Jika data sudah ada, kembalikan response sukses
//         if (!is_null($check)) {
//             return response()->json([
//                 'success' => true,
//                 'message' => 'Rencana Studi berhasil disimpan',
//                 'irs_id' => $check->id
//             ]);
//         }

//         // Tentukan prioritas berdasarkan kriteria
//         $jadwal = Jadwal::find($request->jadwal_id);
//         if (!$jadwal) {
//             return response()->json(['success' => false, 'message' => 'Jadwal tidak ditemukan.'], 404);
//         }

//         $prioritas = $this->tentukanPrioritas($mhs, $jadwal);

//         // Simpan data IRS
//         $irs = Irs::create([
//             'nim' => $mhs->nim,
//             'jadwal_id' => intval($request->jadwal_id),
//             'semester' => $mhs->semester,
//             'prioritas' => $prioritas,
//             'status' => 'pending'
//         ]);

//         Log::info('IRS Submission Successful', ['irs_id' => $irs->id]);

//         return response()->json([
//             'success' => true,
//             'message' => 'Rencana Studi berhasil disimpan',
//             'irs_id' => $irs->id
//         ]);
//     } catch (\Illuminate\Validation\ValidationException $e) {
//         DB::rollBack();

//         Log::error('IRS Submission Validation Error', [
//             'errors' => $e->errors(),
//             'request' => $request->all()
//         ]);

//         return response()->json([
//             'success' => false,
//             'message' => $e->errors()
//         ], 422);
//     } catch (\Exception $e) {
//         DB::rollBack();

//         Log::error('IRS Submission Error', [
//             'message' => $e->getMessage(),
//             'trace' => $e->getTraceAsString(),
//             'request' => $request->all()
//         ]);

//         return response()->json([
//             'success' => false,
//             'message' => 'Gagal menyimpan Rencana Studi: ' . $e->getMessage()
//         ], 500);
//     }
// }

// /**
//  * Tentukan prioritas berdasarkan kriteria.
//  */
private function tentukanPrioritas($mahasiswa, $jadwal)
{
    // Validasi data
    if (!isset($mahasiswa->nim, $mahasiswa->semester, $jadwal->id, $jadwal->semester)) {
        throw new \InvalidArgumentException('Data mahasiswa atau jadwal tidak valid.');
    }

    // Mahasiswa Baru: Mata kuliah di semester mereka
    if ($mahasiswa->semester == $jadwal->semester) {
        return 1;
    }

    // Mahasiswa Semester Atas Belum Mengambil
    $irsSebelumnya = Irs::where('nim', $mahasiswa->nim)
        ->where('jadwal_id', $jadwal->id)
        ->first();

    if (is_null($irsSebelumnya) && $mahasiswa->semester > $jadwal->semester) {
        return 2;
    }

    // Mahasiswa Mengulang
    if ($irsSebelumnya && $irsSebelumnya->status_lulus == 'tidak lulus') {
        return 3;
    }

    // Mahasiswa Perbaikan
    if ($irsSebelumnya && $irsSebelumnya->status_lulus == 'lulus' && $irsSebelumnya->nilai < 60) {
        return 4;
    }

    // Mahasiswa Mengambil Semester Atas
    if ($mahasiswa->semester < $jadwal->semester) {
        return 5;
    }

    // Default Prioritas Terendah
    return 10;
}


public function submitIRS(Request $request)
    {
        $mhs = Mahasiswa::where('user_id', Auth::user()->id)->first();
        Log::info('IRS Submission Request:', $request->all());

        try {
            // Cek jadwal
            $jadwal = Jadwal::find($request->jadwal_id);
            if (!$jadwal) {
                return response()->json(['success' => false, 'message' => 'Jadwal tidak ditemukan.'], 404);
            }

            // Cek apakah mahasiswa sudah mengambil jadwal ini
            $check = Irs::where('nim', $mhs->nim)
                ->where('jadwal_id', $request->jadwal_id)
                ->where('semester', $mhs->semester)
                ->first();

            if (!is_null($check)) {
                // Jika mahasiswa sudah mengambil, langsung kembalikan respons
                return response()->json([
                    'success' => true,
                    'message' => 'Rencana Studi berhasil disimpan',
                    'irs_id' => $check->id
                ]);
            }

            // Tentukan prioritas mahasiswa baru
            $prioritasBaru = $this->tentukanPrioritas($mhs, $jadwal);

            // Ambil semua IRS pada jadwal tersebut
            $irsPadaJadwal = Irs::where('jadwal_id', $jadwal->id)->orderBy('prioritas', 'asc')->get();

            // Cek apakah kuota kelas penuh
            if ($irsPadaJadwal->count() >= $jadwal->kuota_kelas) {
                // Cari mahasiswa dengan prioritas terendah
                $irsPrioritasTerendah = $irsPadaJadwal->last();

                if ($prioritasBaru < $irsPrioritasTerendah->prioritas) {
                    // Hapus mahasiswa dengan prioritas terendah
                    $irsPrioritasTerendah->delete();
                    Log::info('Menghapus mahasiswa prioritas lebih rendah', ['irs_id' => $irsPrioritasTerendah->id]);
                } else {
                    // Tolak pengajuan jika prioritas lebih rendah
                    return response()->json([
                        'success' => false,
                        'message' => 'Kuota kelas penuh. Prioritas Anda lebih rendah daripada mahasiswa lain di kelas ini.'
                    ], 400);
                }
            }
            // Generate random nilai
            $nilai = rand(0, 100);

            // Tentukan status_lulus berdasarkan nilai
            $statusLulus = ($nilai >= 60) ? 'lulus' : 'tidak lulus';
            // Tambahkan mahasiswa baru
            $irs = Irs::create([
                'nim' => $mhs->nim,
                'jadwal_id' => $jadwal->id,
                'semester' => $mhs->semester,
                'prioritas' => $prioritasBaru,
                'status' => 'pending',
                'status_lulus' => $statusLulus, // Tentukan status lulus berdasarkan nilai
                'nilai' => $nilai, 
            ]);

            Log::info('IRS Submission Successful', ['irs_id' => $irs->id]);

            return response()->json([
                'success' => true,
                'message' => 'Rencana Studi berhasil disimpan.',
                'irs_id' => $irs->id
            ]);
        } catch (\Exception $e) {
            Log::error('IRS Submission Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan Rencana Studi: ' . $e->getMessage()
            ], 500);
        }
    }
    public function destroy($id)
    {
        try {
            $irs = IRS::findOrFail($id);
            $irs->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error deleting IRS: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data.'], 500);
        }
    }

    




}