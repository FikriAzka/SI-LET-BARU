<html>
 <head>
  <title>
   Verifikasi IRS
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-gray-100">
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
             <a href="/dashboard-kaprodi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
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
   <a class="text-gray-600 text-sm mb-4 inline-block" href="/verifikasiIRS-kaprodi">
    ← Back
   </a>
   <h2 class="text-2xl font-bold mb-4">
    Verifikasi IRS
   </h2>
   <div class="flex mb-4">
    <div class="mr-4">
     <label class="block text-gray-700" for="angkatan">
      Angkatan
     </label>
     <select class="border border-gray-300 rounded p-2" id="angkatan">
        <option>
        -Pilih Angkatan-
        </option>
        <option>
       2024
      </option>
     </select>
    </div>
    <div>
     <label class="block text-gray-700" for="kelas">
      Kelas
     </label>
     <select class="border border-gray-300 rounded p-2" id="kelas">
      <option>
      -Pilih Kelas-
      </option>
      <option>
       A
      </option>
     </select>
    </div>
   </div>
   <p class="text-gray-700 mb-2">
    Daftar Mahasiswa :
   </p>
   <table class="min-w-full bg-white border border-gray-400">
    <thead>
     <tr>
      <th class="border bg-gray-200 border-gray-400 px-4 py-2">
       No
      </th>
      <th class="border bg-gray-200 border-gray-400 px-4 py-2">
       Nama
      </th>
      <th class="border bg-gray-200 border-gray-400 px-4 py-2">
       NIM
      </th>
      <th class="border bg-gray-200 border-gray-400 px-4 py-2">
       Status
      </th>
      <th class="border bg-gray-200 border-gray-400 px-4 py-2">
       Semester
      </th>
      <th class="border bg-gray-200 border-gray-400 px-4 py-2">
       IRS
      </th>
      <th class="border bg-gray-200 border-gray-400 px-4 py-2">
       Verifikasi
      </th>
     </tr>
    </thead>
    <tbody>
     <tr>
      <td class="border border-gray-400 px-4 py-2 text-center">
       1
      </td>
      <td class="border border-gray-400 px-4 py-2">
       Budi Hartanto
      </td>
      <td class="border border-gray-400 px-4 py-2">
       24060123456789
      </td>
      <td class="border border-gray-400 px-4 py-2">
       Aktif
      </td>
      <td class="border border-gray-400 px-4 py-2">
       1 - 2024/2025
      </td>
      <td class="border border-gray-400 px-4 py-2 text-blue-500">
       <a href="#">
        Cek
       </a>
      </td>
      <td class="border border-gray-400 px-4 py-2 text-center">
       <i class="fas fa-times text-red-500">
       </i>
       <i class="fas fa-check text-green-500">
       </i>
      </td>
     </tr>
     <tr>
      <td class="border border-gray-400 px-4 py-2 text-center">
       2
      </td>
      <td class="border border-gray-400 px-4 py-2">
       Andi Maharaja
      </td>
      <td class="border border-gray-400 px-4 py-2">
       24060123457890
      </td>
      <td class="border border-gray-400 px-4 py-2">
       Cuti
      </td>
      <td class="border border-gray-400 px-4 py-2">
       1 - 2024/2025
      </td>
      <td class="border border-gray-400 px-4 py-2 text-blue-500">
       <a href="#">
        Cek
       </a>
      </td>
      <td class="border border-gray-400 px-4 py-2 text-center">
       <i class="fas fa-times text-red-500">
       </i>
       <i class="fas fa-check text-green-500">
       </i>
      </td>
     </tr>
    </tbody>
   </table>
  </div>
 </body>
</html>
