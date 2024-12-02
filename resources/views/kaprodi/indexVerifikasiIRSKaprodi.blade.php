@extends('layout')
@section('konten')
<div class="p-4">
  <a class="text-gray-600 text-sm" href="/dashboard-kaprodi">
   ← Back
  </a>
  <h2 class="text-2xl font-semibold mt-4">
   Verifikasi IRS
  </h2>
  <div class="border-t mt-2 pt-4">
   <div class="flex space-x-4">
    <div>
     <label class="block text-gray-700" for="angkatan">
      Angkatan
     </label>
     <select class="border border-gray-300 rounded p-2" id="angkatan">
      <option>
       -Pilih Angkatan-
      </option>
      <option>
       2024
      </option>
     </select>
    </div>
    <div>
     <label class="block text-gray-700" for="kelas">
      Kelas
     </label>
     <select class="border border-gray-300 rounded p-2" id="kelas">
      <option>
       -Pilih Kelas-
      </option>
      <option>
       A
      </option>
     </select>
     <a href="verifikasiIRS-kaprodi2">
       <button class="fas fa-search ml-5">
       </button>
     </a>
    </div>
   </div>
   <p class="text-gray-500 text-center mt-8">
    ~ Pilih angkatan dan kelas terlebih dahulu ~
   </p>
  </div>
 </div>
@endsection

  
