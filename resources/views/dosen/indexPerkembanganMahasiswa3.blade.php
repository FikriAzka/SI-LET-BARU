<html>
 <head>
  <title>
   SI-LET - Status Perkembangan Mahasiswa
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
                <a href="/dashboard-dosen" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
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
        </div>
       </header>
       <div class="p-4">
        <a class="text-gray-600 text-sm mb-4 inline-block" href="/perkembanganmahasiswa-dosen2">
         ← Back
        </a>
        <h2 class="text-xl font-bold mb-4">
         STATUS PERKEMBANGAN MAHASISWA
        </h2>
        <div class="flex justify-between items-center mb-4">
         <div>
          <label class="block text-gray-700" for="angkatan">
           Angkatan
          </label>
          <select class="border border-gray-300 rounded p-2" id="angkatan">
           <option>
            2024
           </option>
          </select>
         </div>
         <div class="flex-grow flex justify-center">
          <div class="text-center">
            <p class="text-gray-700">
             Fakultas Sains dan Matematika
            </p>
            <p class="text-gray-700">
             Jurusan S1 Informatika
            </p>
            <p class="text-gray-700">
             Kelas A
            </p>
          </div>
         </div>
        </div>
        <table class="w-full border-collapse border border-gray-300">
         <thead>
          <tr class="bg-[9BC0C0]">
           <th class="border border-gray-300 p-2">
            No
           </th>
           <th class="border border-gray-300 p-2">
            Nama
           </th>
           <th class="border border-gray-300 p-2">
            NIM
           </th>
           <th class="border border-gray-300 p-2">
            Status
           </th>
          </tr>
         </thead>
         <tbody>
          <tr>
           <td class="border border-gray-300 p-2 text-center">
            1
           </td>
           <td class="border border-gray-300 p-2">
            Budi Hartanto
           </td>
           <td class="border border-gray-300 p-2">
            24060123456789
           </td>
           <td class="border border-gray-300 p-2">
            Aktif
           </td>
          </tr>
          <tr>
           <td class="border border-gray-300 p-2 text-center">
            2
           </td>
           <td class="border border-gray-300 p-2">
            Anto Pujiono
           </td>
           <td class="border border-gray-300 p-2">
            24060123134155
           </td>
           <td class="border border-gray-300 p-2">
            Cuti
           </td>
          </tr>
         </tbody>
        </table>
       </div>
     
 </body>
</html>
