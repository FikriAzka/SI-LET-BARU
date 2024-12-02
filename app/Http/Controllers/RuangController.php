<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    //
    public function index(Request $request)
    {
        // Ambil semua Program Studi untuk dropdown

        // Ambil data ruangan berdasarkan blok gedung yang dipilih
        
        $query = Ruang::query();

        if ($request->has('blokgedung') && $request->blokgedung != '') {
            $query->where('blokgedung', $request->blokgedung);
        }

        // Ambil data ruangan
        $data = $query->get();
        $prodiList = ProgramStudi::all();
        $blokList = Ruang::select('blokgedung')->distinct()->get(); // Ambil daftar blok gedung yang unik

        

        return view('akademik.IndexPenentuanRuangKuliah', compact('data', 'prodiList', 'blokList'));
    }



    public function create()
    {
        $prodiList = ProgramStudi::all(); // Ambil semua data program studi
        return view('akademik.IndexPenentuanRuangKuliah', compact('prodiList')); // Kirim data ke view
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'noruang' => 'required|unique:ruangs,noruang',
        'blokgedung' => 'required',
        'lantai' => 'required|integer',
        'fungsi' => 'required',
        'kapasitas' => 'required|integer',
        'program_studi_id' => 'required|exists:program_studis,id',
    ]);

    // dd($validatedData); // Debugging untuk melihat data yang diterima

    $validatedData['status'] = 'Pending';
    $validatedData['keterangan'] = 'Tersedia';

    Ruang::create($validatedData);

    return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil ditambahkan');
}

    public function edit($id)
    {
        $ruangan = Ruang::findOrFail($id);
        $prodiList = ProgramStudi::all(); // Ambil semua data program studi

        return view('akademik.IndexPenentuanRuangKuliah', compact('ruangan', 'prodiList'));
    }

    public function update(Request $request, $id)
    {
        $ruangan = Ruang::findOrFail($id);

        $validated = $request->validate([
            'noruang' => 'required|unique:ruangs,noruang,' . $id,
            'blokgedung' => 'required|string',
            'lantai' => 'required|integer',
            'fungsi' => 'required|string',
            'kapasitas' => 'required|integer',
            'program_studi_id' => 'required|exists:program_studis,id', // Fix this line

        ]);

        $ruangan->update($validated);
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $ruangan = Ruang::findOrFail($id);
        $ruangan->delete();
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil dihapus!');
    }

    public function showRuanganApproval(Request $request)
    {
        // Ambil parameter 'program_studi' dari request
        $programStudiId = $request->input('program_studi');
        
        // Ambil semua program studi
        $programStudis = ProgramStudi::all();
        
        // Query untuk ruangan, jika ada filter, terapkan filter
        $ruangans = Ruang::with('programStudi') // Mengambil relasi program studi
            ->where('status', 'Pending') // Filter berdasarkan status 'Pending'
            ->when($programStudiId, function ($query) use ($programStudiId) {
                return $query->where('program_studi_id', $programStudiId); // Terapkan filter berdasarkan program studi jika ada
            })
            ->paginate(10); // Pagination hasil query

        return view('dekan.indexPenyetujuanRuangKuliah', compact('ruangans', 'programStudis'));
    }


    public function updateRuanganStatus(Request $request, $id)
    {
        // Menemukan ruangan berdasarkan ID
        $ruangan = Ruang::findOrFail($id);
        
        // Memperbarui status menjadi 'Disetujui'
        $ruangan->status = 'Disetujui';
        $ruangan->save();

        return redirect()->route('dekan.penyetujuanruangkuliah')->with('success', 'Ruangan telah disetujui!');
    }

    public function updateRuanganStatusReject(Request $request, $id)
    {
        // Menemukan ruangan berdasarkan ID
        $ruangan = Ruang::findOrFail($id);

        // Memperbarui status menjadi 'Ditolak'
        $ruangan->status = 'Ditolak';
        $ruangan->save();

        return redirect()->route('dekan.penyetujuanruangkuliah')->with('error', 'Ruangan telah ditolak!');
    }
    
}
