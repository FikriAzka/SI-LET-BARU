<html>
 <head>
  <title>
   Perubahan Nilai
  </title>
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
                <a href="/dashboard-akademik" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
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
  <div class="container mx-auto px-4 py-4">
    <a class="text-gray-600 text-sm mb-4 inline-block" href="/dashboard-akademik">
        ← Back
    </a>
   <div class="bg-[C0BA9B] p-5 rounded-lg w-3/4 mx-auto">
    <h2 class="text-center text-xl font-bold mb-6">
     Perubahan Jadwal Kuliah Mahasiswa
    </h2>
    <div class="space-y-4">
     <div class="bg-gray-100 p-4 rounded-lg flex items-center justify-between">
      <div class="flex items-center">
       <i class="fas fa-user-circle text-2xl mr-4">
       </i>
       <div>
        <p class="font-semibold">
         Kim Gimyung
        </p>
        <p class="text-sm">
         241617221271
        </p>
       </div>
      </div>
      <div class="flex items-center space-x-4">
       <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
        Struktur Data (A)
       </div>
       <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
        Senin
       </div>
       <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
        07.00 - 10.20 WIB
       </div>
       <i class="fas fa-check text-2xl text-gray-600">
       </i>
      </div>
     </div>
     <div class="bg-gray-100 p-4 rounded-lg flex items-center justify-between">
      <div class="flex items-center">
       <i class="fas fa-user-circle text-2xl mr-4">
       </i>
       <div>
        <p class="font-semibold">
         Richard John Grayson
        </p>
        <p class="text-sm">
         241617221351
        </p>
       </div>
      </div>
      <div class="flex items-center space-x-4">
       <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
        Struktur Data (C)
       </div>
       <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
        Senin
       </div>
       <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
        13.00 - 16.20 WIB
       </div>
       <i class="fas fa-check text-2xl text-gray-600">
       </i>
      </div>
     </div>
     <div class="bg-gray-100 p-4 rounded-lg flex items-center justify-between">
      <div class="flex items-center">
       <i class="fas fa-user-circle text-2xl mr-4">
       </i>
       <div>
        <p class="font-semibold">
         Kuroda Ryuhei
        </p>
        <p class="text-sm">
         241617221371
        </p>
       </div>
      </div>
      <div class="flex items-center space-x-4">
       <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
        Struktur Data (D)
       </div>
       <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
        Kamis
       </div>
       <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
        13.00 - 16.20 WIB
       </div>
       <i class="fas fa-check text-2xl text-gray-600">
       </i>
      </div>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
