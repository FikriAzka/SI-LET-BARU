@extends('layout')

@section('title', 'Edit Jadwal')

@section('konten')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Jadwal</h1>

    <!-- Form Edit -->
    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <!-- Mata Kuliah -->
        <div class="mb-4">
            <label for="mata_kuliah_id" class="block text-gray-700">Mata Kuliah</label>
            <select name="mata_kuliah_id" id="mata_kuliah_id" class="w-full p-2 border border-gray-300 rounded">
                @foreach($mataKuliahs as $mk)
                <option value="{{ $mk->id }}" {{ $jadwal->mata_kuliah_id == $mk->id ? 'selected' : '' }}>
                    {{ $mk->nama_mk }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Dosen -->
        <div class="mb-4">
            <label for="dosen_id" class="block text-gray-700">Dosen</label>
            <select name="dosen_id" id="dosen_id" class="w-full p-2 border border-gray-300 rounded">
                @foreach($dosens as $dosen)
                <option value="{{ $dosen->id }}" {{ $jadwal->dosen_id == $dosen->id ? 'selected' : '' }}>
                    {{ $dosen->nama_lengkap }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Ruangan -->
        <div class="mb-4">
            <label for="ruangan" class="block text-gray-700">Ruangan</label>
            <select name="ruangan" id="ruangan" class="w-full p-2 border border-gray-300 rounded">
                @foreach($ruangs as $ruang)
                <option value="{{ $ruang->noruang }}" {{ $jadwal->ruangan == $ruang->noruang ? 'selected' : '' }}>
                    {{ $ruang->noruang }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Hari -->
        <div class="mb-4">
            <label for="hari" class="block text-gray-700">Hari</label>
            <select name="hari" id="hari" class="w-full p-2 border border-gray-300 rounded">
                @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                <option value="{{ $hari }}" {{ $jadwal->hari == $hari ? 'selected' : '' }}>
                    {{ $hari }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Jam -->
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="jam_mulai" class="block text-gray-700">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" value="{{ $jadwal->jam_mulai }}"
                    class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div>
                <label for="jam_selesai" class="block text-gray-700">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" value="{{ $jadwal->jam_selesai }}"
                    class="w-full p-2 border border-gray-300 rounded">
            </div>
        </div>

        <!-- Kelas -->
        <div class="mb-4">
            <label for="kelas" class="block text-gray-700">Kelas</label>
            <select name="kelas" id="kelas" class="w-full p-2 border border-gray-300 rounded">
                @foreach(['A', 'B', 'C', 'D', 'E'] as $kelas)
                <option value="{{ $kelas }}" {{ $jadwal->kelas == $kelas ? 'selected' : '' }}>
                    {{ $kelas }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Kuota Kelas -->
        <div class="mb-4">
            <label for="kuota_kelas" class="block text-gray-700">Kuota Kelas</label>
            <input type="number" name="kuota_kelas" id="kuota_kelas" value="{{ $jadwal->kuota_kelas }}"
                class="w-full p-2 border border-gray-300 rounded">
        </div>

        <!-- SKS -->
        <div class="mb-4">
            <label for="sks" class="block text-gray-700">SKS</label>
            <input type="number" name="sks" id="sks" value="{{ $jadwal->sks }}"
                class="w-full p-2 border border-gray-300 rounded">
        </div>

        <!-- Sifat -->
        <div class="mb-4">
            <label for="sifat" class="block text-gray-700">Sifat</label>
            <select name="sifat" id="sifat" class="w-full p-2 border border-gray-300 rounded">
                @foreach(['Wajib', 'Pilihan'] as $sifat)
                <option value="{{ $sifat }}" {{ $jadwal->sifat == $sifat ? 'selected' : '' }}>
                    {{ $sifat }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Semester -->
        <div class="mb-4">
            <label for="semester" class="block text-gray-700">Semester</label>
            <input type="number" name="semester" id="semester" value="{{ $jadwal->semester }}"
                class="w-full p-2 border border-gray-300 rounded">
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
    </form>
</div>
@endsection
