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
public function approveIrs(Request $request)
{
    $nim = $request->input('nim');
    // Cari IRS mahasiswa berdasarkan NIM
    $irs = Irs::where('nim', $nim)->update(['status' => 'approved']);

    if ($irs) {
        return response()->json(['success' => true, 'message' => 'IRS berhasil disetujui']);
    } else {
        return response()->json(['success' => false, 'message' => 'Gagal menyetujui IRS']);
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

public function lihatIRS()
{
    try {
        $mahasiswa = Auth::user()->mahasiswa;
        
        // Debug info
        Log::info('Accessing lihatIRS', [
            'user_id' => Auth::user()->id,
            'mahasiswa' => $mahasiswa->toArray()
        ]);
        
        $irsList = [];
        
        // Query IRS for debugging
        $allIrs = Irs::where('nim', $mahasiswa->nim)->get();
        Log::info('All IRS Data:', ['count' => $allIrs->count(), 'data' => $allIrs->toArray()]);
        
        for ($i = 1; $i <= 8; $i++) {
            $query = Irs::where('nim', $mahasiswa->nim)
                       ->where('semester', $i)
                       ->with(['jadwal.mataKuliah', 'jadwal.dosen']);
                       
            Log::info("Query for semester $i", ['sql' => $query->toSql(), 'bindings' => $query->getBindings()]);
            
            $irsList[$i] = $query->get();
            
            Log::info("Data for semester $i", ['count' => $irsList[$i]->count()]);
        }
        
        return view('mahasiswa.indexlihatIRSMahasiswa', compact('irsList'));
        
    } catch (\Exception $e) {
        Log::error('Error in lihatIRS', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        
        return back()->with('error', 'Terjadi kesalahan saat mengambil data IRS.');
    }
}

public function getIRSData()
{
    $mahasiswa = Auth::user(); // Ambil mahasiswa yang sedang login
    $irsData = IRS::where('mahasiswa_id', $mahasiswa->id)
        ->with('mataKuliah') // Eager load relasi mata kuliah
        ->get();

    return response()->json($irsData);
}
public function printIRS($semester)
{
    $mahasiswa = Auth::user()->mahasiswa->load([
        'programStudi',
        'doswal.dosen'
    ]);
    
    $irsData = Irs::where('nim', $mahasiswa->nim)
        ->where('semester', $semester)
        ->where('status', 'approved')
        ->with([
            'jadwal',
            'jadwal.mataKuliah',
            'jadwal.dosen'
        ])
        ->get();
            
    $semesterLabel = $semester % 2 == 1 ? 'Ganjil' : 'Genap';
    $tahunAkademik = '2024/2025';
        
    return view('mahasiswa.print_irs', compact(
        'mahasiswa',
        'irsData',
        'semester',
        'tahunAkademik',
        'semesterLabel'
    ));
}
}