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

  <script>
    document.querySelectorAll('.matakuliah').forEach(item => {
      item.addEventListener('click', function() {
        item.classList.toggle('selected');
      });
    });
  </script>

  <div class="p-4">
    <a class="text-gray-600 mb-2 -mt-2 inline-block" href="/akademik-mahasiswa">
        ← Back
      </a>
  <h2 class="text-center text-2xl font-bold mt-2">
    Buat IRS
  </h2>
  <div class="border-2 p-4 rounded-md shadow-sm mt-4">
    <h3 class="text-xl font-bold">
    Rancanglah Isian Rencana Studi (IRS)
    </h3>
    <p class="text-sm text-gray-600">
    Ajukan IRS ke Masing - masing Dosen Pembimbing untuk persetujuan
    </p>
  </div>

  <div class="flex mt-4">
    <div class="w-1/4 bg-white p-4 border rounded-lg">
      <h4 class="text-center font-bold mb-4">
        Pilih Matakuliah
      </h4>
      <div class="mb-4">
        <div class="matakuliah bg-gray-100 p-2 rounded-lg mb-2">
          <p class="font-bold">Machine Learning</p>
          <p class="text-sm">(Semester 5)</p>
          <p class="text-right text-xs text-green-600">Terpilih</p>
        </div>
        <div class="matakuliah bg-gray-100 p-2 rounded-lg mb-2">
          <p class="font-bold">Sistem Informasi</p>
          <p class="text-sm">(Semester 5)</p>
          <p class="text-right text-xs text-green-600">Terpilih</p>
        </div>
        <div class="matakuliah bg-gray-100 p-2 rounded-lg mb-2">
          <p class="font-bold">Komputasi Tersebar Paralel</p>
          <p class="text-sm">(Semester 5)</p>
          <p class="text-right text-xs text-green-600">Terpilih</p>
        </div>
        <!-- Matakuliah Belum Terpilih (Background Merah) -->
        <div class="matakuliah bg-gray-100 p-2 rounded-lg mb-2">
          <p class="font-bold">Pemrograman Berbasis Platform</p>
          <p class="text-sm">(Semester 5)</p>
          <p class="text-right text-xs text-red-600">Belum Terpilih</p>
        </div>
      </div>

      <!-- Pilihan Matakuliah Lainnya -->
      <h4 class="text-center font-bold mb-4">
        Pilihan
      </h4>
      <div class="mb-4">
        <div class="matakuliah bg-gray-100 p-2 rounded-lg mb-2 flex justify-between items-center">
          <div>
            <p class="font-bold">Teori Bahasa Otomatis</p>
            <p class="text-sm">(Semester 7)</p>
          </div>
        </div>
        <div class="matakuliah bg-gray-100 p-2 rounded-lg mb-2 flex justify-between items-center">
          <div>
            <p class="font-bold">Dasar Pemrograman</p>
            <p class="text-sm">(Semester 1)</p>
          </div>
        </div>
        <div class="matakuliah bg-gray-100 p-2 rounded-lg mb-2 flex justify-between items-center">
          <div>
            <p class="font-bold">Struktur Data</p>
            <p class="text-sm">(Semester 3)</p>
          </div>
        </div>
      </div>
    </div>

    <div class="w-3/4 ml-4 bg-white p-4 border rounded-lg">
      <div class="grid grid-cols-7 gap-2 text-center text-sm font-bold">
        <div>Sunday 07/10<br>(0 tasks)</div>
        <div>Monday 07/11<br>(1 task)</div>
        <div>Tuesday 07/12<br>(0 tasks)</div>
        <div>Wednesday 07/13<br>(0 tasks)</div>
        <div>Thursday 07/14<br>(1 task)</div>
        <div>Friday 07/15<br>(1 task)</div>
        <div>Saturday 07/16<br>(0 tasks)</div>
      </div>

      <div class="grid grid-cols-7 gap-2 mt-2 text-center text-xs">
        <div class="border-t border-r h-16">6:00 AM</div>
        <div class="border-t border-r h-16 bg-gray-100">
          <p>07:00 AM - 09:30 AM</p>
          <p>Sistem Informasi</p>
          <p>Kelas A</p>
        </div>
        <div class="border-t border-r h-16">8:00 AM</div>
        <div class="border-t border-r h-16">9:00 AM</div>
        <div class="border-t border-r h-16">10:00 AM</div>
      </div>
    </div>
  </div>

  </div>

@endsection
