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

   .selected p {
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
           <div class="overflow-x-auto">
               <div class="min-w-[800px]">
                   <div class="grid grid-cols-8 gap-1">
                       <div class="text-center font-bold text-sm p-2 bg-gray-50">Waktu</div>
                       @foreach(['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                           <div class="text-center font-bold text-sm p-2 bg-gray-50">{{ $hari }}</div>
                       @endforeach

                       @for($jam = 6; $jam <= 17; $jam++)
                           <div class="text-center text-xs py-2 border-t">
                               {{ str_pad($jam, 2, '0', STR_PAD_LEFT) }}:00
                           </div>

                           @foreach(['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                               <div class="border-t p-1 min-h-12">
                                   @foreach($jadwals as $jadwal)
                                       @if($jadwal->hari === $hari && date('H', strtotime($jadwal->jam_mulai)) == $jam)
                                        <div class="jadwal-item bg-emerald-50 p-2 rounded text-xs"  data-mk-name="{{ $jadwal->mataKuliah->nama_mk }}" style="display: none;">
                                          <div class="font-bold">{{ $jadwal->mataKuliah->nama_mk }}</div>
                                          <div>Kelas {{ $jadwal->kelas }}</div>
                                          <div>Ruang {{ $jadwal->ruang->noruang }} - {{ $jadwal->ruang->nama }}</div>
                                          <div>{{ date('H:i', strtotime($jadwal->jam_mulai)) }} - {{ date('H:i', strtotime($jadwal->jam_selesai)) }}</div>
                                        </div>
                                       @endif
                                   @endforeach
                               </div>
                           @endforeach
                       @endfor
                   </div>
               </div>
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
</script>
@endsection