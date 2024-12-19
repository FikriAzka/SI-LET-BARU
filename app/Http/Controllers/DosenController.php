<?php

namespace App\Http\Controllers;

use App\Models\Irs;
use App\Models\DosWal;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function showIrsMhs(Mahasiswa $mahasiswa)
        
    {
        
        try {
            // Ambil data IRS mahasiswa per semester
            $irsList = Irs::where('nim', $mahasiswa->nim)
                ->with(['jadwal.mataKuliah', 'jadwal.dosen'])
                ->get()
                ->groupBy('semester');

            // Kembalikan view dengan data IRS
            return view('irs.histori-irs', compact('mahasiswa', 'irsList'));
        } catch (\Exception $e) {
            // Tangani error
            Log::error('Error in showIrsForDosen', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Terjadi kesalahan saat mengambil data IRS.');
        }
    }


    public function show($nim)
        {
            // Cari mahasiswa berdasarkan NIM
            $mahasiswa = Mahasiswa::where('nim', $nim)->with('irs')->first();

            if (!$mahasiswa) {
                return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan.');
            }

            // Ambil data IRS mahasiswa
            $irs = $mahasiswa->irs;

            return view('irs.detail', compact('mahasiswa', 'irs'));
        }

    public function getMahasiswaIrsStatus(Request $request)
    {
        $angkatan = $request->input('angkatan');
        if (!$angkatan) {
            return response()->json(['success' => false, 'message' => 'Angkatan tidak diberikan.']);
        }
    
        $mahasiswa = Mahasiswa::with('irs')->where('angkatan', $angkatan)->get();
    
        $hasIrs = [];
        $noIrs = [];
    
        foreach ($mahasiswa as $mhs) {
            if ($mhs->irs->count() > 0) {
                $hasIrs[] = [
                    'nim' => $mhs->nim,
                    'nama' => $mhs->nama_lengkap,
                    'irs_count' => $mhs->irs->count(),
                    'pending_irs' => $mhs->irs->where('status', 'pending')->count(),
                ];
            } else {
                $noIrs[] = [
                    'nim' => $mhs->nim,
                    'nama' => $mhs->nama_lengkap,
                ];
            }
        }
    
        return response()->json([
            'success' => true,
            'hasIrs' => $hasIrs,
            'noIrs' => $noIrs,
        ]);
    }
        public function getPerwalian(Request $request)
    {
        $angkatan = $request->input('angkatan');
        if (!$angkatan) {
            return response()->json(['error' => 'Angkatan tidak ditemukan'], 400);
        }
        
        try {
            Log::info('Querying for angkatan: ' . $angkatan); // Add logging
            
            $dosenWali = DosWal::with(['mahasiswa' => function($query) use ($angkatan) {
                $query->where('angkatan', $angkatan);
            }])->get();
            
            $data = [];
            foreach ($dosenWali as $dosen) {
                $data[] = [
                    'dos_wal' => $dosen->nama_lengkap,
                    'mahasiswa' => $dosen->mahasiswa->map(function($mhs) {
                        return [
                            'nama' => $mhs->nama_lengkap,
                            'nim' => $mhs->nim,
                        ];
                    }),
                ];
            }
            
            return response()->json($data);
        } catch (\Exception $e) {
            Log::error('Perwalian error: ' . $e->getMessage()); // Add error logging
            return response()->json([
                'error' => 'Terjadi kesalahan saat mengambil data',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString() // This will help identify where exactly the error occurs
            ], 500);
        }
    }

 
    
    function dashboard_dosen (){
        return view ('dosen/indexDashboardDosen');
    }
    function statusperkembanganmhs_dosen(){
        return view ('dosen/indexPerkembanganMahasiswa');
    }
    function statusperkembanganmhs_dosen2(){
        $angkatan = Mahasiswa::select('angkatan')->distinct()->orderBy('angkatan', 'desc')->get();

        return view ('dosen/indexPerkembanganMahasiswa2', compact('angkatan'));
    }
    function statusperkembanganmhs_dosen3(){
        $angkatan = Mahasiswa::select('angkatan')->distinct()->orderBy('angkatan', 'desc')->get();

        return view ('dosen/indexPerkembanganMahasiswa3', compact('angkatan'));
    }
    function statusperkembanganmhs_dosen4(){
        return view ('dosen/indexPerkembanganMahasiswa4');
    }
    function verifikasiIRSpermintaan_dosen(){
        return view('dosen/indexVerifikasiIRSMintaDosen');
    }
    function verifikasiIRSdisahkan_dosen(){
        return view('dosen/indexVerifikasIRSDisahkanDosen');
    }
    function verifikasiIRSditolak_dosen(){
        return view('dosen/indexVerifikasiIRSDitolakDosen');
    }
}