@extends('layout')

@section('title', 'Tambah Jadwal')

@section('konten')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Tambah Jadwal</h1>

        <form action="{{ route('jadwal.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            <!-- Semua input sebelumnya dikembalikan -->
            <div class="mb-4">
                <label for="mata_kuliah_id" class="block text-gray-700">Mata Kuliah</label>
                <select name="mata_kuliah_id" id="mata_kuliah_id" class="w-full p-2 border border-gray-300 rounded" onchange="calculateEndTime()">
                    @foreach ($mataKuliahs as $mk)
                        <option value="{{ $mk->id }}" data-kelas="{{ $mk->nama_mk }}" data-sks="{{ $mk->sks }}">
                            {{ $mk->nama_mk }} {{ request('kelas', '') }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="sifat" class="block text-gray-700">Sifat</label>
                    <select name="sifat" id="sifat" class="w-full p-2 border border-gray-300 rounded" required>
                        <option value="Wajib">Wajib</option>
                        <option value="Pilihan">Pilihan</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="ruangan" class="block text-gray-700">Ruangan</label>
                    <select name="ruangan" id="ruangan" class="w-full p-2 border border-gray-300 rounded">
                        @foreach ($ruangs as $ruang)
                            <option value="{{ $ruang->noruang }}">{{ $ruang->noruang }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-4">
                <label for="kuota_kelas" class="block text-gray-700">Kuota Kelas</label>
                <input type="number" name="kuota_kelas" id="kuota_kelas" class="w-full p-2 border border-gray-300 rounded" min="0" required>
            </div>
            
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="kelas" class="block text-gray-700">Kelas</label>
                    <select name="kelas" id="kelas" class="w-full p-2 border border-gray-300 rounded">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>
                <div>
                    <label for="hari" class="block text-gray-700">Hari</label>
                    <select name="hari" id="hari" class="w-full p-2 border border-gray-300 rounded">
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="jam_mulai" class="block text-gray-700">Jam Mulai</label>
                    <input type="time" name="jam_mulai" id="jam_mulai" 
                           class="w-full p-2 border border-gray-300 rounded" 
                           min="07:00" max="22:00" 
                           onchange="validateTimeRange(); calculateEndTime()">
                </div>
                <div>
                    <label for="jam_selesai" class="block text-gray-700">Jam Selesai</label>
                    <input type="time" name="jam_selesai" id="jam_selesai" 
                           class="w-full p-2 border border-gray-300 rounded" 
                           readonly>
                </div>
            </div>
            <div class="mb-4">
                <label for="pengampu_1" class="block text-gray-700">Dosen Pengampu Utama</label>
                <select name="dosen_id" id="pengampu_1" class="w-full p-2 border border-gray-300 rounded">
                    <option value="">Pilih Dosen</option>
                    @foreach ($dosens as $dosen)
                        <option value="{{ $dosen->id }}">{{ $dosen->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="pengampu_2" class="block text-gray-700">Dosen Pengampu 2 (Optional)</label>
                <select name="pengampu_2" id="pengampu_2" class="w-full p-2 border border-gray-300 rounded">
                    <option value="">Pilih Dosen</option>
                    @foreach ($dosens as $dosen)
                        <option value="{{ $dosen->nama_lengkap }}">{{ $dosen->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="pengampu_3" class="block text-gray-700">Dosen Pengampu 3 (Optional)</label>
                <select name="pengampu_3" id="pengampu_3" class="w-full p-2 border border-gray-300 rounded">
                    <option value="">Pilih Dosen</option>
                    @foreach ($dosens as $dosen)
                        <option value="{{ $dosen->nama_lengkap }}">{{ $dosen->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Other inputs remain unchanged -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
        </form>

        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection

@section('js')
<script>
    // Fungsi untuk memvalidasi jam mulai berada dalam rentang waktu yang diperbolehkan
    function validateTimeRange() {
        const jamMulaiInput = document.getElementById('jam_mulai');
        const jamMulaiValue = jamMulaiInput.value;

        // Jika jam mulai di luar rentang, tampilkan pesan dan reset input
        if (jamMulaiValue < "07:00" || jamMulaiValue > "22:00") {
            alert("Jam mulai harus di antara 07:00 pagi hingga 22:00 malam.");
            jamMulaiInput.value = ""; // Reset nilai input
        }
    }

    // Fungsi untuk menghitung jam selesai berdasarkan jam mulai dan SKS
    function calculateEndTime() {
        const mataKuliahSelect = document.getElementById('mata_kuliah_id');
        const jamMulaiInput = document.getElementById('jam_mulai');
        const jamSelesaiInput = document.getElementById('jam_selesai');
        const jamMulaiValue = jamMulaiInput.value;

        if (mataKuliahSelect && jamMulaiValue) {
            // Ambil informasi SKS dari mata kuliah yang dipilih
            const selectedOption = mataKuliahSelect.options[mataKuliahSelect.selectedIndex];
            const sks = selectedOption.getAttribute('data-sks');

            if (sks) {
                // 1 SKS = 50 menit
                const minutesToAdd = sks * 50;

                // Konversi jam mulai ke menit
                const [startHours, startMinutes] = jamMulaiValue.split(':').map(Number);
                const startTotalMinutes = startHours * 60 + startMinutes;

                // Hitung total menit untuk jam selesai
                const endTotalMinutes = startTotalMinutes + minutesToAdd;
                const endHours = Math.floor(endTotalMinutes / 60);
                const endMinutes = endTotalMinutes % 60;

                // Format jam selesai ke HH:MM
                const formattedEndTime = `${endHours.toString().padStart(2, '0')}:${endMinutes.toString().padStart(2, '0')}`;

                // Validasi jika jam selesai melewati batas 22:00 malam
                if (formattedEndTime > "19:00") {
                    alert("Jam selesai tidak boleh lebih dari 19:00 malam.");
                    jamSelesaiInput.value = ""; // Reset input
                } else {
                    jamSelesaiInput.value = formattedEndTime;
                }
            }
        }
    }
</script>
@endsection
