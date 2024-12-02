@extends('layout')

@section('konten')

    <div class="p-4 flex justify-start">
        <a class="text-gray-600 text-sm" href="/dashboard-akademik">← Back</a>
    </div>

    <div class="container mx-auto px-4">
        <div class="mt-4 bg-[#8281C5] p-4 md:p-8 rounded-lg shadow-lg w-full">
            <h2 class="text-center text-2xl md:text-3xl font-bold text-white mb-6 md:mb-8">Daftar Ruangan</h2>

            <!-- Tombol Tambah Ruangan dan Dropdown Pengurutan -->
            <div class="flex justify-between items-center mb-4 space-x-4">
                <!-- Tombol Tambah Ruangan -->
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200"
                    onclick="openCreateModal()">
                    Tambah Ruangan
                </button>
            
                <!-- Dropdown untuk memilih Blok Gedung -->
                <form action="{{ route('ruangan.index') }}" method="GET" class="inline-block">
                    <select name="blokgedung" class="border rounded p-2 text-sm" onchange="this.form.submit()">
                        <option value="">-- Pilih Blok Gedung --</option>
                        <option value="">Semua Blok Gedung</option> <!-- Opsi untuk menampilkan semuanya -->

                        @foreach ($blokList as $blok)
                            <option value="{{ $blok->blokgedung }}"
                                {{ request('blokgedung') == $blok->blokgedung ? 'selected' : '' }}>
                                {{ $blok->blokgedung }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
            


        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg shadow-md mb-4 md:mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Data -->
        <div class="bg-white rounded-lg shadow-md overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2">No Ruang</th>
                        <th class="p-2">Blok Gedung</th>
                        <th class="p-2">Lantai</th>
                        <th class="p-2">Fungsi</th>
                        <th class="p-2">Kapasitas</th>
                        <th class="p-2">Keterangan</th>
                        <th class="p-2">Prodi</th>
                        <th class="p-2">Status</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $ruangan)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-2 text-center">{{ $ruangan->noruang }}</td>
                            <td class="p-2 text-center">{{ $ruangan->blokgedung }}</td>
                            <td class="p-2 text-center">{{ $ruangan->lantai }}</td>
                            <td class="p-2 text-center">{{ $ruangan->fungsi }}</td>
                            <td class="p-2 text-center">{{ $ruangan->kapasitas }}</td>
                            <td class="p-2 text-center">{{ $ruangan->keterangan }}</td>
                            <td class="p-2 text-center">{{ $ruangan->programStudi->nama_program_studi }}</td>
                            <td class="p-2 text-center">{{ $ruangan->status }}</td>
                            <td class="p-2 text-center">
                                <div class="flex justify-center space-x-2">
                                    <button onclick="openEditModal({{ json_encode($ruangan) }})"
                                        class="bg-yellow-500 text-white px-2 py-1 rounded-lg hover:bg-yellow-600">
                                        Edit
                                    </button>
                                    <form action="{{ route('ruangan.destroy', $ruangan->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-2 py-1 rounded-lg hover:bg-red-600">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <!-- Modal Tambah Ruangan -->
    <div id="createModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Tambah Ruangan</h2>
                <button class="text-gray-600 hover:text-gray-800" onclick="closeCreateModal()">✖</button>
            </div>
            <form action="{{ route('ruangan.store') }}" method="POST" class="mt-4">
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
                        <label class="block text-sm font-bold">No Ruang:</label>
                        <input type="text" name="noruang" class="w-full border rounded p-2 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold">Blok Gedung:</label>
                        <input type="text" name="blokgedung" class="w-full border rounded p-2 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold">Lantai:</label>
                        <input type="number" name="lantai" class="w-full border rounded p-2 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold">Fungsi:</label>
                        <input type="text" name="fungsi" class="w-full border rounded p-2 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold">Kapasitas:</label>
                        <input type="number" name="kapasitas" class="w-full border rounded p-2 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold">Prodi:</label>
                        <select name="program_studi_id" class="w-full border rounded p-2">
                            <option value="">-- Pilih Prodi --</option>
                            @foreach ($prodiList as $prodi)
                                <option value="{{ $prodi->id }}">{{ $prodi->nama_program_studi }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="flex justify-end space-x-4 mt-4">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
                        onclick="closeCreateModal()">Batal</button>
                </div>
            </form>
        </div>

    </div>

    <!-- Modal Edit Ruangan -->
    <div id="editModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50  items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Edit Ruangan</h2>
                <button class="text-gray-600 hover:text-gray-800" onclick="closeEditModal()">✖</button>
            </div>
            <form id="editForm" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold">No Ruang:</label>
                        <input id="editNoruang" type="text" name="noruang" class="w-full border rounded p-2 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold">Blok Gedung:</label>
                        <input id="editBlokgedung" type="text" name="blokgedung"
                            class="w-full border rounded p-2 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold">Lantai:</label>
                        <input id="editLantai" type="number" name="lantai" class="w-full border rounded p-2 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold">Fungsi:</label>
                        <input id="editFungsi" type="text" name="fungsi" class="w-full border rounded p-2 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold">Kapasitas:</label>
                        <input id="editKapasitas" type="number" name="kapasitas"
                            class="w-full border rounded p-2 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold">Prodi:</label>
                        <select id="editProdi" name="program_studi_id" class="w-full border rounded p-2">
                            <option value="">-- Pilih Prodi --</option>
                            @foreach ($prodiList as $prodi)
                                <option value="{{ $prodi->id }}"
                                    {{ old('program_studi_id', isset($ruangan) && $ruangan->program_studi_id == $prodi->id ? 'selected' : '') }}>
                                    {{ $prodi->nama_program_studi }}
                                </option>
                            @endforeach
                        </select>


                    </div>
                </div>

                <div class="flex justify-end space-x-4 mt-4">
                    <button type="submit"
                        class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Simpan</button>
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
                        onclick="closeEditModal()">Batal</button>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    function openCreateModal() {
        const modal = document.getElementById('createModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeCreateModal() {
        const modal = document.getElementById('createModal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }

    function openEditModal(data) {
        const modal = document.getElementById('editModal');
        const form = document.getElementById('editForm');

        // Pastikan data di-parse dengan benar
        const ruanganData = typeof data === 'string' ? JSON.parse(data) : data;

        // Populate form fields
        document.getElementById('editNoruang').value = ruanganData.noruang;
        document.getElementById('editBlokgedung').value = ruanganData.blokgedung;
        document.getElementById('editLantai').value = ruanganData.lantai;
        document.getElementById('editFungsi').value = ruanganData.fungsi;
        document.getElementById('editKapasitas').value = ruanganData.kapasitas;
        document.getElementById('editProdi').value = ruanganData.program_studi_id; // Pastikan id prodi

        // Set form action dynamically
        form.action = `/ruangan/${ruanganData.id}`;

        // Show modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }


    function closeEditModal() {
        const modal = document.getElementById('editModal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }
</script>
