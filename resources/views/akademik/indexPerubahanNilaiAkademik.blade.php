<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  @vite('resources/css/app.css')

  <title>
   Perubahan Nilai
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-white">
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
       </header>
  <main class="p-8">
    <a class="text-gray-600 -ml-2 mb-2 -mt-5 inline-block" href="/dashboard-akademik">
        ← Back
    </a>
   <div class="bg-[#A9C3C3] p-6 rounded-lg max-w-4xl mx-auto"> <!-- Limits the width of the main container -->
    <h3 class="text-center text-xl font-bold -mt-2 mb-4">
      Daftar Permintaan Perubahan Nilai
    </h3>
    <div class="space-y-4">
      <div class="bg-[#E5E5E5] p-2 rounded-lg flex justify-between items-center  mx-auto"> <!-- Limits the width of each item -->
        <div class="flex items-center space-x-3"> <!-- Reduced space between name and NIM -->
          <i class="fas fa-user-circle text-2xl ml-5"></i>
          <div>
            <p class="font-bold">
              Prof. Ferdy S. Rondonuwu, Ph.D
            </p>
          </div>
        </div>
        <div class="flex items-center space-x-2"> <!-- Reduced space between NIM and checkmark -->
          <div class="bg-[#7D7D7D] text-white p-3 rounded-lg text-center max-w-60 -ml-60 mr-10"> <!-- Reduced width of NIM section -->
            <p>241617261271</p>
            <p>Struktur Data</p>
          </div>
          <i class="fas fa-check text-xl"></i>
        </div>
      </div>
      <div class="bg-[#E5E5E5] p-2 rounded-lg flex justify-between items-center  mx-auto"> <!-- Limits the width of each item -->
        <div class="flex items-center space-x-3"> <!-- Reduced space between name and NIM -->
          <i class="fas fa-user-circle text-2xl ml-5"></i>
          <div>
            <p class="font-bold">
              Prof. Ferdy S. Rondonuwu, Ph.D
            </p>
          </div>
        </div>
        <div class="flex items-center space-x-2"> <!-- Reduced space between NIM and checkmark -->
          <div class="bg-[#7D7D7D] text-white p-3 rounded-lg text-center max-w-60 -ml-60 mr-10"> <!-- Reduced width of NIM section -->
            <p>241617261271</p>
            <p>Struktur Data</p>
          </div>
          <i class="fas fa-check text-xl"></i>
        </div>
      </div>
      <div class="bg-[#E5E5E5] p-2 rounded-lg flex justify-between items-center  mx-auto"> <!-- Limits the width of each item -->
        <div class="flex items-center space-x-3"> <!-- Reduced space between name and NIM -->
          <i class="fas fa-user-circle text-2xl ml-5"></i>
          <div>
            <p class="font-bold">
              Prof. Ferdy S. Rondonuwu, Ph.D
            </p>
          </div>
        </div>
        <div class="flex items-center space-x-2"> <!-- Reduced space between NIM and checkmark -->
          <div class="bg-[#7D7D7D] text-white p-3 rounded-lg text-center max-w-60 -ml-60 mr-10"> <!-- Reduced width of NIM section -->
            <p>241617261271</p>
            <p>Struktur Data</p>
          </div>
          <i class="fas fa-check text-xl"></i>
        </div>
      </div>
      <div class="bg-[#E5E5E5] p-2 rounded-lg flex justify-between items-center  mx-auto"> <!-- Limits the width of each item -->
        <div class="flex items-center space-x-3"> <!-- Reduced space between name and NIM -->
          <i class="fas fa-user-circle text-2xl ml-5"></i>
          <div>
            <p class="font-bold">
              Prof. Ferdy S. Rondonuwu, Ph.D
            </p>
          </div>
        </div>
        <div class="flex items-center space-x-2"> <!-- Reduced space between NIM and checkmark -->
          <div class="bg-[#7D7D7D] text-white p-3 rounded-lg text-center max-w-60 -ml-60 mr-10"> <!-- Reduced width of NIM section -->
            <p>241617261271</p>
            <p>Struktur Data</p>
          </div>
          <i class="fas fa-check text-xl"></i>
        </div>
      </div>
      <!-- Repeat this div for each item -->
    </div>
  </div>
  

  </main>
 </body>
</html>
