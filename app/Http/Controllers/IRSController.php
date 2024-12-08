<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\Irs;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IRSController extends Controller
{
    // Menampilkan form untuk membuat IRS
    // public function create()
    // {
    //     return view('irs.create');
    // }

    // // Menyimpan IRS yang telah dibuat
    // public function store(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'nim' => 'required|exists:mahasiswas,nim',
    //         'semester' => 'required|integer',
    //         'kode_mk' => 'required|string',
    //         'nama_mk' => 'required|string',
    //         'kelas' => 'required|string',
    //         'sks' => 'required|integer',
    //         'tanggal_pengajuan' => 'required|date',
    //     ]);

    //     // Mendapatkan mahasiswa berdasarkan NIM
    //     $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();

    //     // Membuat data IRS baru
    //     $irs = new Irs();
    //     $irs->nim = $request->nim;
    //     $irs->nama = $mahasiswa->nama;
    //     $irs->semester = $request->semester;
    //     $irs->kode_mk = $request->kode_mk;
    //     $irs->nama_mk = $request->nama_mk;
    //     $irs->kelas = $request->kelas;
    //     $irs->sks = $request->sks;
    //     $irs->status = false; // Belum disetujui
    //     $irs->tanggal_pengajuan = Carbon::now();
    //     $irs->mahasiswa_id = $mahasiswa->id;
        
    //     $irs->save();

    //     return redirect()->route('irs.create')->with('success', 'IRS berhasil diajukan');
    // }
//     public function simpanIrs(Request $request)
// {
//     $validatedData = $request->validate([
//         'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
//         'mahasiswa_id' => 'required|exists:mahasiswas,id',
//     ]);

//     // Simpan data ke tabel IRS
//     DB::table('irs')->insert([
//         'mahasiswa_id' => $validatedData['mahasiswa_id'],
//         'mata_kuliah_id' => $validatedData['mata_kuliah_id'],
//         'created_at' => now(),
//         'updated_at' => now(),
//     ]);

//     return response()->json(['message' => 'IRS berhasil disimpan']);
// }
    // public function submit(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'selectedData' => 'required|array',
    //         'selectedData.*.jadwalId' => 'required|integer|exists:jadwal,id',
    //         'selectedData.*.semester' => 'required|string',
    //     ]);

    //     $data = $request->input('selectedData');

    //     try {
    //         foreach ($data as $item) {
    //             IRS::create([
    //                 'nim' => Auth::user()->nim, // Ambil NIM dari sesi login (pastikan nim ada di model User)
    //                 'jadwal_id' => $item['jadwalId'],
    //                 'semester' => $item['semester'],
    //                 'prioritas' => 0, // Default prioritas
    //                 'status' => 'pending',
    //             ]);
    //         }

    //         return response()->json(['success' => true, 'message' => 'Rencana Studi berhasil disimpan.']);
    //     } catch (\Exception $e) {
    //         // Log error untuk debugging
    //         Log::error('Error saat menyimpan IRS: ' . $e->getMessage());
    //         return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat menyimpan Rencana Studi.']);
    //     }
    // }

// public function submit(Request $request)
// {
//     $selectedData = $request->input('selectedData');
    
//     try {
//         foreach ($selectedData as $data) {
//             // Simpan ke database IRS
//             IRS::create([
//                 'mahasiswa_id' => auth()->user()->id,
//                 'mata_kuliah_id' => $data['mkId'],
//                 'jadwal_id' => $data['jadwalId'],
//                 'semester' => $data['semester']
//             ]);
//         }

//         return response()->json([
//             'success' => true,
//             'message' => 'Rencana Studi berhasil disimpan'
//         ]);
//     } catch (\Exception $e) {
//         return response()->json([
//             'success' => false,
//             'message' => 'Gagal menyimpan Rencana Studi: ' . $e->getMessage()
//         ], 500);
//     }
// }
// public function submitIRS(Request $request)
// {
//     // Add detailed logging
//     Log::info('IRS Submission Request:', $request->all());

//     try {
//         // Validate the incoming request
//         $validatedData = $request->validate([
//             'total_sks' => 'required|numeric',
//             'semester' => 'required|string',
//             'schedules' => 'required|array',
//             'schedules.*.mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
//             'schedules.*.jadwal_id' => 'required|exists:jadwals,id',
//         ]);

//         // Start a database transaction
//         DB::beginTransaction();

//         // Create a new IRS record
//         $irs = Irs::create([
//             'nim' => Auth::user()->nim, // Adjust based on your user model
//             'jadwal_id' => $validatedData['schedules'][0]['jadwal_id'], // Store first jadwal_id if needed
//             'semester' => $validatedData['semester'],
//             'status' => 'Menunggu Persetujuan',
//         ]);

//         // Commit the transaction
//         DB::commit();

//         // Log successful submission
//         Log::info('IRS Submission Successful', ['irs_id' => $irs->id]);

//         return response()->json([
//             'success' => true,
//             'message' => 'Rencana Studi berhasil disimpan',
//             'irs_id' => $irs->id
//         ]);
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


public function submit(Request $request)
{
    // Validasi data yang diterima
    $validated = $request->validate([
        'total_sks' => 'required|integer|min:1',
        'semester' => 'required|string',
        'schedules' => 'required|array',
        'schedules.*.mata_kuliah_id' => 'required|integer|exists:mata_kuliahs,id',
        'schedules.*.jadwal_id' => 'required|integer|exists:jadwals,id',
    ]);

    $nim = auth()->user()->nim; // Asumsi pengguna sudah login

    foreach ($validated['schedules'] as $schedule) {
        Irs::create([
            'nim' => $nim,
            'jadwal_id' => $schedule['jadwal_id'],
            'semester' => $validated['semester'],
            'prioritas' => 0, // Atau sesuai logika Anda
            'status' => 'pending', // Atau logika lain jika ada
        ]);
    }

    return response()->json([
        'success' => true,
        'message' => 'Rencana Studi berhasil disimpan.',
    ]);
}


}