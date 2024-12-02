@extends('layout')

@section('konten')
    <!-- Rest of the content remains the same -->
    <main class="p-8">
        <h2 class="text-3xl font-bold text-center mb-8">
            Dashboard
        </h2>
        <div class="bg-white p-4 rounded-lg shadow-lg flex justify-between items-center mb-8">
            <div class="flex items-center space-x-4">
                <div class="h-16 w-16 rounded-full border-2 border-gray-300 flex items-center justify-center  mr-5 ml-16">
                    <i class="fas fa-user text-4xl text-gray-500">
                    </i>
                </div>
                <div class="ml-10">
                    <h3 class="text-xl font-bold">
                        Wally West
                    </h3>
                    <p>
                        2406021442432
                    </p>
                    <p>
                        S1 Sastra Inggris
                    </p>
                    <p>
                        kachaawww@gmail.com
                    </p>
                </div>
            </div>
            <div class="flex space-x-4 mr-9">
                <div class="bg-gray-200 p-4 rounded-lg text-center">
                    <h4 class="text-lg font-bold">
                        Aktif
                    </h4>
                    <p>
                        Status Mahasiswa
                    </p>
                </div>
                <div class="bg-gray-200 p-4 rounded-lg text-center">
                    <h4 class="text-lg font-bold">
                        3.1
                    </h4>
                    <p>
                        IP Kumulatif
                    </p>
                </div>
                <div class="bg-gray-200 p-4 rounded-lg text-center">
                    <h4 class="text-lg font-bold">
                        14
                    </h4>
                    <p>
                        SKS
                    </p>
                </div>
                <div class="bg-gray-200 p-4 rounded-lg text-center">
                    <h4 class="text-lg font-bold">
                        130
                    </h4>
                    <p>
                        Total SKS
                    </p>
                </div>
                <div class="bg-gray-200 p-4 rounded-lg text-center">
                    <h4 class="text-lg font-bold">
                        5
                    </h4>
                    <p>
                        Semester
                    </p>
                </div>
                <div class="bg-gray-200 p-4 rounded-lg text-center">
                    <h4 class="text-lg font-bold">
                        3.98
                    </h4>
                    <p>
                        IP Semester
                    </p>
                </div>
            </div>
        </div>
        <a href="{{ route('mahasiswa.registrasi') }}">
            <div class="grid grid-cols-3 gap-8">
                <div class="bg-green-200 p-6 rounded-lg text-center shadow-lg">
                    <h3 class="text-xl font-bold">
                        Registrasi
                    </h3>
                </div>
        </a>
        <a href="{{ route('mahasiswa.akademik') }}">
            <div class="bg-[#9bc0a5] p-6 rounded-lg text-center shadow-lg">
                <h3 class="text-xl font-bold">
                    Akademik
                </h3>
            </div>
        </a>
        <a href="{{ route('mahasiswa.jadwalkuliah') }}">
            <div class="bg-yellow-200 p-6 rounded-lg text-center shadow-lg">
                <h3 class="text-xl font-bold">
                    Jadwal Kuliah
                </h3>
            </div>
        </a>
        </div>
    </main>
@endsection
