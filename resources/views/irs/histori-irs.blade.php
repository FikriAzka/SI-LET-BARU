@extends('layout')

@section('konten')
    <div class="p-3">
        <a class="text-gray-600 mb-4 -mt-1 inline-block" href="/perkembanganmahasiswa-dosen2">← Back</a>
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

                            <span class="transform transition-transform duration-200" id="icon-wrapper-{{ $i }}">
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
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function toggleSemester(semester) {
            const content = document.getElementById(`semester-${semester}`);
            const iconWrapper = document.getElementById(`icon-wrapper-${semester}`);
            const icon = document.getElementById(`icon-${semester}`);

            if (content && icon) {
                content.classList.toggle('hidden');
                if (content.classList.contains('hidden')) {
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                    iconWrapper.classList.remove('rotate-45');
                } else {
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                    iconWrapper.classList.add('rotate-45');
                }
            }
        }
    </script>
@endsection
