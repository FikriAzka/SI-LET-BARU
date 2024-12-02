@extends('layout')

@section('konten')
    <div class="p-4">
        <a class="text-gray-600 text-sm" href="/dashboard-dekan">
            ← Back
        </a>
    </div>
    <div class="max-w-4xl mx-auto bg-[#9BC0A5] p-6 rounded-lg">
        <h2 class="text-center text-xl font-bold mb-6">
            Penyetujuan Jadwal Kuliah
        </h2>
        <div class="space-y-4">
            @foreach ($jadwals as $jadwal)
                <div class="bg-white p-4 rounded-lg shadow flex justify-between items-center border-2">
                    <div>
                        <h3 class="font-bold">
                            {{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kelas }})
                        </h3>
                        <p>
                            {{ $jadwal->hari }}, {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }} WIB
                        </p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <!-- Tombol Cek Jadwal, membuka modal -->
                        <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded"
                            onclick="openModal({{ $jadwal->id }})">
                            Cek Jadwal
                        </button>

                        <!-- Tombol Approve -->
                        <form action="{{ route('jadwal.approve', $jadwal->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="fas fa-check text-xl text-gray-700 hover:text-green-600 p-2 rounded">
                            </button>
                        </form>
                        <!-- Tombol Reject -->
                        <form action="{{ route('jadwal.reject', $jadwal->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="fas fa-times text-xl text-gray-700 hover:text-red-600 p-2 rounded">
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Pop-up Modal untuk menampilkan detail jadwal -->
                <div id="modal-{{ $jadwal->id }}"
                    class="modal hidden fixed inset-0 bg-black bg-opacity-50 justify-center items-center z-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                        <div class="text-right">
                            <button onclick="closeModal({{ $jadwal->id }})" class="text-xl text-gray-700">
                                ×
                            </button>
                        </div>
                        <h3 class="font-bold">{{ $jadwal->mataKuliah->nama_mk }} ({{ $jadwal->kelas }})</h3>
                        <p><strong>Hari:</strong> {{ $jadwal->hari }}</p>
                        <p><strong>Kelas:</strong> {{ $jadwal->kelas }}</p>
                        <p><strong>Kuota Kelas:</strong> {{ $jadwal->kuota_kelas }}</p>
                        <p><strong>Jam:</strong> {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</p>
                        <p><strong>Ruangan:</strong> {{ $jadwal->ruangan }}</p>
                        <p><strong>Pengampu 2:</strong> {{ $jadwal->pengampu_2 ?? 'Tidak ada' }}</p>
                        <p><strong>Pengampu 3:</strong> {{ $jadwal->pengampu_3 ?? 'Tidak ada' }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('js')
    <script>
        // Fungsi untuk membuka modal
        function openModal(id) {
            const modal = document.getElementById('modal-' + id);
            modal.classList.remove('hidden'); // Hapus 'hidden' untuk menampilkan modal
            modal.classList.add('flex'); // Tambahkan 'flex' untuk memposisikan modal di tengah
        }

        // Fungsi untuk menutup modal
        function closeModal(id) {
            const modal = document.getElementById('modal-' + id);
            modal.classList.remove('flex'); // Hapus 'flex' untuk menyembunyikan modal
            modal.classList.add('hidden'); // Tambahkan 'hidden' untuk menyembunyikan modal
        }
    </script>
@endsection
