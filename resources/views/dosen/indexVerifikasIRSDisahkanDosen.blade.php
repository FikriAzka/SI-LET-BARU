
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI-LET</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100">
    <header class="bg-[#9BC0C0] p-0.5 flex justify-between items-center">
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
    </header>
   <div class="p-4">
        <a class="text-sm text-gray-600 mb-4 inline-block" href="/dashboard-dosen">← Back</a>
        <div class="grid grid-cols-3 gap-4 shadow-lg">
          <a href="/verifikasiIRSpermintaan-dosen">
            <div class="bg-yellow-200 p-4 rounded-lg shadow-md">
             <h2 class="text-center text-lg font-bold">
              Permintaan
             </h2>
             <div class="bg-white p-4 mt-2 rounded-lg text-center text-2xl font-bold">
              2
             </div>
            </div>
          </a>
            <div class="bg-green-200 p-4 rounded-lg shadow-md">
             <h2 class="text-center text-lg font-bold">
              Disahkan
             </h2>
             <div class="bg-white p-4 mt-2 rounded-lg text-center text-2xl font-bold">
              1
             </div>
            </div>
            <a href="/verifikasiIRSditolak-dosen">
            <div class="bg-red-200 p-4 rounded-lg shadow-md">
             <h2 class="text-center text-lg font-bold">
              Ditolak
             </h2>
             <div class="bg-white p-4 mt-2 rounded-lg text-center text-2xl font-bold">
              0
             </div>
            </div>
          </a>
           </div>
        <!-- Request Table -->
        <h3 class="text-lg font-bold mb-2 mt-5">Daftar IRS yang sudah di-Sahkan :</h3>
        <table class="min-w-full bg-white border border-gray-500 shadow-sm">
            <thead>
                <tr class="bg-[#9BC0C0]">
                    <th class="border border-gray-300 px-4 py-2">No</th>
                    <th class="border border-gray-300 px-4 py-2">Nama</th>
                    <th class="border border-gray-300 px-4 py-2">NIM</th>
                    <th class="border border-gray-300 px-4 py-2">Jurusan</th>
                    <th class="border border-gray-300 px-4 py-2">Semester</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">1</td>
                    <td class="border border-gray-300 px-4 py-2">Budi Hartanto</td>
                    <td class="border border-gray-300 px-4 py-2">24060123456789</td>
                    <td class="border border-gray-300 px-4 py-2">S1 Informatika</td>
                    <td class="border border-gray-300 px-4 py-2">1 - 2024/2025</td>
                
                </tr>
            </tbody>
        </table>
        
    </div>
</body>
</html>
