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
{public function buatIRS_mahasiswa()
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

   public function create()
   {
       $dosens = Dosen::all();
       $ruangs = Ruang::all();
       $mataKuliahs = MataKuliah::all();

       return view('kalendar.date', compact('dosens', 'ruangs', 'mataKuliahs'));
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
}