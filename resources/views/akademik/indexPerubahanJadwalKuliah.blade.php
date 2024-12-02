@extends('layout')

@section('konten')
<div class="container mx-auto px-4 py-4">
  <a class="text-gray-600 text-sm mb-4 inline-block" href="/dashboard-akademik">
      ← Back
  </a>
 <div class="bg-[C0BA9B] p-5 rounded-lg w-3/4 mx-auto">
  <h2 class="text-center text-xl font-bold mb-6">
   Perubahan Jadwal Kuliah Mahasiswa
  </h2>
  <div class="space-y-4">
   <div class="bg-gray-100 p-4 rounded-lg flex items-center justify-between">
    <div class="flex items-center">
     <i class="fas fa-user-circle text-2xl mr-4">
     </i>
     <div>
      <p class="font-semibold">
       Kim Gimyung
      </p>
      <p class="text-sm">
       241617221271
      </p>
     </div>
    </div>
    <div class="flex items-center space-x-4">
     <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
      Struktur Data (A)
     </div>
     <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
      Senin
     </div>
     <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
      07.00 - 10.20 WIB
     </div>
     <i class="fas fa-check text-2xl text-gray-600">
     </i>
    </div>
   </div>
   <div class="bg-gray-100 p-4 rounded-lg flex items-center justify-between">
    <div class="flex items-center">
     <i class="fas fa-user-circle text-2xl mr-4">
     </i>
     <div>
      <p class="font-semibold">
       Richard John Grayson
      </p>
      <p class="text-sm">
       241617221351
      </p>
     </div>
    </div>
    <div class="flex items-center space-x-4">
     <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
      Struktur Data (C)
     </div>
     <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
      Senin
     </div>
     <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
      13.00 - 16.20 WIB
     </div>
     <i class="fas fa-check text-2xl text-gray-600">
     </i>
    </div>
   </div>
   <div class="bg-gray-100 p-4 rounded-lg flex items-center justify-between">
    <div class="flex items-center">
     <i class="fas fa-user-circle text-2xl mr-4">
     </i>
     <div>
      <p class="font-semibold">
       Kuroda Ryuhei
      </p>
      <p class="text-sm">
       241617221371
      </p>
     </div>
    </div>
    <div class="flex items-center space-x-4">
     <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
      Struktur Data (D)
     </div>
     <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
      Kamis
     </div>
     <div class="bg-gray-300 px-4 py-2 rounded-lg text-sm">
      13.00 - 16.20 WIB
     </div>
     <i class="fas fa-check text-2xl text-gray-600">
     </i>
    </div>
   </div>
  </div>
 </div>
</div>
@endsection

