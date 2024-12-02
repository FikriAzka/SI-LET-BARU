@extends('layout')

@section('konten')
    <h2 class="text-3xl font-bold text-center mt-4 mb-5">
        Dashboard
    </h2>
    <div class="flex justify-center mt-8">
        <div class="border rounded-lg p-6 w-80 text-center mb-7 shadow-lg">
            <i class="fas fa-user-circle text-6xl mb-4"></i>
            <h3 class="text-xl font-bold">
                Clark Kent
            </h3>
            <p>
                5617212123
            </p>
            <p>
                Fakultas Sains dan Matematika
            </p>
            <p>
                clarkasoy@akademik.com
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
