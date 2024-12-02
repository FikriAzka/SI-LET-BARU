@extends('layout')
@section('konten')
<div class="p-4">
  <a class="text-gray-600 text-sm mb-4 inline-block" href="/perkembanganmahasiswa-dosen2">
   ← Back
  </a>
  <h2 class="text-xl font-bold mb-4">
   STATUS PERKEMBANGAN MAHASISWA
  </h2>
  <div class="flex justify-between items-center mb-4">
   <div>
    <label class="block text-gray-700" for="angkatan">
     Angkatan
    </label>
    <select class="border border-gray-300 rounded p-2" id="angkatan">
     <option>
      2024
     </option>
    </select>
   </div>
   <div class="flex-grow flex justify-center">
    <div class="text-center">
      <p class="text-gray-700">
       Fakultas Sains dan Matematika
      </p>
      <p class="text-gray-700">
       Jurusan S1 Informatika
      </p>
      <p class="text-gray-700">
       Kelas A
      </p>
    </div>
   </div>
  </div>
  <table class="w-full border-collapse border border-gray-300">
   <thead>
    <tr class="bg-[9BC0C0]">
     <th class="border border-gray-300 p-2">
      No
     </th>
     <th class="border border-gray-300 p-2">
      Nama
     </th>
     <th class="border border-gray-300 p-2">
      NIM
     </th>
     <th class="border border-gray-300 p-2">
      Status
     </th>
    </tr>
   </thead>
   <tbody>
    <tr>
     <td class="border border-gray-300 p-2 text-center">
      1
     </td>
     <td class="border border-gray-300 p-2">
      Budi Hartanto
     </td>
     <td class="border border-gray-300 p-2">
      24060123456789
     </td>
     <td class="border border-gray-300 p-2">
      Aktif
     </td>
    </tr>
    <tr>
     <td class="border border-gray-300 p-2 text-center">
      2
     </td>
     <td class="border border-gray-300 p-2">
      Anto Pujiono
     </td>
     <td class="border border-gray-300 p-2">
      24060123134155
     </td>
     <td class="border border-gray-300 p-2">
      Cuti
     </td>
    </tr>
   </tbody>
  </table>
 </div>
@endsection
       
     
