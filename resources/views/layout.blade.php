<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <title>@yield('title', 'SI-LET')</title>
    @yield('css')
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
</head>

<body class="font-roboto bg-gray-100">
    <header class="bg-[9BC0C0] p-0.5 flex justify-between items-center">
        <div class="flex items-center">
            <img alt="SI-LET Logo" class="h-24 w-24 mr-2" src="{{ asset('assets/silet_logo.png') }}" />
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
            <img class="w-12 h-12" src="{{ asset('assets/user.png') }}" alt="userlogo">

            <div class="relative">
                <img class="w-14 h-14 cursor-pointer" src="{{ asset('assets/menu-bar.png') }}" alt="menubar"
                    onclick="toggleDropdown()">
                <!-- Dropdown Menu -->
                <div id="dropdown"
                    class="absolute right-0 mt-2 bg-white border border-gray-200 rounded-md shadow-lg hidden">
                    <form action="{{ route('logout') }}" method="POST" class="block m-0">
                        @csrf
                        <button type="submit"
                            class="px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-nowrap">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    @yield('konten')
    @yield('js')
    
</body>

</html>
