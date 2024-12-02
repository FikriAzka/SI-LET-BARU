
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
            <a href="">
            <div class="bg-yellow-200 p-4 rounded-lg shadow-md">
             <h2 class="text-center text-lg font-bold">
              Permintaan
             </h2>
             <div class="bg-white p-4 mt-2 rounded-lg text-center text-2xl font-bold">
              2
             </div>
            </div>
            </a>
            <a href="/verifikasiIRSSah-dosen">
            <div class="bg-green-200 p-4 rounded-lg shadow-md">
                <h2 class="text-center text-lg font-bold">
                     Disahkan
                </h2>
                <div class="bg-white p-4 mt-2 rounded-lg text-center text-2xl font-bold">
                     1
                </div>
            </div>
            </a>
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
        <h3 class="text-lg font-bold mb-2 mt-5">Daftar permintaan :</h3>
        <table class="min-w-full bg-white border border-gray-500 shadow-sm">
            <thead>
                <tr class="bg-[#9BC0C0]">
                    <th class="border border-gray-300 px-4 py-2">No</th>
                    <th class="border border-gray-300 px-4 py-2">Nama</th>
                    <th class="border border-gray-300 px-4 py-2">NIM</th>
                    <th class="border border-gray-300 px-4 py-2">Jurusan</th>
                    <th class="border border-gray-300 px-4 py-2">Semester</th>
                    <th class="border border-gray-300 px-4 py-2">IRS</th>
                    <th class="border border-gray-300 px-4 py-2">TTD</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">1</td>
                    <td class="border border-gray-300 px-4 py-2">Budi Hartanto</td>
                    <td class="border border-gray-300 px-4 py-2">24060123456789</td>
                    <td class="border border-gray-300 px-4 py-2">S1 Informatika</td>
                    <td class="border border-gray-300 px-4 py-2">1 - 2024/2025</td>
                    <td class="border border-gray-300 px-4 py-2 text-center text-teal-500">
                        <a href="#" onclick="showModal()">Cek</a>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center text-teal-500">
                        <a href="#" onclick="showModal2()">TTD</a>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">2</td>
                    <td class="border border-gray-300 px-4 py-2">Seong Yohan</td>
                    <td class="border border-gray-300 px-4 py-2">24060126516789</td>
                    <td class="border border-gray-300 px-4 py-2">S1 Informatika</td>
                    <td class="border border-gray-300 px-4 py-2">3 - 2024/2025</td>
                    <td class="border border-gray-300 px-4 py-2 text-center text-teal-500">
                        <a href="#" onclick="showModal()">Cek</a>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center text-teal-500">
                        <a href="#" onclick="showModal2()">TTD</a>
                    </td>
                </tr>
            </tbody>
        </table>
        
    </div>

    <!-- Modal for Dokumen IRS -->
    <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-52 rounded-lg shadow-lg relative w-1/3">
            <h2 class="text-center text-lg font-bold mb-4">Dokumen IRS</h2>
            <button class="absolute top-2 right-2 text-gray-600 hover:text-black" onclick="closeModal()">X</button>
        </div>
    </div>

    <div id="modal2" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-52 rounded-lg shadow-lg relative w-6/12">
          <div class="flex justify-center mb-4">
            <h2 class="text-lg font-bold">Tanda Tangan</h2>
          </div>
          <button class="absolute top-2 right-2 text-gray-600 hover:text-black" onclick="closeModal2()">X</button>
        </div>
      </div>

    <script>
        function showModal() {
            document.getElementById("modal").classList.remove("hidden");
        }
        function showModal2() {
            document.getElementById("modal2").classList.remove("hidden");
        }

        function closeModal() {
            document.getElementById("modal").classList.add("hidden");
        }

        function closeModal2() {
            document.getElementById("modal2").classList.add("hidden");
        }

        function toggleDropdown() {
            const dropdown = document.getElementById("dropdown");
            dropdown.classList.toggle("hidden");
        }

        window.onclick = function(event) {
            const dropdown = document.getElementById("dropdown");
            if (!event.target.closest('img')) {
                dropdown.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
