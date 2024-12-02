@extends('layout')

@section('konten')
    <div class="p-4">
        <a class="text-gray-600 hover:text-gray-800 transition-colors" href="/dashboard-dekan">
            ← Back
        </a>
    </div>
    <div class="flex justify-center">
        <div class="bg-[#8281C5] p-8 rounded-lg w-3/4">
            <h2 class="text-center text-xl font-bold mb-6 text-white">
                Penyetujuan Ruangan Perkuliahan
            </h2>

            {{-- Dropdown Filter Jurusan --}}
            <div class="mb-4">
                <form action="{{ route('dekan.penyetujuanruangkuliah') }}" method="GET" id="filterForm"
                    class="flex justify-center">
                    <select name="program_studi" id="program_studi"
                        class="form-select w-1/2 rounded-lg px-3 py-2 text-gray-700">
                        <option value="" disabled selected>Pilih Program Studi</option>
                        <option value="">Semua Program Studi</option>
                        @foreach ($programStudis as $prodi)
                            <option value="{{ $prodi->id }}"
                                {{ request('program_studi') == $prodi->id ? 'selected' : '' }}>
                                {{ $prodi->nama_program_studi }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>

            {{-- Pesan jika tidak ada program studi yang dipilih --}}
            @if ($programStudis->isEmpty())
                <div class="text-center text-white mt-4">
                    Tidak ada program studi yang tersedia.
                </div>
            @endif

            {{-- Menampilkan daftar ruangan --}}
            <div class="space-y-4">
                @forelse($ruangans as $ruangan)
                    <div class="bg-gray-200 p-4 rounded-lg flex justify-between items-center">
                        <div>
                            <p class="font-semibold">
                                {{ $ruangan->noruang }} |
                                {{ $ruangan->fungsi }}
                            </p>
                            <p class="text-sm">
                                {{ $ruangan->kapasitas }} Kapasitas |
                                {{ $ruangan->programStudi->nama_program_studi }}
                            </p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <form action="{{ route('ruangan.approve', $ruangan->id) }}" method="POST" >
                                @csrf
                                <button type="submit" class="fas fa-check text-3xl text-gray-600 hover:text-green-500 transition-colors">
                                </button>
                            </form>
                            <form action="{{ route('ruangan.reject', $ruangan->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="fas fa-times text-3xl text-gray-600 hover:text-red-500 transition-colors">
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-white">
                        Tidak ada ruangan untuk disetujui.
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-4 flex justify-center">
                {{ $ruangans->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

    @section('js')
        <script>
            // Auto submit form when selecting program studi
            document.getElementById('program_studi').addEventListener('change', function() {
                document.getElementById('filterForm').submit();
            });
        </script>
    @endsection
@endsection