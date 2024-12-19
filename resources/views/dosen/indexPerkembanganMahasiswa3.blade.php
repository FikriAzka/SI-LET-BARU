@extends('layout')

@section('konten')
    <div class="p-4">
        <a class="text-gray-600 text-sm" href="/dashboard-dosen">
            ← Back
        </a>
        <h2 class="text-2xl font-semibold mt-4">
            Monitoring IRS Mahasiswa Perwalian
        </h2>
        <div class="border-t mt-2 pt-4">
            <div class="flex space-x-4">
                <div>
                    <label class="block text-gray-700" for="angkatan">
                        Angkatan
                    </label>
                    <select class="border border-gray-300 rounded p-2" id="angkatan">
                        <option value="">-Pilih Angkatan-</option>
                        @foreach ($angkatan as $tahun)
                            <option value="{{ $tahun->angkatan }}">{{ $tahun->angkatan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-8">
                <div id="irs-table" class="mb-8">
                    <!-- Tabel mahasiswa yang sudah mengisi IRS -->
                </div>

                <div id="no-irs-table" class="mt-4">
                    <!-- Tabel mahasiswa yang belum mengisi IRS -->
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $('#angkatan').on('change', function() {
            var angkatan = $(this).val();
            if (angkatan) {
                $.ajax({
                    url: '/get-mahasiswa-irs-status',
                    type: 'GET',
                    data: {
                        angkatan: angkatan
                    },
                    success: function(response) {
                        if (response.success) {
                            // Render tabel untuk mahasiswa yang sudah mengisi IRS
                            if (response.hasIrs.length > 0) {
                                var hasIrsTable =
                                    '<h3 class="text-lg font-semibold mb-4">Mahasiswa Yang Sudah Mengisi IRS</h3>';
                                hasIrsTable +=
                                    '<div class="overflow-x-auto">' +
                                    '<table class="w-full border-collapse border border-gray-300 mt-8">' +
                                    '<thead class="bg-[#9BC0C0]">' +
                                    '<tr>' +
                                    '<th class="border border-gray-300 p-3 text-left">No</th>' +
                                    '<th class="border border-gray-300 p-3 text-left">Nama</th>' +
                                    '<th class="border border-gray-300 p-3 text-left">Jumlah IRS</th>' +
                                    '<th class="border border-gray-300 p-3 text-left">Status</th>' +
                                    '<th class="border border-gray-300 p-3 text-left">Aksi</th>' +
                                    '</tr>' +
                                    '</thead>' +
                                    '<tbody>';

                                response.hasIrs.forEach(function(student, index) {
                                    hasIrsTable += '<tr class="hover:bg-gray-100">';
                                    hasIrsTable +=
                                        '<td class="border border-gray-300 p-3 text-center">' +
                                        (index + 1) + '</td>';
                                    hasIrsTable +=
                                        '<td class="border border-gray-300 p-3">' + student
                                        .nama + '</td>';
                                    hasIrsTable +=
                                        '<td class="border border-gray-300 p-3 text-center">' +
                                        student.irs_count + '</td>';
                                    hasIrsTable +=
                                        '<td class="border border-gray-300 p-3">' +
                                        (student.pending_irs > 0 ?
                                            '<span class="text-yellow-600">Pending</span>' :
                                            '<span class="text-green-600">Approved</span>') +
                                        '</td>';
                                    hasIrsTable +=
                                        '<td class="border border-gray-300 p-3 text-center">' +
                                        '<a href="/irs-detail/' + student.nim +
                                        '" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Lihat Detail</a>' +
                                        '</td>';
                                    hasIrsTable += '</tr>';
                                });

                                hasIrsTable += '</tbody></table></div>';
                                $('#irs-table').html(hasIrsTable);
                            } else {
                                $('#irs-table').html(
                                    '<p class="text-gray-500 text-center">Tidak ada mahasiswa yang sudah mengisi IRS</p>'
                                );
                            }

                            // Render tabel untuk mahasiswa yang belum mengisi IRS
                            if (response.noIrs.length > 0) {
                                var noIrsTable =
                                    '<h3 class="text-lg font-semibold mb-4">Mahasiswa Yang Belum Mengisi IRS</h3>';
                                noIrsTable +=
                                    '<div class="overflow-x-auto">' +
                                    '<table class="w-full border-collapse border border-gray-300 mt-8">' +
                                    '<thead class="bg-[#9BC0C0]">' +
                                    '<tr>' +
                                    '<th class="border border-gray-300 p-3 text-left">No</th>' +
                                    '<th class="border border-gray-300 p-3 text-left">Nama</th>' +
                                    '<th class="border border-gray-300 p-3 text-left">Status</th>' +
                                    '</tr>' +
                                    '</thead>' +
                                    '<tbody>';

                                response.noIrs.forEach(function(student, index) {
                                    noIrsTable += '<tr class="hover:bg-gray-100">';
                                    noIrsTable +=
                                        '<td class="border border-gray-300 p-3 text-center">' +
                                        (index + 1) + '</td>';
                                    noIrsTable +=
                                        '<td class="border border-gray-300 p-3">' + student
                                        .nama + '</td>';
                                    noIrsTable +=
                                        '<td class="border border-gray-300 p-3 text-red-600">Belum Mengisi</td>';
                                    noIrsTable += '</tr>';
                                });

                                noIrsTable += '</tbody></table></div>';
                                $('#no-irs-table').html(noIrsTable);
                            } else {
                                $('#no-irs-table').html(
                                    '<p class="text-gray-500 text-center">Semua mahasiswa sudah mengisi IRS</p>'
                                );
                            }
                        } else {
                            alert('Gagal mengambil data mahasiswa.');
                        }
                    }
                });
            } else {
                $('#irs-table, #no-irs-table').html(
                    '<p class="text-gray-500 text-center">Pilih angkatan terlebih dahulu</p>');
            }
        });
    </script>
@endsection
