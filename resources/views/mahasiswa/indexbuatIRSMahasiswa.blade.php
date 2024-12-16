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
                    @foreach ($matkulAll as $mk)
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
                                                            data-jadwal-id="{{ $jadwal->id }}"
                                                            data-start-time="{{ $jadwal->jam_mulai }}"
                                                            data-end-time="{{ $jadwal->jam_selesai }}">
                                                            <!-- Tambahkan end-time -->
                                                            Tambah
                                                        </button>


                                                        <!-- Tombol Hapus -->
                                                        <button type="button"
                                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 hapus-btn"
                                                            data-sks="{{ $jadwal->mataKuliah->sks }}"
                                                            data-mk-id="{{ $jadwal->mataKuliah->id }}" data-irs-id="">
                                                            <!-- Awalnya kosong -->
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

        function saveState() {
            const state = {
                totalSKS,
                selectedCourses: Array.from(selectedCourses),
                scheduleMap,
            };
            localStorage.setItem('scheduleState', JSON.stringify(state));
        }


        function loadIRSFromDatabase() {
            fetch('/get-irs-data')
                .then(response => response.json())
                .then(data => {
                    // Reset state sebelumnya
                    totalSKS = 0;
                    selectedCourses.clear();
                    scheduleMap = {};

                    // Proses data IRS dari database
                    data.forEach(irs => {
                        // Tambahkan mata kuliah ke selectedCourses
                        selectedCourses.add(irs.mata_kuliah_id);

                        // Update total SKS
                        totalSKS += irs.mata_kuliah.sks;

                        // Update schedule map
                        // Anda perlu menambahkan logika untuk mengambil jadwal dari database
                        scheduleMap[`${irs.hari}-${irs.jam}`] = {
                            start: irs.jam_mulai,
                            end: irs.jam_selesai
                        };
                    });

                    // Update UI
                    document.getElementById('totalSKS').textContent = totalSKS;

                    // Perbarui tampilan mata kuliah yang dipilih
                    selectedCourses.forEach(mkId => {
                        const selectedMatakuliah = document.querySelector(`.matakuliah[data-mk-id="${mkId}"]`);
                        if (selectedMatakuliah) {
                            selectedMatakuliah.classList.add('selected');
                            const statusElement = selectedMatakuliah.querySelector('.status');
                            statusElement.textContent = 'Terpilih';
                            statusElement.classList.remove('text-red-600');
                            statusElement.classList.add('text-green-600');
                        }
                    });

                    // Perbarui tampilan kalender
                    Object.keys(scheduleMap).forEach(key => {
                        const [day, time] = key.split('-');
                        const calendarElement = document.querySelector(
                            `.calendar-cell[data-day="${day}"][data-time="${time}"] .relative.group`
                        );
                        if (calendarElement) {
                            calendarElement.classList.add('selected');
                        }
                    });
                })
                .catch(error => {
                    console.error('Gagal memuat data IRS:', error);
                });
        }



        function timeToMinutes(time) {
            const [hours, minutes] = time.split(':').map(Number);
            return hours * 60 + minutes; // Mengonversi jam dan menit menjadi total menit
        }

        function isTimeOverlap(newStart, newEnd, existingSchedules, day) {
            const newStartMinutes = timeToMinutes(newStart);
            const newEndMinutes = timeToMinutes(newEnd);

            console.log('Checking overlap with:', newStartMinutes, newEndMinutes);

            // Loop untuk cek overlap dengan jadwal pada hari yang sama
            for (let key in existingSchedules) {
                const [existingDay, existingTime] = key.split('-');
                if (existingDay !== day) continue; // Hanya cek jadwal pada hari yang sama

                const {
                    start,
                    end
                } = existingSchedules[key];
                const existingStartMinutes = timeToMinutes(start);
                const existingEndMinutes = timeToMinutes(end);

                console.log(
                    `Existing schedule: Day=${existingDay}, Start=${existingStartMinutes}, End=${existingEndMinutes}`);

                if ((newStartMinutes >= existingStartMinutes && newStartMinutes < existingEndMinutes) ||
                    (newEndMinutes > existingStartMinutes && newEndMinutes <= existingEndMinutes) ||
                    (newStartMinutes <= existingStartMinutes && newEndMinutes >= existingEndMinutes)) {
                    console.log("Overlap found!");
                    return true; // Jika ada tumpang tindih
                }
            }

            console.log("No overlap found.");
            return false; // Tidak ada tumpang tindih
        }




        document.addEventListener('DOMContentLoaded', function() {
            loadIRSFromDatabase();


            // Sembunyikan semua jadwal di kalender saat halaman dimuat
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
                // Mendapatkan data SKS dan MK ID
                const sks = parseInt(this.dataset.sks);
                const mkId = this.dataset.mkId;
                const jadwal = this.dataset.jadwalId;

                const day = this.closest('.calendar-cell').dataset.day;
                const time = this.closest('.calendar-cell').dataset.time;
                const scheduleKey = `${day}-${time}`;

                // Mendapatkan nilai start dan end time dengan benar
                const newStart = this.dataset.startTime; // Waktu mulai dalam format 'HH:MM'
                const newEnd = this.dataset.endTime; // Waktu selesai dalam format 'HH:MM'

                console.log('Selected start and end times:', newStart, newEnd); // Debugging

                // Cek apakah waktu tumpang tindih dengan jadwal yang sudah ada
                if (isTimeOverlap(newStart, newEnd, scheduleMap, day)) {
                    alert(
                        'Jadwal ini bertumpang tindih dengan jadwal lain pada hari yang sama. Pilih jadwal lain.'
                    );
                    return;
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

                // Cek total SKS
                if (totalSKS + sks > maxSKS) {
                    alert(`Total SKS tidak boleh melebihi ${maxSKS} berdasarkan IPS Anda.`);
                    return;
                }

                // Tambahkan class .selected ke elemen kalender
                const calendarElement = this.closest('.relative.group');
                if (calendarElement) {
                    calendarElement.classList.add('selected');
                }

                // Gray out other unselected schedule buttons for the same course
                // Gray out tombol lain kecuali tombol ini
                document.querySelectorAll(`.tambah-btn[data-mk-id="${mkId}"]`).forEach(btn => {
                    const parentButton = btn.closest('.relative')?.querySelector('button');
                    if (btn !== this) {
                        parentButton.classList.add('opacity-30', 'pointer-events-none');
                    } else {
                        parentButton.classList.remove('opacity-30', 'pointer-events-none');
                    }
                });


                // Tambahkan jadwal dan update data
                totalSKS += sks;
                selectedCourses.add(mkId);
                selectedJadwal.add(jadwal);
                scheduleMap[scheduleKey] = {
                    start: newStart,
                    end: newEnd
                };
                saveState(); // Simpan state ke localStorage

                document.getElementById('totalSKS').textContent = totalSKS;

                // Kirim data ke server menggunakan AJAX
                $.ajax({
                    url: '/submit-irs',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        jadwal_id: jadwal
                    },
                    success: function(response) {
                        if (response.success) {
                            // Ambil tombol Hapus terkait dan perbarui data-irs-id
                            const hapusButton = calendarElement.querySelector('.hapus-btn');
                            if (hapusButton) {
                                hapusButton.dataset.irsId = response
                                    .irs_id; // IRS ID dari response server
                            }

                            // Update UI
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

                            alert(`Mata kuliah berhasil ditambahkan! Total SKS: ${totalSKS}`);
                        } else {
                            alert('Gagal menyimpan IRS. Silakan coba lagi.');
                        }
                    },

                    error: function(xhr) {
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.message || 'Kesalahan validasi.';
                            alert(errors);
                        } else {
                            alert('Terjadi kesalahan. Silakan coba lagi.');
                        }
                    },
                });
            });
        });

        document.querySelectorAll('.hapus-btn').forEach(button => {
            button.addEventListener('click', function() {
                const irsId = this.dataset.irsId; // Ambil IRS ID dari tombol
                const sks = parseInt(this.dataset.sks);
                const mkId = this.dataset.mkId;

                const day = this.closest('.calendar-cell').dataset.day;
                const time = this.closest('.calendar-cell').dataset.time;
                const scheduleKey = `${day}-${time}`;


                // Pastikan IRS ID ada
                if (!irsId) {
                    alert('Mata kuliah ini belum ditambahkan ke IRS.');
                    return;
                }

                // Konfirmasi penghapusan
                if (!confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?')) {
                    return;
                }

                // Kirim permintaan DELETE ke server
                fetch(`/irs/${irsId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Gagal menghapus data dari server.');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert('Mata kuliah berhasil dihapus!');

                            // Reset tombol Hapus
                            this.dataset.irsId = '';

                            // Remove gray out effect for the specific course
                            // Aktifkan kembali semua tombol untuk mata kuliah ini
                            document.querySelectorAll(`.tambah-btn[data-mk-id="${mkId}"]`).forEach(
                                btn => {
                                    const parentButton = btn.closest('.relative')?.querySelector(
                                        'button');
                                    if (parentButton) {
                                        parentButton.classList.remove('opacity-30',
                                            'pointer-events-none');
                                    }
                                });


                            // Hapus jadwal dan update data
                            totalSKS -= sks;
                            selectedCourses.delete(mkId);
                            delete scheduleMap[scheduleKey];
                            saveState(); // Simpan state ke localStorage

                            document.getElementById('totalSKS').textContent = totalSKS;

                            // Update UI
                            const selectedMatakuliah = document.querySelector(
                                `.matakuliah[data-mk-id="${mkId}"]`);
                            if (selectedMatakuliah) {
                                selectedMatakuliah.classList.remove('selected');
                                const statusElement = selectedMatakuliah.querySelector('.status');
                                statusElement.textContent = 'Belum Terpilih';
                                statusElement.classList.remove('text-green-600');
                                statusElement.classList.add('text-red-600');
                            }

                            alert(`Mata kuliah berhasil dihapus! Total SKS: ${totalSKS}`);

                        } else {
                            alert('Gagal menghapus mata kuliah. ' + (data.message || 'Coba lagi.'));
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        alert('Terjadi kesalahan saat menghapus data. Coba lagi nanti.');
                    });
            });
        });



        let selectedMkIds = new Set();

        // Dropdown untuk memilih matakuliah
        document.getElementById('mk-filter').addEventListener('change', function() {
            const selectedMkId = this.value;

            if (selectedMkId) {
                selectedMkIds.add(selectedMkId);
            }

            document.querySelectorAll('.matakuliah').forEach(item => {
                const mkId = item.dataset.mkId;
                if (selectedMkIds.has(mkId)) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });

            document.querySelectorAll('.calendar-cell .relative.group').forEach(item => {
                const mkId = item.querySelector('.tambah-btn')?.dataset.mkId;
                if (selectedMkIds.has(mkId)) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });

        // Event listener untuk tombol batal
        document.getElementById('matakuliahList').addEventListener('click', function(event) {
            if (event.target.classList.contains('batal-btn')) {
                const mkId = event.target.dataset.mkId;

                selectedMkIds.delete(mkId);

                const matakuliahElement = document.querySelector(`.matakuliah[data-mk-id="${mkId}"]`);
                if (matakuliahElement) {
                    matakuliahElement.classList.add('hidden');
                }

                document.getElementById('mk-filter').value = "";

                document.querySelectorAll('.calendar-cell .relative.group').forEach(item => {
                    const mkIdInCalendar = item.querySelector('.tambah-btn')?.dataset.mkId;
                    if (mkIdInCalendar === mkId) {
                        item.classList.add('hidden');
                    }
                });

                console.log(`Mata kuliah dengan ID ${mkId} dibatalkan.`);
            }
        });
    </script>





@endsection
