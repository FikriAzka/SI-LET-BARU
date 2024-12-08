<?php

namespace App\Http\Controllers;

use App\Models\Irs;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Suppor\Facades\Auth;
use Illuminate\Support\Facades\Log;

class KaprodiController extends Controller
{
    function dashboard_kaprodi(){
        return view('kaprodi/indexDashboardKaprodi');
    }
    function penyusunanjadwalkuliah_kaprodi(){
        return view('kaprodi/indexPenyusunanJadwalKuliah');
    }
    function penyusunanjadwalkuliah_kaprodi2(){
        return view('kaprodi/indexPenyusunanJadwalKuliah2');
    }
    function penyusunanjadwalkuliah_kaprodi3(){
        return view('kaprodi/indexPenyusunanJadwalKuliah3');
    }
    function penyusunanjadwalkuliah_kaprodi4(){
        return view('kaprodi/indexPenyusunanJadwalKuliah4');
    }
    function verifikasiIRS_kaprodi(){
        return view('kaprodi/indexVerifikasiIRSKaprodi');
    }
    function verifikasiIRS_kaprodi2(){
        return view('kaprodi/indexVerifikasiIRSKaprodi2');
    }
    public function verifikasiIRS()
    {
        // Mengambil daftar angkatan unik dari tabel Mahasiswa
        $angkatan = Mahasiswa::select('angkatan')->distinct()->orderBy('angkatan', 'desc')->get();

        return view('kaprodi.indexVerifikasiIRSKaprodi', compact('angkatan'));
    }

    public function getIrsByAngkatan(Request $request)
    {
        $angkatan = $request->angkatan;

        // Ambil data mahasiswa berdasarkan angkatan
        $mahasiswa = Mahasiswa::where('angkatan', $angkatan)->get();

        // Ambil semua IRS yang terkait dengan mahasiswa tersebut
        $irs = Irs::whereIn('nim', $mahasiswa->pluck('nim'))->get();

        return response()->json([
            'success' => true,
            'data' => $irs
        ]);
    }

    public function updateStatus($id)
    {
        // Cari data IRS berdasarkan ID
        $irs = Irs::find($id);

        if (!$irs) {
            return response()->json([
                'success' => false,
                'message' => 'Data IRS tidak ditemukan.'
            ], 404);
        }

        // Ubah status menjadi 'Disetujui'
        $irs->status = 'Disetujui';
        $irs->save();

        return response()->json([
            'success' => true,
            'message' => 'Status IRS berhasil diubah menjadi Disetujui.'
        ]);
    }




}