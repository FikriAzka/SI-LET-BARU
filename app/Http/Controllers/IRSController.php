<?php

namespace App\Http\Controllers;

use App\Models\Irs;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IRSController extends Controller
{
    // Menampilkan form untuk membuat IRS
    public function create()
    {
        return view('irs.create');
    }

    // Menyimpan IRS yang telah dibuat
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|exists:mahasiswas,nim',
            'semester' => 'required|integer',
            'kode_mk' => 'required|string',
            'nama_mk' => 'required|string',
            'kelas' => 'required|string',
            'sks' => 'required|integer',
            'tanggal_pengajuan' => 'required|date',
        ]);

        // Mendapatkan mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();

        // Membuat data IRS baru
        $irs = new Irs();
        $irs->nim = $request->nim;
        $irs->nama = $mahasiswa->nama;
        $irs->semester = $request->semester;
        $irs->kode_mk = $request->kode_mk;
        $irs->nama_mk = $request->nama_mk;
        $irs->kelas = $request->kelas;
        $irs->sks = $request->sks;
        $irs->status = false; // Belum disetujui
        $irs->tanggal_pengajuan = Carbon::now();
        $irs->mahasiswa_id = $mahasiswa->id;
        
        $irs->save();

        return redirect()->route('irs.create')->with('success', 'IRS berhasil diajukan');
    }
}