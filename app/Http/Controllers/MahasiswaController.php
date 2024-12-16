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

class MahasiswaController extends Controller
{
    public function dashboard_mahasiswa()
    {
        return view('mahasiswa.indexDashboardMahasiswa');
    }

    public function akademik_mahasiswa()
    {
        return view('mahasiswa.indexAkademikMahasiswa');
    }

    public function lihatIRS_mahasiswa()
    {
        try {
            $mahasiswa = Auth::user()->mahasiswa;
            
            Log::info('Data Mahasiswa:', [
                'user_id' => Auth::user()->id,
                'mahasiswa' => $mahasiswa->toArray()
            ]);
            
            $irsList = [];
            
            for ($i = 1; $i <= 8; $i++) {
                $irsList[$i] = Irs::where('nim', $mahasiswa->nim)
                               ->where('semester', $i)
                               ->with(['jadwal.mataKuliah', 'jadwal.dosen'])
                               ->get();
                               
                Log::info("Data IRS Semester $i:", [
                    'count' => $irsList[$i]->count(),
                    'data' => $irsList[$i]->toArray()
                ]);
            }

            return view('mahasiswa.indexlihatIRSMahasiswa', compact('irsList'));
            
        } catch (\Exception $e) {
            Log::error('Error in lihatIRS_mahasiswa:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->with('error', 'Terjadi kesalahan saat mengambil data IRS.');
        }
    }

    public function lihatKHS_mahasiswa()
    {
        return view('mahasiswa.indexlihatKHSMahasiswa');
    }

    public function buatIRS_mahasiswa()
    {
        return view('mahasiswa.indexbuatIRSMahasiswa');
    }

    public function jadwalkuliah_mahasiswa()
    {
        return view('mahasiswa.indexJadwalKuliahMahasiswa');
    }

    public function transkrip_mahasiswa()
    {
        return view('mahasiswa.indexTranskripMahasiswa');
    }

    public function registrasi_mahasiswa()
    {
        return view('mahasiswa.indexRegistrasiMahasiswa');
    }

    public function Rpembayaran_mahasiswa()
    {
        return view('mahasiswa.indexPembayaranUKTMahasiswa');
    }
}