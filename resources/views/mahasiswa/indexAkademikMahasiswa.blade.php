@extends('layout')
@section('konten')
<div class="p-4">
  <a class="text-sm" href="/dashboard-mahasiswa">
   ← Back
  </a>
  <h2 class="text-center text-2xl font-bold mt-4">
   AKADEMIK
  </h2>
  <div class="mt-8">
   <div class="bg-[9BC0C0] p-4 rounded-md">
    <h3 class="text-lg font-bold">
     PERKULIAHAN
    </h3>
   </div>
   <div class="grid grid-cols-4 gap-4 mt-4">
   
       <a class="bg-gray-200 p-4 border rounded-md flex items-center justify-center" href="{{ route('mahasiswa.lihatIRS') }}">
           IRS
       </a>
       <a class="bg-gray-200 p-4 border rounded-md flex items-center justify-center" href="{{ route('mahasiswa.buatIRS') }}">
           Buat IRS
       </a>
       <a class="bg-gray-200 p-4 border rounded-md flex items-center justify-center" href="{{ route('mahasiswa.lihatKHS') }}">
           KHS
       </a>
       <a class="bg-gray-200 p-4 border rounded-md flex items-center justify-center " href="/transkrip-mahasiswa">
           Transkrip
       </a>
   
   </div>
   
  </div>
 </div>
@endsection

 

