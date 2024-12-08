@extends('layout')

@section('konten')
    <style>
        .matakuliah:hover {
            background-color: #34D399;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .selected {
            background-color: #34D399;
            color: white;
        }

        .selected .status {
            color: white;
        }

        .matakuliah {
            transition: background-color 0.3s ease;
        }

        .hapus-btn:hover {
            background-color: #F87171;
        }

        .hidden {
            display: none;
        }

        .disabled-schedule {
            background-color: #d1d5db;
            /* Warna abu-abu terang */
            border-color: #d1d5db;
            /* Border abu-abu */
            pointer-events: none;
            /* Menonaktifkan event hover/click */
            cursor: not-allowed;
            /* Menampilkan cursor seperti di disabled */
            color: #6b7280;
            /* Warna teks menjadi abu-abu */
        }
    </style>

    <div class="p-4">
        <a class="text-gray-600 mb-2 -mt-2 inline-block" href="/akademik-mahasiswa">← Kembali</a>

        <h2 class="text-center text-2xl font-bold mt-2">Buat IRS</h2>

        <div class="border-2 p-4 rounded-md shadow-sm mt-4">
            <h3 class="text-xl font-bold">Rancanglah Isian Rencana Studi (IRS)</h3>
            <p class="text-sm text-gray-600">
                Ajukan IRS ke masing-masing Dosen Pembimbing untuk persetujuan.
            </p>

            <div class="mt-4 p-4 bg-blue-50 rounded-md">
                <p class="font-semibold">Info Mahasiswa:</p>
                <p>Semester: {{ $mahasiswa->semester }}</p>
                <p>IPS: <span id="ipsValue" class="font-bold">{{ $mahasiswa->ips }}</span></p>
                <p>Total SKS yang diambil: <span id="totalSKS" class="font-bold">0</span></p>
                <p class="text-sm text-gray-600">
                    Maksimal SKS yang dapat diambil berdasarkan IPS:
                    <span id="maxSKS" class="font-bold"></span>
                </p>
            </div>
            


        </div>


        <div class="flex mt-4">
            <div class="w-1/4 bg-white p-4 border rounded-lg">
                <h4 class="text-center font-bold mb-4">Pilih Matakuliah</h4>

                <!-- Dropdown Filter Mata Kuliah -->
                <div class="mb-4">
                    <label for="mk-filter" class="block text-sm font-medium text-gray-700">Filter Mata Kuliah</label>
                    <select id="mk-filter"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="" disabled selected class="text-gray-500">--Mata Kuliah--</option>

                        @foreach ($mataKuliahs as $mk)
                            <option value="{{ $mk->id }}">{{ $mk->nama_mk }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-4" id="matakuliahList">
                    @foreach ($mataKuliahs as $mk)
                        <div class="matakuliah bg-gray-100 p-2 rounded-lg mb-2 hidden" data-sks="{{ $mk->sks }}"
                            data-mk-id="{{ $mk->id }}" data-mk-name="{{ $mk->nama_mk }}"
                            data-mk-semester="{{ $mk->semester }}">
                            <p class="font-bold">{{ $mk->nama_mk }}</p>
                            <p class="text-sm">(Semester {{ $mk->semester }})</p>
                            <p class="text-sm">SKS: {{ $mk->sks }}</p>
                            <p class="status text-right text-xs text-red-600">Belum Terpilih</p>
                            <button type="button" class="batal-btn text-sm text-red-500 underline"
                                data-mk-id="{{ $mk->id }}">
                                Batal
                            </button>
                        </div>
                    @endforeach
                </div>


            </div>

            <div class="w-3/4 ml-4 bg-white p-4 border rounded-lg">
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
                                                    class="rounded p-1.5 border-l-2 {{ $colorClass }} w-full text-left"
                                                    data-mk-id="{{ $jadwal->mataKuliah->id }}">
                                                    <p class="text-xs font-normal mb-px">{{ $jadwal->mataKuliah->nama_mk }}
                                                    </p>
                                                    <p class="text-xs font-semibold">{{ $jadwal->jam_mulai }} -
                                                        {{ $jadwal->jam_selesai }}</p>
                                                </button>


                                                <!-- Tooltip untuk detail jadwal -->
                                                <div
                                                    class="absolute left-full top-0 ml-0 hidden group-hover:block bg-white shadow-lg border rounded-lg p-4 w-64 z-10">
                                                    <p class="text-sm font-semibold mb-2">Detail Jadwal</p>
                                                    <ul class="text-sm text-gray-700 mb-3">
                                                        <li><strong>Mata Kuliah:</strong>
                                                            {{ $jadwal->mataKuliah->nama_mk . ' ' . $jadwal->kelas }}</li>
                                                        <li><strong>Ruang:</strong> {{ $jadwal->ruangan }}</li>
                                                        <li><strong>Hari:</strong> {{ $jadwal->hari }}</li>
                                                        <li><strong>Kelas:</strong> {{ $jadwal->kelas }}</li>
                                                        <li><strong>Kuota kelas:</strong> {{ $jadwal->kuota_kelas }}</li>
                                                        <li><strong>Jam:</strong> {{ $jadwal->jam_mulai }} -
                                                            {{ $jadwal->jam_selesai }}</li>
                                                    </ul>

                                                    <!-- Tombol Edit dan Hapus -->
                                                    <div class="flex gap-2">
                                                        <button type="button"
                                                            class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 tambah-btn"
                                                            data-sks="{{ $jadwal->mataKuliah->sks }}"
                                                            data-mk-id="{{ $jadwal->mataKuliah->id }}"
                                                            data-jadwal-id="{{ $jadwal->id }}"> <!-- Tambahkan ini -->

                                                            Tambah
                                                        </button>

                                                        <button type="button"
                                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 hapus-btn"
                                                            data-sks="{{ $jadwal->mataKuliah->sks }}"
                                                            data-mk-id="{{ $jadwal->mataKuliah->id }}">
                                                            Hapus
                                                        </button>
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
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        let totalSKS = 0;
        let maxSKS = 0;
        let selectedCourses = new Set();
        let selectedJadwal = new Set(); // Untuk melacak mata kuliah yang dipilih
        let scheduleMap = {}; // Untuk melacak jadwal yang dipilih (key: "day-time")

        // Sembunyikan semua jadwal di kalender saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.calendar-cell .relative.group').forEach(item => {
                item.classList.add('hidden');
            });

            // Pastikan mata kuliah di daftar juga disembunyikan
            document.querySelectorAll('.matakuliah').forEach(item => {
                item.classList.add('hidden');
            });

            console.log('Semua jadwal dan mata kuliah disembunyikan pada awal halaman.');

            // Ambil nilai IPS dari elemen di halaman
            const ipsValue = parseFloat(document.getElementById('ipsValue').textContent);
            const maxSKSDisplay = document.getElementById('maxSKS');

            // Hitung maksimal SKS berdasarkan IPS
            // Default
            if (ipsValue >= 3.00) {
                maxSKS = 24;
            } else if (ipsValue >= 2.50 && ipsValue < 3.00) {
                maxSKS = 22;
            } else if (ipsValue >= 2.00 && ipsValue < 2.50) {
                maxSKS = 20;
            } else if (ipsValue < 2.00) {
                maxSKS = 18;
            }

            // Tampilkan hasil ke elemen halaman
            maxSKSDisplay.textContent = maxSKS;
        });

        document.querySelectorAll('.tambah-btn').forEach(button => {
            button.addEventListener('click', function() {
                const sks = parseInt(this.dataset.sks);
                const mkId = this.dataset.mkId;
                const jadwal = this.dataset.jadwalId;

                const day = this.closest('.calendar-cell').dataset.day;
                const time = this.closest('.calendar-cell').dataset.time;
                const scheduleKey = `${day}-${time}`; // Identifikasi jadwal dengan "day-time"

                // Tambahkan class .selected ke elemen kalender
                const calendarElement = this.closest('.relative.group');
                if (calendarElement) {
                    calendarElement.classList.add('selected');
                }

                // Cek apakah jadwal sudah ada di waktu yang sama
                if (scheduleMap[scheduleKey]) {
                    alert('Jadwal ini sudah terisi. Pilih jadwal lain.');
                    return;
                }

                // Cek apakah mata kuliah sudah dipilih
                if (selectedCourses.has(mkId)) {
                    alert('Anda sudah memilih jadwal untuk mata kuliah ini. Pilih mata kuliah yang lain.');
                    return;
                }
                if (totalSKS + sks > maxSKS) {
                    alert(`Total SKS tidak boleh melebihi ${maxSKS} berdasarkan IPS Anda.`);
                    return;
                }
                // Gray out other unselected schedule buttons for the same course
                document.querySelectorAll(`.tambah-btn[data-mk-id="${mkId}"]`).forEach(btn => {
                    if (btn !== this) { // Exclude the currently clicked button
                        const parentButton = btn.closest('.relative')?.querySelector('button');
                        if (parentButton) {
                            parentButton.classList.add('opacity-30', 'pointer-events-none');
                        }
                    }
                });

                // Tambahkan jadwal dan update data
                totalSKS += sks;
                selectedCourses.add(mkId);
                selectedJadwal.add(jadwal);
                console.log(jadwal);
                console.log(selectedJadwal);
                scheduleMap[scheduleKey] = mkId; // Tandai jadwal terisi
                document.getElementById('totalSKS').textContent = totalSKS;

                // Kirim data ke server menggunakan AJAX
                $.ajax({
                    url: '/submit-irs', // Sesuaikan dengan URL route di Laravel
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // CSRF Token untuk keamanan
                    },
                    data: {
                        jadwal_id: jadwal // Kirim jadwal_id sebagai array
                    },

                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            const selectedMatakuliah = document.querySelector(
                                `.matakuliah[data-mk-id="${mkId}"]`);
                            if (selectedMatakuliah) {
                                selectedMatakuliah.classList.add('selected');
                                const statusElement = selectedMatakuliah.querySelector(
                                    '.status');
                                statusElement.textContent = 'Terpilih';
                                statusElement.classList.remove('text-red-600');
                                statusElement.classList.add('text-green-600');
                            }

                            // Tampilkan alert jika mata kuliah berhasil ditambahkan
                            alert(`Mata kuliah berhasil ditambahkan! Total SKS: ${totalSKS}`);
                            // alert(response.message); // Tampilkan pesan sukses
                            // location.reload(); // Reload halaman setelah berhasil
                        } else {
                            alert('Gagal menyimpan IRS. Silakan coba lagi.');
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            // Tampilkan pesan validasi dari server
                            const errors = xhr.responseJSON.message || 'Kesalahan validasi.';
                            alert(errors);
                        } else {
                            alert('Terjadi kesalahan. Silakan coba lagi.');
                        }
                    },

                });


                // Update UI

            });
        });



        document.querySelectorAll('.hapus-btn').forEach(button => {
            button.addEventListener('click', function() {
                const sks = parseInt(this.dataset.sks);
                const mkId = this.dataset.mkId;

                const day = this.closest('.calendar-cell').dataset.day;
                const time = this.closest('.calendar-cell').dataset.time;
                const scheduleKey = `${day}-${time}`; // Identifikasi jadwal dengan "day-time"

                if (!selectedCourses.has(mkId)) {
                    alert('Mata kuliah ini belum dipilih.');
                    return;
                }

                // Remove gray out effect for the specific course
                document.querySelectorAll(`.tambah-btn[data-mk-id="${mkId}"]`).forEach(btn => {
                    const parentButton = btn.closest('.relative')?.querySelector('button');
                    if (parentButton) {
                        parentButton.classList.remove('opacity-30', 'pointer-events-none');
                    }
                });

                // Hapus jadwal dan update data
                totalSKS -= sks;
                selectedCourses.delete(mkId);
                delete scheduleMap[scheduleKey]; // Lepas tanda jadwal
                document.getElementById('totalSKS').textContent = totalSKS;

                // Update UI
                const selectedMatakuliah = document.querySelector(`.matakuliah[data-mk-id="${mkId}"]`);
                if (selectedMatakuliah) {
                    selectedMatakuliah.classList.remove('selected');
                    const statusElement = selectedMatakuliah.querySelector('.status');
                    statusElement.textContent = 'Belum Terpilih';
                    statusElement.classList.remove('text-green-600');
                    statusElement.classList.add('text-red-600');
                }

                alert(`Mata kuliah berhasil dihapus! Total SKS: ${totalSKS}`);
            });
        });
        let selectedMkIds = new Set(); // Gunakan Set untuk menyimpan ID matakuliah yang dipilih

        // Dropdown untuk memilih matakuliah
        document.getElementById('mk-filter').addEventListener('change', function() {
            const selectedMkId = this.value;

            // Jika ada ID mata kuliah yang dipilih, tambahkan ke Set
            if (selectedMkId) {
                selectedMkIds.add(selectedMkId); // Tambahkan ke daftar pilihan
            }

            // Tampilkan matakuliah yang dipilih
            document.querySelectorAll('.matakuliah').forEach(item => {
                const mkId = item.dataset.mkId;
                if (selectedMkIds.has(mkId)) {
                    item.classList.remove('hidden'); // Tampilkan mata kuliah yang dipilih
                } else {
                    item.classList.add('hidden'); // Sembunyikan yang tidak dipilih
                }
            });

            // Tampilkan jadwal di kalender sesuai mata kuliah yang dipilih
            document.querySelectorAll('.calendar-cell .relative.group').forEach(item => {
                const mkId = item.querySelector('.tambah-btn')?.dataset.mkId;
                if (selectedMkIds.has(mkId)) {
                    item.classList.remove('hidden'); // Tampilkan sel kalender yang cocok dengan mata kuliah
                } else {
                    item.classList.add('hidden'); // Sembunyikan yang tidak cocok
                }
            });
        });

        // Event listener untuk tombol batal
        document.getElementById('matakuliahList').addEventListener('click', function(event) {
            // Periksa apakah tombol batal yang diklik
            if (event.target.classList.contains('batal-btn')) {
                const mkId = event.target.dataset.mkId;

                // Hapus dari Set yang menyimpan mata kuliah yang dipilih
                selectedMkIds.delete(mkId);

                // Sembunyikan mata kuliah yang dibatalkan
                const matakuliahElement = document.querySelector(`.matakuliah[data-mk-id="${mkId}"]`);
                if (matakuliahElement) {
                    matakuliahElement.classList.add('hidden'); // Sembunyikan elemen mata kuliah
                }

                // Update dropdown jika dibatalkan (reset pilihan dropdown jika tidak ada yang dipilih)
                document.getElementById('mk-filter').value = "";

                // Sembunyikan jadwal di kalender yang terkait
                document.querySelectorAll('.calendar-cell .relative.group').forEach(item => {
                    const mkIdInCalendar = item.querySelector('.tambah-btn')?.dataset.mkId;
                    if (mkIdInCalendar === mkId) {
                        item.classList.add('hidden'); // Sembunyikan kalender yang terkait
                    }
                });

                console.log(`Mata kuliah dengan ID ${mkId} dibatalkan.`);
            }
        });
    </script>
@endsection
