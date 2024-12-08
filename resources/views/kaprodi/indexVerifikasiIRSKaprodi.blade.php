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
      <option value="">-Pilih Angkatan-</option>
      @foreach($angkatan as $tahun)
         <option value="{{ $tahun->angkatan }}">{{ $tahun->angkatan }}</option>
      @endforeach
     </select>
    </div>
   </div>
   <p class="text-gray-500 text-center mt-8">
    ~ Pilih angkatan dan kelas terlebih dahulu ~
   </p>
  </div>
</div>
@endsection
