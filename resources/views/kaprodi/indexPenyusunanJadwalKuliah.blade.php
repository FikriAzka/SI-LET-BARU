@extends('layout')

@section('konten')
    <a class="text-gray-600 text-sm mb-4 inline-block" href="dashboard-kaprodi">
        ← Back
    </a>
    <div class="bg-white p-6 border border-gray-300">
        <h2 class="text-center text-lg font-bold mb-4">
            PENYUSUNAN JADWAL KULIAH
        </h2>
        <form>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <label class="flex items-center">
                    <span class="w-1/3">
                        Semester:
                    </span>
                    <select class="w-1/3 border border-gray-300 p-2">
                        <option>
                            --
                        </option>
                    </select>
                </label>
                <label class="flex items-center">
                    <span class="w-1/3">
                        Matakuliah (Kelas):
                    </span>
                    <select class="w-2/3 border border-gray-300 p-2">
                        <option>
                            --Pilih Mata Kuliah--
                        </option>
                    </select>
                </label>
                <label class="flex items-center">
                    <span class="w-1/3">
                        Dosen Pengampu:
                    </span>
                    <select class="w-2/3 border border-gray-300 p-2">
                        <option>
                            --Pilih Dosen Pengampu--
                        </option>
                    </select>
                </label>
                <label class="flex items-center">
                    <span class="w-1/3">
                        Hari:
                    </span>
                    <select class="w-2/3 border border-gray-300 p-2">
                        <option>
                            --Hari--
                        </option>
                    </select>
                </label>
                <label class="flex items-center">
                    <span class="w-1/3">
                        SKS:
                    </span>
                    <select class="w-1/3 border border-gray-300 p-2">
                        <option>
                            --
                        </option>
                    </select>
                </label>
                <label class="flex items-center">
                    <span class="w-1/3">
                        Jam Mulai:
                    </span>
                    <select class="w-1/3 border border-gray-300 p-2">
                        <option>
                            --
                        </option>
                    </select>
                </label>
                <label class="flex items-center">
                    <span class="w-1/3">
                        Jam Berakhir:
                    </span>
                    <select class="w-1/3 border border-gray-300 p-2">
                        <option>
                            --
                        </option>
                    </select>
                </label>
                <label class="flex items-center">
                    <span class="w-1/3">
                        Ruang:
                    </span>
                    <select class="w-1/3 border border-gray-300 p-2">
                        <option>
                            --
                        </option>
                    </select>
                </label>
            </div>
            <div class="text-right">
                <a class="bg-green-500 text-white px-4 py-2 rounded" href="/penyusunanjadwalkuliah-kaprodi2">
                    Next
                </a>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
