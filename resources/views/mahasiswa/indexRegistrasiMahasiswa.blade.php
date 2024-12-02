<html>
 <head>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
 </head>
 <body class="font-roboto">
  <div class="bg-white min-h-screen">
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
   <main class="p-8">
    <a class="text-gray-600 mb-4 -mt-5 inline-block" href="/dashboard-mahasiswa">
     ← Back
    </a>
    <h2 class="text-2xl font-bold text-center mb-8">
     Registrasi Mahasiswa
    </h2>
    <div class="flex justify-center space-x-8 mb-8">
     <div class="border p-4 w-1/3 flex flex-col items-center rounded-xl shadow-lg bg-[F9F7F7]">
      <img alt="Aktif Icon" class="h-12 w-12 mb-4" height="50" src="https://storage.googleapis.com/a1aa/image/zJjBrvhW9SJuC1JMadWoKI4I6r2rvsyO2LebCsiaqKa5bJ3JA.jpg" width="50"/>
      <p class="text-center mb-4">
       Anda akan mengikuti Perkuliahan dan Aktif sebagai Mahasiswa
      </p>
      <a href="/pembayaranUKT-mahasiswa">
        <button class="bg-green-500 text-white px-4 py-2 rounded mt-7">
          AKTIF
         </button>
      </a>
     </div>
     <div class="border p-4 w-1/3 flex flex-col items-center rounded-xl shadow-lg bg-[F9F7F7]">
      <img alt="Cuti Icon" class="h-12 w-12 mb-4" src="https://placehold.co/50x50"/>
      <p class="text-center mb-4">
       Menghentikan perkuliahan sementara untuk semester ini tanpa menghilangkan status sebagai Mahasiswa
      </p>
      <button class="bg-red-500 text-white px-4 py-2 rounded">
       CUTI
      </button>
     </div>
    </div>
    <div class="flex justify-center space-x-8">
     <div class="border p-4 w-1/3 rounded-xl shadow-lg bg-[F9F7F7]">
      <h3 class="text-center font-bold mb-4">
       Mengenai Aktif
      </h3>
      <ul class="list-disc list-inside">
       <li>
        Mahasiswa yang ingin Aktif dalam perkuliahan wajib melakukan Registrasi terlebih dahulu
       </li>
       <li>
        Mahasiswa yang memiliki status Aktif diperbolehkan mengisi IRS pada halaman Akademik
       </li>
       <li>
        Mahasiswa berStatus Aktif bertanggung jawab atas perkuliahan nya
       </li>
      </ul>
     </div>
     <div class="border p-4 w-1/3 rounded-xl shadow-lg bg-[F9F7F7]">
      <h3 class="text-center font-bold mb-4 ">
       Mengenai Cuti
      </h3>
      <ul class="list-disc list-inside">
       <li>
        Mahasiswa yang ingin Aktif dalam perkuliahan wajib melakukan Registrasi terlebih dahulu
       </li>
       <li>
        Mahasiswa yang memiliki status Aktif diperbolehkan mengisi IRS pada halaman Akademik
       </li>
       <li>
        Mahasiswa berStatus Aktif bertanggung jawab atas perkuliahan nya
       </li>
      </ul>
     </div>
    </div>
   </main>
  </div>
 </body>
</html>
