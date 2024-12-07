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
</style>

<div class="p-4">
   <a class="text-gray-600 mb-2 -mt-2 inline-block" href="/akademik-mahasiswa">← Kembali</a>
   
   <h2 class="text-center text-2xl font-bold mt-2">Buat IRS</h2>
   
   <div class="border-2 p-4 rounded-md shadow-sm mt-4">
       <h3 class="text-xl font-bold">Rancanglah Isian Rencana Studi (IRS)</h3>
       <p class="text-sm text-gray-600">Ajukan IRS ke Masing - masing Dosen Pembimbing untuk persetujuan</p>
       
       <div class="mt-4 p-4 bg-blue-50 rounded-md">
           <p class="font-semibold">Info Mahasiswa:</p>
           <p>Semester: {{ $mahasiswa->semester }}</p>
           <p>Total SKS yang diambil: <span id="totalSKS" class="font-bold">0</span></p>
           <p class="text-sm text-gray-600">Maksimal SKS yang dapat diambil: 24</p>
       </div>
   </div>

   <div class="flex mt-4">
       <div class="w-1/4 bg-white p-4 border rounded-lg">
           <h4 class="text-center font-bold mb-4">Pilih Matakuliah</h4>
           <div class="mb-4" id="matakuliahList">
               @foreach($mataKuliahs as $mk)
                   <div class="matakuliah bg-gray-100 p-2 rounded-lg mb-2" 
                        data-sks="{{ $mk->sks }}"
                        data-mk-id="{{ $mk->id }}"
                        data-mk-name="{{ $mk->nama_mk }}">
                       <p class="font-bold">{{ $mk->nama_mk }}</p>
                       <p class="text-sm">(Semester {{ $mk->semester }})</p>
                       <p class="text-sm">SKS: {{ $mk->sks }}</p>
                       <p class="status text-right text-xs text-red-600">Belum Terpilih</p>
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
                                            class="rounded p-1.5 border-l-2 {{ $colorClass }} w-full text-left">
                                            <p class="text-xs font-normal mb-px">
                                                {{ $jadwal->mataKuliah->nama_mk }}</p>
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
                                                    data-mk-id="{{ $jadwal->mataKuliah->id }}">
                                                    Tambah
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

<script>
let totalSKS = 0;
const maxSKS = 24;
let selectedCourses = new Set();

document.querySelectorAll('.matakuliah').forEach(item => {
   item.addEventListener('click', function() {
       const sks = parseInt(this.dataset.sks);
       const mkName = this.dataset.mkName;
       const statusElement = this.querySelector('.status');
       
       if(!this.classList.contains('selected')) {
           if(totalSKS + sks > maxSKS) {
               alert(`Total SKS tidak boleh melebihi ${maxSKS}`);
               return;
           }
           
           // Tambahkan ke jadwal
           selectedCourses.add(mkName);
           updateScheduleDisplay();
           
           this.classList.add('selected');
           statusElement.textContent = 'Terpilih';
           statusElement.classList.remove('text-red-600');
           statusElement.classList.add('text-green-600');
           totalSKS += sks;
       } else {
           // Hapus dari jadwal
           selectedCourses.delete(mkName);
           updateScheduleDisplay();
           
           this.classList.remove('selected');
           statusElement.textContent = 'Belum Terpilih';
           statusElement.classList.remove('text-green-600');
           statusElement.classList.add('text-red-600');
           totalSKS -= sks;
       }
       
       document.getElementById('totalSKS').textContent = totalSKS;
   });
});

function updateScheduleDisplay() {
   document.querySelectorAll('.jadwal-item').forEach(item => {
       const mkName = item.dataset.mkName;
       if(selectedCourses.has(mkName)) {
           item.style.display = 'block';
       } else {
           item.style.display = 'none';
       }
   });
}

document.querySelectorAll('.tambah-btn').forEach(button => {
    button.addEventListener('click', function () {
        const sks = parseInt(this.dataset.sks);
        const mkId = this.dataset.mkId;

        if (totalSKS + sks > maxSKS) {
            alert(`Total SKS tidak boleh melebihi ${maxSKS}`);
            return;
        }

        totalSKS += sks;
        document.getElementById('totalSKS').textContent = totalSKS;

        // Temukan kolom "Pilih Mata Kuliah" terkait
        const selectedMatakuliah = document.querySelector(`.matakuliah[data-mk-id="${mkId}"]`);
        if (selectedMatakuliah) {
            selectedMatakuliah.classList.add('selected');
            const statusElement = selectedMatakuliah.querySelector('.status');
            statusElement.textContent = 'Terpilih';
            statusElement.classList.remove('text-red-600');
            statusElement.classList.add('text-green-600');
        }

        alert(`Mata kuliah berhasil ditambahkan! Total SKS: ${totalSKS}`);
    });
});


</script>
@endsection