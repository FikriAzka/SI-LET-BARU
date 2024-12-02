<html>
 <head>
  <title>
   Penyusunan Jadwal Kuliah
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
        </div>
       </header>
  <div class="p-4">
   <a class="text-gray-600 text-sm mb-4 inline-block" href="/penyusunanjadwalkuliah-kaprodi2">
    ← Back
   </a>
   <h2 class="text-2xl font-bold mb-4">
    Penyusunan Jadwal Kuliah
   </h2>
   <div class="flex mb-4">
    <div class="mr-4">
     <label class="block text-gray-700" for="angkatan">
      Angkatan
     </label>
     <select class="border border-gray-300 p-2 rounded" id="angkatan">
      <option>
       2022
      </option>
      <option>
       2023
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
     <select class="border border-gray-300 p-2 rounded" id="kelas">
      <option>
       A
      </option>
      <option>
       B
      </option>
      <option>
       C
      </option>
     </select>
    </div>
   </div>
   <p class="text-gray-700 mb-2">
    Daftar Mahasiswa :
   </p>
   <table class="w-full border-collapse border border-gray-300">
    <thead>
     <tr>
      <th class="border border-gray-400 bg-gray-300 p-2">
       No
      </th>
      <th class="border border-gray-400 bg-gray-300 p-2">
       Mata Kuliah
      </th>
      <th class="border border-gray-400 bg-gray-300 p-2">
       Dosen
      </th>
      <th class="border border-gray-400 bg-gray-300 p-2">
       Tanggal
      </th>
      <th class="border border-gray-400 bg-gray-300 p-2">
       Jam Mulai
      </th>
      <th class="border border-gray-400 bg-gray-300 p-2">
       Jam Selesai
      </th>
      <th class="border border-gray-400 bg-gray-300 p-2">
       Ket
      </th>
     </tr>
    </thead>
    <tbody>
     <tr>
      <td class="border border-gray-300 p-2">
       1
      </td>
      <td class="border border-gray-300 p-2">
       Struktur Data
      </td>
      <td class="border border-gray-300 p-2">
       Pak Sandy
      </td>
      <td class="border border-gray-300 p-2">
       11-09-2024
      </td>
      <td class="border border-gray-300 p-2">
       07.00 WIB
      </td>
      <td class="border border-gray-300 p-2">
       09.40 WIB
      </td>
      <td class="border border-gray-300 p-2 relative">
        <button class="text-gray-600" onclick="toggleMenu(this)">
            <i class="fas fa-chevron-down"></i>
        </button>
        <!-- Dropdown Menu -->
        <div class="dropdown-menu hidden absolute right-4 mt-2 w-24 bg-white border border-gray-200 rounded-md shadow-lg z-50">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Detail</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Hapus</a>
        </div>
      </td>
    
    <script>
        function toggleMenu(button) {
            // Find the dropdown menu in the same <td>
            const dropdown = button.nextElementSibling;
            // Toggle the hidden class
            dropdown.classList.toggle("hidden");
        }
    
        // Close dropdowns if clicking outside
        window.onclick = function(event) {
            if (!event.target.closest('button')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });
            }
        }
    </script>
    
     </tr>
     <tr>
      <td class="border border-gray-300 p-2">
       2
      </td>
      <td class="border border-gray-300 p-2">
       --
      </td>
      <td class="border border-gray-300 p-2">
       --
      </td>
      <td class="border border-gray-300 p-2">
       --
      </td>
      <td class="border border-gray-300 p-2">
       --
      </td>
      <td class="border border-gray-300 p-2">
       --
      </td>
      <td class="border border-gray-300 p-2 relative">
        <button class="text-gray-600" onclick="toggleMenu(this)">
            <i class="fas fa-chevron-down"></i>
        </button>
        <!-- Dropdown Menu -->
        <div class="dropdown-menu hidden absolute right-4 mt-2 w-24 bg-white border border-gray-200 rounded-md shadow-lg z-50">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Detail</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Hapus</a>
        </div>
      </td>
    
    <script>
        function toggleMenu(button) {
            // Find the dropdown menu in the same <td>
            const dropdown = button.nextElementSibling;
            // Toggle the hidden class
            dropdown.classList.toggle("hidden");
        }
    
        // Close dropdowns if clicking outside
        window.onclick = function(event) {
            if (!event.target.closest('button')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });
            }
        }
    </script>
     </tr>
    </tbody>
   </table>
    <div class="flex justify-center mt-6" >
      <a class="bg-green-500 text-white px-4 py-2 rounded" href="/penyusunanjadwalkuliah-kaprodi4">
       Lihat Jadwal Sementara
      </a>
     </div>
  </div>
 </body>
</html>
