<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Ruang;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function buatIRS_mahasiswa()
    {
        $mahasiswa = Auth::user()->mahasiswa;
        $semester = $mahasiswa->semester;

        $jadwals = Jadwal::where('semester', $semester)->where('status', 'Disetujui')->get();
        $mataKuliahs = MataKuliah::where('semester', $semester)->get();
        $ruangs = Ruang::where('status', 'Disetujui')
            ->where('keterangan', 'tersedia')
            ->get();

        // dd($mataKuliahs);

        return view('mahasiswa.indexbuatIRSMahasiswa', compact('jadwals', 'mataKuliahs', 'mahasiswa', 'ruangs'));
    }

    public function index()
    {
        $jadwals = Jadwal::with(['mataKuliah', 'dosen'])->get();
        // dd($jadwals);

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

        // dd($request->all());
        $validated = $request->validate([
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'dosen_id' => 'required|exists:dosens,id',
            'hari' => 'required|string|max:50',
            'ruangan' => 'required|string|max:10',
            'kuota_kelas' => 'required|integer',
            'sifat' => 'required|string|max:15',
            'kelas' => 'required|string|max:1', 
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'pengampu_2' => 'nullable|string|max:50',
            'pengampu_3' => 'nullable|string|max:50',
            'status' => 'string|default:Pending',
        ]);

        $matkul = MataKuliah::where('id',$request->mata_kuliah_id)->get()->first();
        // dd($matkul);
        $validated['sks'] = $matkul->sks;
        $validated['semester'] = $matkul->semester;
        // dd($validated);

        Jadwal::create($validated);

        return redirect()->route('kaprodi.penyusunanjadwalkuliah2')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $mataKuliahs = MataKuliah::all();
        $dosens = Dosen::all();
        $ruangs = Ruang::all();

        return view('kalendar.edit', compact('jadwal', 'mataKuliahs', 'dosens', 'ruangs'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'hari' => 'required',
            'ruangan' => 'required',
            'kuota_kelas' => 'required|integer',
            'sks' => 'required|integer',
            'sifat' => 'required',
            'kelas' => 'required',
            'semester' => 'required|integer',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($validated);

        return redirect()->route('kaprodi.penyusunanjadwalkuliah2')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('kaprodi.penyusunanjadwalkuliah2')->with('success', 'Jadwal berhasil dihapus.');
    }

    public function showJadwalPenyetujuan()
    {
        $jadwals = Jadwal::where('status', 'pending')->get();

        return view('dekan.indexPenyetujuanJadwalKuliah', compact('jadwals'));
    }

    public function approveJadwal($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->status = 'Disetujui';
        $jadwal->save();

        return redirect()->route('dekan.penyetujuanjadwalkuliah')->with('success', 'Jadwal disetujui!');
    }

    public function rejectJadwal($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->status = 'rejected';
        $jadwal->save();

        return redirect()->route('dekan.penyetujuanjadwalkuliah')->with('error', 'Jadwal ditolak!');
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
