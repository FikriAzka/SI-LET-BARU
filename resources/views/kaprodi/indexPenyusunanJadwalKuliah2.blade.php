@extends('layout')

@section('title', 'Kalender SI-LET')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/css/pagedone.css" rel="stylesheet" />
    <style>

    </style>
@endsection

@section('konten')
    <div class="container mx-auto">
        <a class="text-gray-600 text-sm mb-4 ml-5 mt-5 inline-block" href="dashboard-kaprodi">
            ← Back
        </a>
        <div class="flex overflow-hidden">
            <div id="main-content" class="relative text-black font-poppins w-full h-full overflow-y-auto">
                <div class="border-b-2"></div>
                <div class="p-6 mt-4 mx-6 bg-white border border-gray-200 rounded-3xl shadow-sm">
                    <div class="flex justify-between items-center">
                        <h1 class="text-black font-bold">Penyusunan Jadwal Kuliah</h1>
                        <!-- Tombol Tambah Mata Kuliah -->
                        <button onclick="openCreateModal()"
                            class="bg-cyan-600 text-white px-4 py-2 rounded-lg hover:bg-cyan-800 transition duration-300">
                            + Tambah Mata Kuliah
                        </button>
                        <!-- Tombol Tambah Jadwal -->
                        <button onclick="location.href='{{ route('jadwal.create') }}'"
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                            + Tambah Jadwal
                        </button>

                    </div>
                </div>
                <div id="createModal"
                    class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center z-50">
                    <div class="bg-white p-6 rounded-lg w-full max-w-md">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-bold">Tambah Mata Kuliah</h2>
                            <button class="text-gray-600 hover:text-gray-800" onclick="closeCreateModal()">✖</button>
                        </div>
                        <form action="{{ route('mata_kuliahs.store') }}" method="POST" class="mt-4">
                            @csrf
                            @if ($errors->any())
                                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-bold">Kode Mata Kuliah:</label>
                                    <input type="text" name="kode_mk" maxlength="10"
                                        class="w-full border rounded p-2 text-sm" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold">Nama Mata Kuliah:</label>
                                    <input type="text" name="nama_mk" maxlength="50"
                                        class="w-full border rounded p-2 text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold">Semester:</label>
                                    <input type="number" name="semester" min="1"
                                        class="w-full border rounded p-2 text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold">Sifat:</label>
                                    <select name="sifat" class="w-full border rounded p-2 text-sm" required>
                                        <option value="Wajib">Wajib</option>
                                        <option value="Pilihan">Pilihan</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold">SKS:</label>
                                    <input type="number" name="sks" min="1" max="10"
                                        class="w-full border rounded p-2 text-sm">
                                </div>
                            </div>


                            <div class="flex justify-end space-x-4 mt-4">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    Simpan
                                </button>
                                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
                                    onclick="closeCreateModal()">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>



                <section
                    class="relative
                                mb-8 mt-6 mx-8 bg-white border border-gray-200 rounded-3xl shadow-sm flex">
                    <div class="w-full max-w-7xl mx-auto px-6 lg:px-8 overflow-x-auto">
                        <div class="grid grid-cols-8 border-t border-gray-200 sticky top-0 left-0 w-full">
                            <div class="p-3.5 flex items-center justify-center text-sm font-medium text-gray-900">
                            </div>
                            <div class="p-3.5 flex items-center justify-center text-sm font-medium text-gray-900">
                                Senin</div>
                            <div class="p-3.5 flex items-center justify-center text-sm font-medium text-gray-900">
                                Selasa</div>
                            <div class="p-3.5 flex items-center justify-center text-sm font-medium text-gray-900">
                                Rabu</div>
                            <div class="p-3.5 flex items-center justify-center text-sm font-medium text-gray-900">
                                Kamis</div>
                            <div class="p-3.5 flex items-center justify-center text-sm font-medium text-gray-900">
                                Jumat</div>
                            <div class="p-3.5 flex items-center justify-center text-sm font-medium text-gray-900">
                                Sabtu</div>
                            <div class="p-3.5 flex items-center justify-center text-sm font-medium text-gray-900">
                                Minggu</div>
                        </div>

                        @for ($time = 7; $time <= 21; $time++)
                            <div class="grid grid-cols-8 border-t border-gray-200">
                                <div class="p-3.5 flex items-center justify-center text-sm font-medium text-gray-900">
                                    {{ $time }}:00</div>
                                @for ($day = 1; $day <= 7; $day++)
                                    <div class="flex flex-col h-auto p-0.5 md:p-3.5 border-r border-gray-200 transition-all hover:bg-stone-100 calendar-cell"
                                        data-day="{{ $day - 1 }}" data-time="{{ $time }}">

                                        @foreach ($jadwals as $jadwal)
                                            @php
                                                // Ambil jam mulai dan selesai dari jadwal
                                                $startHour = intval(substr($jadwal->jam_mulai, 0, 2));
                                                $endHour = intval(substr($jadwal->jam_selesai, 0, 2));

                                                // Tentukan kelas warna berdasarkan kelas jadwal
                                                $colorClass = match ($jadwal->kelas) {
                                                    'A' => 'bg-blue-50 border-blue-600 text-blue-600',
                                                    'B' => 'bg-red-50 border-red-600 text-red-600',
                                                    'C' => 'bg-green-50 border-green-600 text-green-600',
                                                    'D' => 'bg-purple-50 border-purple-600 text-purple-600',
                                                    'E' => 'bg-yellow-50 border-yellow-600 text-yellow-600',
                                                    default => 'bg-gray-50 border-gray-600 text-gray-600',
                                                };
                                            @endphp

                                            <!-- Render hanya jika jam mulai sesuai dengan slot waktu -->
                                            @if ($time == $startHour && $jadwal->hari == ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'][$day - 1])
                                                <div class="relative group">
                                                    <!-- Tombol Jadwal -->
                                                    <button
                                                        class="rounded p-1.5 border-l-2 {{ $colorClass }} w-full text-left">
                                                        <p class="text-xs font-normal mb-px">
                                                            {{ $jadwal->mataKuliah->nama_mk . ' ' . $jadwal->kelas }}</p>
                                                        <p class="text-xs font-semibold">{{ $jadwal->jam_mulai }} -
                                                            {{ $jadwal->jam_selesai }}</p>
                                                    </button>

                                                    <!-- Tooltip untuk detail jadwal -->
                                                    <div
                                                        class="absolute left-full top-0 ml-0 hidden group-hover:block bg-white shadow-lg border rounded-lg p-4 w-64 z-10">
                                                        <p class="text-sm font-semibold mb-2">Detail Jadwal</p>
                                                        <ul class="text-sm text-gray-700 mb-3">
                                                            <li><strong>Mata Kuliah:</strong>
                                                                {{ $jadwal->mataKuliah->nama_mk . ' ' . $jadwal->kelas }}
                                                            </li>
                                                            <li><strong>Ruang:</strong> {{ $jadwal->ruangan }}</li>
                                                            <li><strong>Hari:</strong> {{ $jadwal->hari }}</li>
                                                            <li><strong>Kelas:</strong> {{ $jadwal->kelas }}</li>
                                                            <li><strong>Kuota kelas:</strong> {{ $jadwal->kuota_kelas }}
                                                            </li>
                                                            <li><strong>Jam:</strong> {{ $jadwal->jam_mulai }} -
                                                                {{ $jadwal->jam_selesai }}</li>
                                                        </ul>

                                                        <!-- Tombol Edit dan Hapus -->
                                                        <div class="flex gap-2">
                                                            <form action="{{ route('jadwal.edit', $jadwal->id) }}"
                                                                method="GET">
                                                                <button type="submit"
                                                                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                                                    Edit
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('jadwal.destroy', $jadwal->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                                                    Hapus
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endfor
                            </div>
                        @endfor
                    </div>
                </section>
            </div>
        </div>
    @endsection

    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/js/pagedone.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        <script>
            function openCreateModal() {
                const modal = document.getElementById('createModal');
                modal.classList.remove('hidden');
                modal.classList.add('flex');x
            }

            function closeCreateModal() {
                const modal = document.getElementById('createModal');
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }
        </script>

    @endsection
