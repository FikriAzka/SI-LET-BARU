@extends('layout')

@section('konten')
    <div class="container mx-auto p-4">
        <a class="text-gray-600 text-sm mb-4 inline-block" href="/perkembanganmahasiswa-dosen3">
            ← Back
        </a>
        <h2 class="text-2xl font-bold mb-6">DETAIL PERKEMBANGAN MAHASISWA - IRS</h2>

        <!-- Informasi Program Studi -->
        <div class="flex justify-center mb-6">
            <div class="text-center">
                <p class="text-gray-700 text-lg font-semibold">{{ $mahasiswa->programStudi->fakultas->nama_fakultas }}</p>
                <p class="text-gray-700">{{ $mahasiswa->programStudi->nama_program_studi }}</p>
            </div>
        </div>

        <!-- Informasi Mahasiswa -->
        <div class="bg-gray-100 p-4 rounded-lg shadow mb-6">
            <h3 class="text-xl font-semibold mb-4">Informasi Mahasiswa</h3>
            <ul class="list-none space-y-2">
                <li><strong class="text-gray-600">NIM:</strong> {{ $mahasiswa->nim }}</li>
                <li><strong class="text-gray-600">Nama:</strong> {{ $mahasiswa->nama_lengkap }}</li>
                <li><strong class="text-gray-600">Angkatan:</strong> {{ $mahasiswa->angkatan }}</li>
                <li><strong class="text-gray-600">Pembimbing Akademik:</strong> {{ Auth::user()->dosen->nama_lengkap}}</li>
            </ul>
        </div>

        <!-- Tabel IRS -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 mt-8">
                <thead class="bg-[9BC0C0]">
                    <tr>
                        <th class="border border-gray-300 p-3 text-left">No</th>
                        <th class="border border-gray-300 p-3 text-left">Mata Kuliah</th>
                        <th class="border border-gray-300 p-3 text-left">Semester</th>
                        <th class="border border-gray-300 p-3 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($irs->isEmpty())
                        <tr>
                            <td colspan="5" class="border border-gray-300 p-3 text-center text-gray-500">Mahasiswa ini
                                belum mengisi IRS.</td>
                        </tr>
                    @else
                        @foreach ($irs as $index => $entry)
                            <tr class="hover:bg-gray-100">
                                <td class="border border-gray-300 p-3 text-center">{{ $index + 1 }}</td>
                                <td class="border border-gray-300 p-3">{{ $entry->jadwal->mataKuliah->nama_mk }}</td>
                                <td class="border border-gray-300 p-3">{{ $entry->semester }}</td>
                                <td class="border border-gray-300 p-3">{{ ucfirst($entry->status) }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
