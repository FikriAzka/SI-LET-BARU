@extends('layout')
@section('konten')
    <div class="p-4">
        <a class="text-gray-600 text-sm" href="/dashboard-dosen">
            ← Back
        </a>
        <h2 class="mt-4 text-2xl font-bold">
            STATUS PERKEMBANGAN MAHASISWA
        </h2>
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700" for="angkatan">
                Angkatan
            </label>
            <select
                class="mt-1 block w-1/4 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                id="angkatan" name="angkatan" onchange="window.location.href=this.value">
                <option>
                    Pilih angkatan
                </option>
                <option>
                    2019
                </option>
                <option>
                    2020
                </option>
                <option value="/perkembanganmahasiswa-dosen2">histori irs</option>
                <option value="/perkembanganmahasiswa-dosen3">srsno2</option>

            </select>
        </div>
        <div class="mt-20 text-center text-gray-500">
            ~ Pilih angkatan terlebih dahulu ~
        </div>
    </div>
@endsection
