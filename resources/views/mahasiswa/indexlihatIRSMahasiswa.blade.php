<html>
 <head>
  <title>
   SI-LET
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
  <div class="p-3">
    <a class="text-gray-600 mb-4 -mt-1 inline-block" href="/akademik-mahasiswa">
      ← Back
     </a>
   <h2 class="text-center text-2xl font-bold mb-4">
    IRS
   </h2>
   <div class="border-2 p-4 rounded-md shadow-sm">
    <h3 class="text-xl font-bold mb-4">
     Isian Rencana Semester (IRS)
    </h3>
    <div class="bg-[DCEFEF] p-4 mb-2 flex justify-between items-center">
     <span>
      Semester - 1 | Tahun ajaran 2023/2024 Ganjil
     </span>
     <i class="fas fa-plus-square text-gray-600">
     </i>
    </div>
    <div class="bg-[DCEFEF] p-4 flex justify-between items-center">
     <span>
      Semester - 2 | Tahun ajaran 2023/2024 Genap
     </span>
     <i class="fas fa-plus-square text-gray-600">
     </i>
    </div>
   </div>
  </div>
 </body>
</html>
