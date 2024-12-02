<html>
 <head>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
        }
  </style>
 </head>
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
    <h2 class="text-3xl font-bold text-center mb-8">
      Dashboard
    </h2>
   <div class="flex justify-center mb-8">
    <div class="border rounded-lg p-6 w-96 text-center">
     <i class="fas fa-user-circle text-6xl mb-4">
     </i>
     <h3 class="font-bold text-xl">
      Bruce Wayne
     </h3>
     <p>
      566646453345
     </p>
     <p>
      Fakultas Sains dan Matematika
     </p>
     <p>
      akubetmen@dekan.co.id
     </p>
    </div>
   </div>
   <div class="flex justify-center space-x-8">
    <a href = "{{ route('dosen.statusperkembangan') }}">
      <div class="bg-green-200  p-6 w-80 rounded-lg text-center shadow-lg">
        <p class=" text-xl text-center font-bold">
         Perkembangan Mahasiswa
        </p>
       </div>
    </a>
    <a href = "{{ route('dosen.verifikasiIRS') }}">
      <div class="bg-[#9bc0a5] rounded-lg p-6 w-80 text-center shadow-lg">
        <p class="text-xl text-center font-bold">
         Pengesahan IRS
        </p>
       </div>
    </a>
   </div>
  </main>
 </body>
</html>




 


