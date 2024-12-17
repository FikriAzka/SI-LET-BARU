<!DOCTYPE html>
<html>

<head>
    <title>SI-LET</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-[#9BC0C0] p-0.5 flex justify-between items-center">
        <div class="flex items-center">
            <img alt="SI-LET Logo" class="h-24 w-24 mr-2" src="{{ asset('assets/silet_logo.png') }}" />
            <div>
                <h1 class="text-xl font-bold">SI-LET</h1>
                <p class="text-sm">Sistem Informasi & Laporan Edukasi Terintegrasi</p>
            </div>
        </div>
        <div class="flex items-center space-x-4 mr-7">
            <img class="w-12 h-12" src="{{ asset('assets/user.png') }}" alt="userlogo">
            <div class="relative">
                <img class="w-14 h-14 cursor-pointer" src="{{ asset('assets/menu-bar.png') }}" alt="menubar"
                    onclick="toggleMenu()">
                <div id="menu-dropdown"
                    class="hidden absolute right-0 mt-2 w-32 bg-white border border-gray-200 rounded-md shadow-lg">
                    <a href="{{ route('mahasiswa.dashboard') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                    <a href="{{ route('mahasiswa.akademik') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Akademik</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="p-3">
        <a class="text-gray-600 mb-4 -mt-1 inline-block" href="{{ route('mahasiswa.akademik') }}">← Back</a>
        <h2 class="text-center text-2xl font-bold mb-4">IRS</h2>

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="border-2 p-4 rounded-md">
            <h3 class="text-xl font-bold mb-4">Isian Rencana Semester (IRS)</h3>

            @for ($i = 1; $i <= 8; $i++)
                <div class="bg-[#DCEFEF] p-4 rounded mb-2 hover:bg-[#cbe4e4] transition-colors">
                    <div class="flex justify-between items-center cursor-pointer"
                        onclick="toggleSemester({{ $i }})">
                        <span class="font-medium">
                            Semester - {{ $i }} | Tahun ajaran 2024/2025
                            {{ $i % 2 == 1 ? 'Ganjil' : 'Genap' }}
                        </span>
                        <div class="flex items-center space-x-2">

                            <span class="transform transition-transform duration-200"
                                id="icon-wrapper-{{ $i }}">
                                <i class="fas fa-plus text-gray-600" id="icon-{{ $i }}"></i>
                            </span>
                        </div>
                    </div>


                    <div id="semester-{{ $i }}" class="hidden mt-4">
                        @if (isset($irsList[$i]) && $irsList[$i]->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="w-full border-collapse bg-white">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th class="border px-4 py-2 text-left">Mata Kuliah</th>
                                            <th class="border px-4 py-2 text-center w-24">Kode MK</th>
                                            <th class="border px-4 py-2 text-center w-20">SKS</th>
                                            <th class="border px-4 py-2 text-center w-32">Status</th>
                                            <th class="border px-4 py-2 text-center w-24">Nilai</th>
                                            <th class="border px-4 py-2 text-center w-32">Dosen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($irsList[$i] as $item)
                                            <tr class="hover:bg-gray-50">
                                                <td class="border px-4 py-2">
                                                    {{ $item->jadwal->mataKuliah->nama_mk ?? 'Data tidak tersedia' }}
                                                </td>
                                                <td class="border px-4 py-2 text-center">
                                                    {{ $item->jadwal->mataKuliah->kode_mk ?? '-' }}
                                                </td>
                                                <td class="border px-4 py-2 text-center">
                                                    {{ $item->jadwal->sks ?? '-' }}
                                                </td>
                                                <td class="border px-4 py-2 text-center">
                                                    <span
                                                        class="px-2 py-1 rounded-full text-sm {{ $item->status_lulus == 'lulus' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                        {{ $item->status_lulus ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="border px-4 py-2 text-center">
                                                    {{ $item->nilai ?? '-' }}
                                                </td>
                                                <td class="border px-4 py-2 text-center">
                                                    {{ $item->jadwal->dosen->nama ?? 'Data tidak tersedia' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr class="bg-gray-50 font-medium">
                                            <td colspan="2" class="border px-4 py-2 text-right">Total SKS:</td>
                                            <td colspan="4" class="border px-4 py-2 text-center">
                                                {{ $irsList[$i]->sum(function ($item) {
                                                    return $item->jadwal->sks ?? 0;
                                                }) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="text-center py-3">
                                                <button onclick="printPDF({{ $i }});"
                                                    class="bg-[#9BC0C0] hover:bg-[#87a3a3] text-white font-bold py-2 px-4 rounded">
                                                    Print PDF Semester {{ $i }}
                                                </button>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-center text-gray-500 py-2">Belum ada mata kuliah yang diambil pada semester
                                ini</p>
                        @endif
                    </div>
                </div>
            @endfor
        </div>




    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
        function printPDF(semester) {
            // Dynamically generate PDF using server-side data
            window.location.href = `/mahasiswa/irs/${semester}/download`;
        }

        function toggleMenu() {
            const dropdown = document.getElementById("menu-dropdown");
            dropdown.classList.toggle("hidden");
        }

        // Menutup menu jika mengklik di luar
        window.onclick = function(event) {
            const dropdown = document.getElementById("menu-dropdown");
            if (!event.target.closest('.relative')) {
                dropdown.classList.add('hidden');
            }
        }

        function toggleSemester(semester) {
            const content = document.getElementById(`semester-${semester}`);
            const iconWrapper = document.getElementById(`icon-wrapper-${semester}`);
            const icon = document.getElementById(`icon-${semester}`);

            if (content && icon) {
                content.classList.toggle('hidden');

                if (content.classList.contains('hidden')) {
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                    iconWrapper.classList.remove('rotate-180');
                } else {
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                    iconWrapper.classList.add('rotate-180');
                }
            }
        }
    </script>


</body>

</html>
