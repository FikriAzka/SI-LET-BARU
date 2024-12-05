@extends('layout')

@section('konten')
    <h2 class="text-3xl font-bold text-center mt-4 mb-5">
        Dashboard
    </h2>
    <div class="flex justify-center mt-8">
        <div class="border rounded-lg p-6 w-80 text-center mb-7 shadow-lg">
            <i class="fas fa-user-circle text-6xl mb-4">
            </i>
            <h3 class="font-bold text-xl">
                {{ Auth::user()->name }}
            </h3>
            <p>
                {{ Auth::user()->akademik->nip }}
            </p>
            <p>
                {{ Auth::user()->akademik->fakultas->nama_fakultas }} <!--Mau jurusan/fakultas-->
            </p>
            <p>
                {{ Auth::user()->email }}
            </p>
        </div>
    </div>
    <div class="flex justify-center space-x-8">
        <a href="{{ route('akademik.perubahannilai') }}">
            <div class="bg-green-200 p-6 w-80 rounded-lg shadow-lg">
                <h3 class="text-xl text-center font-bold">
                    Perubahan Nilai
                </h3>
            </div>
        </a>
        <a href="{{ route('ruangan.index') }}">
            <div class="bg-[#9bc0a5] p-6 w-80 rounded-lg text-center shadow-lg">
                <h3 class="text-xl text-center font-bold">
                    Ruang Kuliah
                </h3>
            </div>
        </a>
        <a href="{{ route('akademik.perubahanjadwalkuliah') }}">
            <div class="bg-yellow-200 p-6 w-80 rounded-lg text-center shadow-lg">
                <h3 class="text-xl text-center font-bold">
                    Penjadwalan
                </h3>
            </div>
        </a>
    </div>
@endsection
