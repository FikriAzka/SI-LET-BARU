<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class MataKuliahController extends Controller
{
    public function store(Request $request)
    {
        // Debugging: Log the incoming request data
        Log::info('Incoming request data:', $request->all());

        // Validate the input with unique rule for kode_mk
        $validatedData = $request->validate([
            'kode_mk' => [
                'required', 
                'max:10', 
                // Use Rule::unique to ensure case-insensitive uniqueness
                Rule::unique('mata_kuliahs', 'kode_mk')->ignore($request->id),
            ],
            'nama_mk' => 'nullable|max:50',
            'semester' => 'nullable|integer|min:1',
            'sifat' => 'required|in:Wajib,Pilihan',
            'sks' => 'nullable|integer|min:1|max:10'
        ], [
            // Custom error messages
            'kode_mk.unique' => 'Kode Mata Kuliah sudah tersedia di database. Silakan gunakan kode yang berbeda.'
        ]);

        // Additional check to prevent case-insensitive duplicates
        $existingCourse = MataKuliah::whereRaw('LOWER(kode_mk) = ?', [strtolower($request->kode_mk)])->first();
        
        if ($existingCourse) {
            return back()->withErrors([
                'kode_mk' => 'Kode Mata Kuliah sudah tersedia di database. Silakan gunakan kode yang berbeda.'
            ])->withInput();
        }

        // Create the new course
        MataKuliah::create($validatedData);

        // Redirect back with success message
        return redirect()->route('mata_kuliahs.index')
            ->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    // Update method with similar validation
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_mk' => [
                'required', 
                'max:10', 
                // Ignore the current record when updating
                Rule::unique('mata_kuliahs', 'kode_mk')->ignore($id),
            ],
            // ... other validation rules
        ], [
            'kode_mk.unique' => 'Kode Mata Kuliah sudah tersedia di database. Silakan gunakan kode yang berbeda.'
        ]);

        // Additional case-insensitive check for update
        $existingCourse = MataKuliah::where('id', '!=', $id)
            ->whereRaw('LOWER(kode_mk) = ?', [strtolower($request->kode_mk)])
            ->first();
        
        if ($existingCourse) {
            return back()->withErrors([
                'kode_mk' => 'Kode Mata Kuliah sudah tersedia di database. Silakan gunakan kode yang berbeda.'
            ])->withInput();
        }

        $course = MataKuliah::findOrFail($id);
        $course->update($validatedData);

        return redirect()->route('mata_kuliahs.index')
            ->with('success', 'Mata Kuliah berhasil diperbarui.');
    }
}