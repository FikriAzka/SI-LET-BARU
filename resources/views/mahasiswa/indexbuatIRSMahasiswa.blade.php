<html>
 <head>
  <title>
   Buat IRS
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
 </head>
 <body class="font-roboto bg-gray-100">
    <header class="bg-[9BC0C0] p-0.5 flex justify-between items-center">
        <div class="flex items-center">
         <img alt="SI-LET Logo" class=" h-24 w-24 mr-2" src="assets/silet_logo.png" />
         <div>
          <h1 class="text-xl font-bold">
           SI-LET
          </h1>
          <p class="text-sm">
           Sistem Informasi &amp; Laporan Edukasi Terintegrasi
          </p>
         </div>
        </div>
        <div class="flex items-center space-x-4 mr-7">
            <img class= "w-12 h-12" src="assets/user.png" alt="userlogo">
            <div class="relative">
             <img 
               class="w-14 h-14 cursor-pointer" 
               src="assets/menu-bar.png" 
               alt="menubar" 
               onclick="toggleDropdown()"
             >
             <!-- Dropdown Menu -->
             <div id="dropdown" class="hidden absolute right-0 mt-2 w-32 bg-white border border-gray-200 rounded-md shadow-lg">
                <a href="/dashboard-mahasiswa" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                <a href="/akademik-mahasiswa" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Akademik</a>
                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
              </div>
           </div>
         
           <script>
             function toggleDropdown() {
               const dropdown = document.getElementById("dropdown");
               dropdown.classList.toggle("hidden");
             }
         
             // Menutup dropdown jika pengguna mengklik di luar elemen dropdown
             window.onclick = function(event) {
               const dropdown = document.getElementById("dropdown");
               if (!event.target.closest('img')) { // Pastikan tidak mengklik icon menu bar
                 dropdown.classList.add('hidden'); // Tutup dropdown
               }
             }
           </script>
            </a>
           </div>
       </header>
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
      <div class="bg-green-200 p-2 rounded-lg mb-2">
       <p class="font-bold">
        Machine Learning
       </p>
       <p class="text-sm">
        (Semester 5)
       </p>
       <p class="text-right text-xs text-green-600">
        Terpilih
       </p>
      </div>
      <div class="bg-green-200 p-2 rounded-lg mb-2">
       <p class="font-bold">
        Sistem Informasi
       </p>
       <p class="text-sm">
        (Semester 5)
       </p>
       <p class="text-right text-xs text-green-600">
        Terpilih
       </p>
      </div>
      <div class="bg-green-200 p-2 rounded-lg mb-2">
       <p class="font-bold">
        Komputasi Tersebar Paralel
       </p>
       <p class="text-sm">
        (Semester 5)
       </p>
       <p class="text-right text-xs text-green-600">
        Terpilih
       </p>
      </div>
      <div class="bg-red-200 p-2 rounded-lg mb-2">
       <p class="font-bold">
        Pemrograman Berbasis Platform
       </p>
       <p class="text-sm">
        (Semester 5)
       </p>
       <p class="text-right text-xs text-red-600">
        Belum Terpilih
       </p>
      </div>
     </div>
     <h4 class="text-center font-bold mb-4">
      Pilihan
     </h4>
     <div class="mb-4">
      <div class="bg-gray-100 p-2 rounded-lg mb-2 flex justify-between items-center">
       <div>
        <p class="font-bold">
         Teori Bahasa Otomatis
        </p>
        <p class="text-sm">
         (Semester 7)
        </p>
       </div>
       <button class="bg-blue-500 text-white px-2 py-1 rounded-lg">
        Ajukan
       </button>
      </div>
      <div class="bg-gray-100 p-2 rounded-lg mb-2 flex justify-between items-center">
       <div>
        <p class="font-bold">
         Dasar Pemrograman
        </p>
        <p class="text-sm">
         (Semester 1)
        </p>
       </div>
       <button class="bg-blue-500 text-white px-2 py-1 rounded-lg">
        Ajukan
       </button>
      </div>
      <div class="bg-gray-100 p-2 rounded-lg mb-2 flex justify-between items-center">
       <div>
        <p class="font-bold">
         Struktur Data
        </p>
        <p class="text-sm">
         (Semester 3)
        </p>
       </div>
       <button class="bg-blue-500 text-white px-2 py-1 rounded-lg">
        Ajukan
       </button>
      </div>
     </div>
    </div>
    <div class="w-3/4 ml-4 bg-white p-4 border rounded-lg">
     <div class="grid grid-cols-7 gap-2 text-center text-sm font-bold">
      <div>
       Sunday 07/10
       <br/>
       (0 tasks)
      </div>
      <div>
       Monday 07/11
       <br/>
       (1 tasks)
      </div>
      <div>
       Tuesday 07/12
       <br/>
       (0 tasks)
      </div>
      <div>
       Wednesday 07/13
       <br/>
       (0 tasks)
      </div>
      <div>
       Thursday 07/14
       <br/>
       (1 tasks)
      </div>
      <div>
       Friday 07/15
       <br/>
       (1 tasks)
      </div>
      <div>
       Saturday 07/16
       <br/>
       (0 tasks)
      </div>
     </div>
     <div class="grid grid-cols-7 gap-2 mt-2 text-center text-xs">
      <div class="border-t border-r h-16">
       6:00 AM
      </div>
      <div class="border-t border-r h-16">
       6:00 AM
      </div>
      <div class="border-t border-r h-16">
       6:00 AM
      </div>
      <div class="border-t border-r h-16">
       6:00 AM
      </div>
      <div class="border-t border-r h-16">
       6:00 AM
      </div>
      <div class="border-t border-r h-16">
       6:00 AM
      </div>
      <div class="border-t h-16">
       6:00 AM
      </div>
      <div class="border-t border-r h-16">
       7:00 AM
      </div>
      <div class="border-t border-r h-16">
       7:00 AM
      </div>
      <div class="border-t border-r h-16">
       7:00 AM
      </div>
      <div class="border-t border-r h-16">
       7:00 AM
      </div>
      <div class="border-t border-r h-16">
       7:00 AM
      </div>
      <div class="border-t border-r h-16">
       7:00 AM
      </div>
      <div class="border-t h-16">
       7:00 AM
      </div>
      <div class="border-t border-r h-16">
       8:00 AM
      </div>
      <div class="border-t border-r h-16 bg-green-200">
       <p>
        07:00 AM - 09:30 AM
       </p>
       <p>
        Sistem Informasi
       </p>
       <p>
        Kelas A
       </p>
      </div>
      <div class="border-t border-r h-16">
       8:00 AM
      </div>
      <div class="border-t border-r h-16">
       8:00 AM
      </div>
      <div class="border-t border-r h-16">
       8:00 AM
      </div>
      <div class="border-t border-r h-16">
       8:00 AM
      </div>
      <div class="border-t h-16">
       8:00 AM
      </div>
      <div class="border-t border-r h-16">
       9:00 AM
      </div>
      <div class="border-t border-r h-16">
       9:00 AM
      </div>
      <div class="border-t border-r h-16">
       9:00 AM
      </div>
      <div class="border-t border-r h-16">
       9:00 AM
      </div>
      <div class="border-t border-r h-16">
       9:00 AM
      </div>
      <div class="border-t border-r h-16">
       9:00 AM
      </div>
      <div class="border-t h-16">
       9:00 AM
      </div>
      <div class="border-t border-r h-16">
       10:00 AM
      </div>
      <div class="border-t border-r h-16">
       10:00 AM
      </div>
      <div class="border-t border-r h-16 bg-green-200">
       <p>
        08:00 AM - 10:30 AM
       </p>
       <p>
        Komputasi Tersebar dan Paralel
       </p>
       <p>
        Kelas C
       </p>
      </div>
      <div class="border-t border-r h-16">
       10:00 AM
      </div>
      <div class="border-t border-r h-16">
       10:00 AM
      </div>
      <div class="border-t border-r h-16">
       10:00 AM
      </div>
      <div class="border-t h-16">
       10:00 AM
      </div>
      <div class="border-t border-r h-16">
       11:00 AM
      </div>
      <div class="border-t border-r h-16">
       11:00 AM
      </div>
      <div class="border-t border-r h-16">
       11:00 AM
      </div>
      <div class="border-t border-r h-16">
       11:00 AM
      </div>
      <div class="border-t border-r h-16">
       11:00 AM
      </div>
      <div class="border-t border-r h-16">
       11:00 AM
      </div>
      <div class="border-t h-16">
       11:00 AM
      </div>
      <div class="border-t border-r h-16">
       12:00 PM
      </div>
      <div class="border-t border-r h-16">
       12:00 PM
      </div>
      <div class="border-t border-r h-16">
       12:00 PM
      </div>
      <div class="border-t border-r h-16">
       12:00 PM
      </div>
      <div class="border-t border-r h-16">
       12:00 PM
      </div>
      <div class="border-t border-r h-16">
       12:00 PM
      </div>
      <div class="border-t h-16">
       12:00 PM
      </div>
      <div class="border-t border-r h-16">
       1:00 PM
      </div>
      <div class="border-t border-r h-16">
       1:00 PM
      </div>
      <div class="border-t border-r h-16">
       1:00 PM
      </div>
      <div class="border-t border-r h-16">
       1:00 PM
      </div>
      <div class="border-t border-r h-16">
       1:00 PM
      </div>
      <div class="border-t border-r h-16">
       1:00 PM
      </div>
      <div class="border-t h-16">
       1:00 PM
      </div>
      <div class="border-t border-r h-16">
       2:00 PM
      </div>
      <div class="border-t border-r h-16">
       2:00 PM
      </div>
      <div class="border-t border-r h-16">
       2:00 PM
      </div>
      <div class="border-t border-r h-16">
       2:00 PM
      </div>
      <div class="border-t border-r h-16">
       2:00 PM
      </div>
      <div class="border-t border-r h-16">
       2:00 PM
      </div>
      <div class="border-t h-16">
       2:00 PM
      </div>
      <div class="border-t border-r h-16">
       3:00 PM
      </div>
      <div class="border-t border-r h-16">
       3:00 PM
      </div>
      <div class="border-t border-r h-16">
       3:00 PM
      </div>
      <div class="border-t border-r h-16">
       3:00 PM
      </div>
      <div class="border-t border-r h-16">
       3:00 PM
      </div>
      <div class="border-t border-r h-16">
       3:00 PM
      </div>
      <div class="border-t h-16">
       3:00 PM
      </div>
      <div class="border-t border-r h-16">
       4:00 PM
      </div>
      <div class="border-t border-r h-16">
       4:00 PM
      </div>
      <div class="border-t border-r h-16">
       4:00 PM
      </div>
      <div class="border-t border-r h-16">
       4:00 PM
      </div>
      <div class="border-t border-r h-16">
       4:00 PM
      </div>
      <div class="border-t border-r h-16">
       4:00 PM
      </div>
      <div class="border-t h-16">
       4:00 PM
      </div>
      <div class="border-t border-r h-16">
       5:00 PM
      </div>
      <div class="border-t border-r h-16">
       5:00 PM
      </div>
      <div class="border-t border-r h-16">
       5:00 PM
      </div>
      <div class="border-t border-r h-16">
       5:00 PM
      </div>
      <div class="border-t border-r h-16">
       5:00 PM
      </div>
      <div class="border-t border-r h-16">
       5:00 PM
      </div>
      <div class="border-t h-16">
       5:00 PM
      </div>
      <div class="border-t border-r h-16">
       6:00 PM
      </div>
      <div class="border-t border-r h-16">
       6:00 PM
      </div>
      <div class="border-t border-r h-16">
       6:00 PM
      </div>
      <div class="border-t border-r h-16">
       6:00 PM
      </div>
      <div class="border-t border-r h-16">
       6:00 PM
      </div>
      <div class="border-t border-r h-16">
       6:00 PM
      </div>
      <div class="border-t h-16">
       6:00 PM
      </div>
      <div class="border-t border-r h-16">
       7:00 PM
      </div>
      <div class="border-t border-r h-16">
       7:00 PM
      </div>
      <div class="border-t border-r h-16">
       7:00 PM
      </div>
      <div class="border-t border-r h-16">
       7:00 PM
      </div>
      <div class="border-t border-r h-16">
       7:00 PM
      </div>
      <div class="border-t border-r h-16">
       7:00 PM
      </div>
      <div class="border-t h-16">
       7:00 PM
      </div>
      <div class="border-t border-r h-16">
       8:00 PM
      </div>
      <div class="border-t border-r h-16">
       8:00 PM
      </div>
      <div class="border-t border-r h-16">
       8:00 PM
      </div>
      <div class="border-t border-r h-16">
       8:00 PM
      </div>
      <div class="border-t border-r h-16">
       8:00 PM
      </div>
      <div class="border-t border-r h-16">
       8:00 PM
      </div>
      <div class="border-t h-16">
       8:00 PM
      </div>
      <div class="border-t border-r h-16">
       9:00 PM
      </div>
      <div class="border-t border-r h-16">
       9:00 PM
      </div>
      <div class="border-t border-r h-16">
       9:00 PM
      </div>
      <div class="border-t border-r h-16">
       9:00 PM
      </div>
      <div class="border-t border-r h-16">
       9:00 PM
      </div>
      <div class="border-t border-r h-16">
       9:00 PM
      </div>
      <div class="border-t h-16">
       9:00 PM
      </div>
      <div class="border-t border-r h-16">
       10:00 PM
      </div>
      <div class="border-t border-r h-16">
       10:00 PM
      </div>
      <div class="border-t border-r h-16">
       10:00 PM
      </div>
      <div class="border-t border-r h-16">
       10:00 PM
      </div>
      <div class="border-t border-r h-16">
       10:00 PM
      </div>
      <div class="border-t border-r h-16">
       10:00 PM
      </div>
      <div class="border-t h-16">
       10:00 PM
      </div>
      <div class="border-t border-r h-16">
       11:00 PM
      </div>
      <div class="border-t border-r h-16">
       11:00 PM
      </div>
      <div class="border-t border-r h-16">
       11:00 PM
      </div>
      <div class="border-t border-r h-16">
       11:00 PM
      </div>
      <div class="border-t border-r h-16">
       11:00 PM
      </div>
      <div class="border-t border-r h-16">
       11:00 PM
      </div>
      <div class="border-t h-16">
       11:00 PM
      </div>
     </div>
     <div class="grid grid-cols-7 gap-2 mt-2 text-center text-xs">
      <div class="border-t border-r h-16">
       8:00 AM
      </div>
      <div class="border-t border-r h-16 bg-green-200">
       <p>
        07:00 AM - 09:30 AM
       </p>
       <p>
        Sistem Informasi
       </p>
       <p>
        Kelas A
       </p>
      </div>
      <div class="border-t border-r h-16">
       8:00 AM
      </div>
      <div class="border-t border-r h-16">
       8:00 AM
      </div>
      <div class="border-t border-r h-16">
       8:00 AM
      </div>
      <div class="border-t border-r h-16">
       8:00 AM
      </div>
      <div class="border-t h-16">
       8:00 AM
      </div>
      <div class="border-t border-r h-16">
       9:00 AM
      </div>
      <div class="border-t border-r h-16">
       9:00 AM
      </div>
      <div class="border-t border-r h-16">
       9:00 AM
      </div>
      <div class="border-t border-r h-16">
       9:00 AM
      </div>
      <div class="border-t border-r h-16">
       9:00 AM
      </div>
      <div class="border-t border-r h-16">
       9:00 AM
      </div>
      &lt;div class="
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
