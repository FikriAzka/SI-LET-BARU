<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
</head>
<body class="font-roboto bg-gray-100">
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
    <div class="p-4">
        <a class="text-gray-600 text-sm mb-4 inline-block" href="/dashboard-mahasiswa"><i class="fas fa-arrow-left"></i> Back</a>
        <h2 class="text-center text-2xl font-bold mb-4">TRANSKRIP AKADEMIK</h2>
        <div class="border p-4 mb-4">
            <div class="flex justify-between">
                <div>
                    <p>Nama : Surya Fajar</p>
                    <p>NIM : 24056025345431</p>
                </div>
                <div>
                    <p>Informatika</p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <table class="w-full border-collapse border">
                <thead>
                    <tr>
                        <th class="border p-2">No.</th>
                        <th class="border p-2">Kode</th>
                        <th class="border p-2">Mata Kuliah</th>
                        <th class="border p-2">SKS</th>
                        <th class="border p-2">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border p-2">1</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                    </tr>
                    <tr>
                        <td class="border p-2">2</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                    </tr>
                    <tr>
                        <td class="border p-2">3</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                    </tr>
                    <tr>
                        <td class="border p-2">4</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                    </tr>
                    <tr>
                        <td class="border p-2">5</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                    </tr>
                    <tr>
                        <td class="border p-2">6</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                    </tr>
                    <tr>
                        <td class="border p-2">7</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                    </tr>
                    <tr>
                        <td class="border p-2">8</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                    </tr>
                </tbody>
            </table>
            <table class="w-full border-collapse border">
                <thead>
                    <tr>
                        <th class="border p-2">No.</th>
                        <th class="border p-2">Kode</th>
                        <th class="border p-2">Mata Kuliah</th>
                        <th class="border p-2">SKS</th>
                        <th class="border p-2">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border p-2">1</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                    </tr>
                    <tr>
                        <td class="border p-2">2</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                    </tr>
                    <tr>
                        <td class="border p-2">3</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                    </tr>
                    <tr>
                        <td class="border p-2">4</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                    </tr>
                    <tr>
                        <td class="border p-2">5</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                    </tr>
                    <tr>
                        <td class="border p-2">6</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                    </tr>
                    <tr>
                        <td class="border p-2">7</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                    </tr>
                    <tr>
                        <td class="border p-2">8</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                        <td class="border p-2">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="border p-4 mb-4">
            <p>SKS Kumulatif : 78</p>
            <p>IPK Kumulatif : 3.12</p>
        </div>
        <button class="bg-blue-500 text-white px-4 py-2 rounded">PRINT</button>
    </div>
</body>
</html>