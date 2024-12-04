<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Ruang;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{   
    public function buatIRS_mahasiswa()
    {
       $mahasiswa = Auth::user()->mahasiswa;
       $semester = $mahasiswa->semester;
    
       $jadwals = Jadwal::with(['mataKuliah', 'dosen'])
                     ->where('status', 'Disetujui')
                     ->whereHas('ruang', function($query) {
                         $query->where('status', 'disetujui')
                               ->where('keterangan', 'tersedia');
                     })
                     ->where('semester', $semester)
                     ->get();
    
       $mataKuliahs = MataKuliah::where('semester', $semester)->get();
       $ruangs = Ruang::where('status', 'disetujui')
                   ->where('keterangan', 'tersedia')
                   ->get();
       
       return view('mahasiswa.indexbuatIRSMahasiswa', 
           compact('jadwals', 'mataKuliahs', 'mahasiswa', 'ruangs'));
    }
    
    // Di Model Jadwal


   // Other methods remain the same...
   public function index()
   {
       $jadwals = Jadwal::with(['mataKuliah', 'dosen'])->get();
       $schedules = DB::table('jadwals')
                   ->join('mata_kuliahs', 'jadwals.mata_kuliah_id', '=', 'mata_kuliahs.id')
                   ->select('jadwals.*', 'mata_kuliahs.nama_mk')
                   ->get();
       return view('kaprodi.IndexPenyusunanJadwalKuliah2', compact('jadwals'));
   }
   public function create()
   {
       $dosens = Dosen::all();
       $ruangs = Ruang::all();
       $mataKuliahs = MataKuliah::all();

       return view('kalendar.create', compact('dosens', 'ruangs', 'mataKuliahs'));
   }

   public function store(Request $request)
   {
       $mataKuliahs = MataKuliah::all();
       $dosens = Dosen::all();
       
       $existingSchedules = Jadwal::all();
       
       $ruangs = Ruang::where('keterangan', 'tersedia')
           ->where('status', 'disetujui')
           ->get()
           ->filter(function ($ruang) use ($existingSchedules) {
               return $existingSchedules->doesntContain(function ($schedule) use ($ruang) {
                   return $schedule->ruangan == $ruang->noruang 
                       && $schedule->hari == request()->input('hari')
                       && $this->isTimeOverlap(
                           $schedule->jam_mulai, 
                           $schedule->jam_selesai, 
                           request()->input('jam_mulai'), 
                           request()->input('jam_selesai')
                       );
               });
           });

       $validated = $request->validate([
           'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
           'dosen_id' => 'required|exists:dosens,id',
           'hari' => 'required|string|max:50', 
           'ruangan' => 'required|string|max:10',
           'kuota_kelas' => 'required|integer',
           'sks' => 'required|integer',
           'sifat' => 'required|string|max:15',
           'kelas' => 'required|string:1',
           'semester' => 'required|integer',
           'jam_mulai' => 'required|date_format:H:i',
           'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
           'pengampu_2' => 'nullable|string|max:50',
           'pengampu_3' => 'nullable|string|max:50',
           'status' => 'string|default:Pending',
       ]);

       Jadwal::create($validated);

       return redirect()->route('mahasiswa.buatIRS')->with('success', 'Jadwal berhasil ditambahkan!');
   }

   private function isTimeOverlap($existStart, $existEnd, $newStart, $newEnd)
   {
       $existStartMinutes = $this->timeToMinutes($existStart);
       $existEndMinutes = $this->timeToMinutes($existEnd);
       $newStartMinutes = $this->timeToMinutes($newStart);
       $newEndMinutes = $this->timeToMinutes($newEnd);

       return !($newEndMinutes <= $existStartMinutes || $newStartMinutes >= $existEndMinutes);
   }

   private function timeToMinutes($time)
   {
       list($hours, $minutes) = explode(':', $time);
       return $hours * 60 + $minutes;
   }
   public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $mataKuliahs = MataKuliah::all();
        $dosens = Dosen::all();
        $ruangs = Ruang::all();

        return view('kalendar.create', compact('jadwal', 'mataKuliahs', 'dosens', 'ruangs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'ruangan' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'kelas' => 'required',
            'kuota_kelas' => 'required|integer',
            'sks' => 'required|integer',
            'sifat' => 'required',
            'semester' => 'required|integer',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('kaprodi.penyusunanjadwalkuliah2')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy($id)
    {

        $jadwal = Jadwal::findOrFail($id);

        // Kembalikan status ruangan menjadi "Tersedia"
        // $ruang = Ruang::where('noruang', $jadwal->ruangan)->first();
        // if ($ruang) {
        //     $ruang->update(['keterangan' => 'Tersedia']);
        // }

        $jadwal->delete();

        return redirect()->route('kaprodi.penyusunanjadwalkuliah2')->with('success', 'Jadwal berhasil dihapus.');
    }

    public function showJadwalPenyetujuan()
    {
        // Ambil semua jadwal yang membutuhkan persetujuan (status bisa diubah sesuai kebutuhan)
        $jadwals = Jadwal::where('status', 'pending')->get();

        return view('dekan.indexPenyetujuanJadwalKuliah', compact('jadwals'));
    }


    public function approveJadwal($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->status = 'Disetujui'; // Sesuaikan dengan status yang sesuai
        $jadwal->save();

        return redirect()->route('dekan.penyetujuanjadwalkuliah')->with('success', 'Jadwal disetujui!');
    }

    public function rejectJadwal($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->status = 'rejected'; // Sesuaikan dengan status yang sesuai
        $jadwal->save();

        return redirect()->route('dekan.penyetujuanjadwalkuliah')->with('error', 'Jadwal ditolak!');
    }
}