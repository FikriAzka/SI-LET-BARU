@extends('layout')
@section('konten')
<div class="p-4">
  <a class="text-gray-600 text-sm mb-4 inline-block" href="#">
   ← Back
  </a>
  <h2 class="text-xl font-bold mb-4">
   STATUS PERKEMBANGAN MAHASISWA
  </h2>
  <div class="mb-4">
   <label class="block text-gray-700 mb-2" for="angkatan">
    Angkatan
   </label>
   <select class="border border-gray-300 p-2 rounded" id="angkatan">
    <option>
       Pilih angkatan
    </option>
    <option>
       2019
    </option>
    <option>
       2020
    </option>
    <option>
       2021
    </option>
    <option>
       2022
    </option>
   </select>
  </div>
  <table class="min-w-full bg-white border border-gray-300">
   <thead>
    <tr class="bg-[9BC0C0]">
     <th class="border border-gray-300 px-4 py-2">
      No
     </th>
     <th class="border border-gray-300 px-4 py-2">
      Fakultas
     </th>
     <th class="border border-gray-300 px-4 py-2">
      Jurusan
     </th>
     <th class="border border-gray-300 px-4 py-2">
      Kelas
     </th>
    </tr>
   </thead>
   <tbody>
    <tr>
     <td class="border border-gray-300 px-4 py-2">
      1
     </td>
     <td class="border border-gray-300 px-4 py-2">
      Sains dan Matematika
     </td>
     <td class="border border-gray-300 px-4 py-2">
      S1 Informatika
     </td>
     <td class="border border-gray-300 px-4 py-2">
      A
     </td>
    </tr>
    <tr>
     <td class="border border-gray-300 px-4 py-2">
      2
     </td>
     <td class="border border-gray-300 px-4 py-2">
      Teknik
     </td>
     <td class="border border-gray-300 px-4 py-2">
      S1 Teknik Kimia
     </td>
     <td class="border border-gray-300 px-4 py-2">
      B
     </td>
    </tr>
   </tbody>
  </table>
 </div>
@endsection

  