<?php

namespace App\Http\Controllers;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    function dashboard_mahasiswa(){
        return view('mahasiswa/indexDashboardMahasiswa');
    }
    function registrasi_mahasiswa(){
        return view('mahasiswa/indexRegistrasiMahasiswa');
    }
    function akademik_mahasiswa(){
        return view('mahasiswa/indexAkademikMahasiswa');
    }
    function Rpembayaran_mahasiswa(){
        return view('mahasiswa/indexRegistrasiPembayaranMahasiswa');
    }
    function lihatIRS_mahasiswa(){
        return view('mahasiswa/indexlihatIRSMahasiswa');
    }
    function lihatKHS_mahasiswa(){
        return view('mahasiswa/indexlihatKHSMahasiswa');
    }
    public function buatIRS_mahasiswa()
    {
        $jadwals = Jadwal::with(['mataKuliah', 'dosen'])->get();
        $mataKuliahs = MataKuliah::all();
        
        return view('mahasiswa.indexbuatIRSMahasiswa', compact('jadwals', 'mataKuliahs'));
    }
    function jadwalkuliah_mahasiswa(){
        return view('mahasiswa/indexJadwalKuliahMahasiswa');
    }
    function transkrip_mahasiswa(){
        return view('mahasiswa/indexTranskripMahasiswa');
    }
}