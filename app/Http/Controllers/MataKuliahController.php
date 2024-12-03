<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;


class MataKuliahController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'kode_mk' => 'required|string|max:10',
        'nama_mk' => 'nullable|string|max:50',
        'semester' => 'nullable|integer|min:1',
        'sifat' => 'nullable|string|max:10',
        'sks' => 'nullable|integer|min:1|max:10',
    ]);

    MataKuliah::create($request->all());

    return redirect()->back()->with('success', 'Mata kuliah berhasil ditambahkan!');
}

}
