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
                <div id="perwalian-table" class="text-center text-gray-500">
                    Pilih angkatan untuk menampilkan daftar mahasiswa
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        // Event listener untuk dropdown angkatan
        $('#angkatan').on('change', function() {
            var angkatan = $(this).val();
            $('#perwalian-table').html('<p class="text-gray-500">Memuat data...</p>');

            if (angkatan) {
                $.ajax({
                    url: '/get-perwalian', // Route yang digunakan
                    type: 'GET',
                    data: {
                        angkatan: angkatan
                    },
                    success: function(response) {
                        if (response.length === 0) {
                            $('#perwalian-table').html(
                                '<p class="text-gray-500">Tidak ada data mahasiswa untuk angkatan ini.</p>'
                                );
                            return;
                        }

                        var tableHtml =
                            '<table class="w-full border-collapse border border-gray-300 mt-8">' +
                            '<thead class="bg-[#9BC0C0]">' +
                            '<tr>' +
                            '<th class="border p-3">No</th>' +
                            '<th class="border p-3">Nama</th>' +
                            '<th class="border p-3">NIM</th>' +
                            '<th class="border p-3">Aksi</th>' +
                            '</tr>' +
                            '</thead><tbody>';

                        let index = 1; // Mulai indeks dari 1
                        response.forEach(function(dosen) {
                            dosen.mahasiswa.forEach(function(mhs) {
                                tableHtml += '<tr>';
                                tableHtml += '<td class="border p-3">' + index++ +
                                    '</td>';
                                tableHtml += '<td class="border p-3">' + mhs.nama +
                                    '</td>';
                                tableHtml += '<td class="border p-3">' + mhs.nim +
                                    '</td>';
                                tableHtml += '<td class="border p-3 text-center">' +
                                    '<a href="/histori-irs/' + mhs.nim +
                                    '" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Histori IRS</a>' +
                                    '</td>';
                                tableHtml += '</tr>';
                            });
                        });

                        tableHtml += '</tbody></table>';
                        $('#perwalian-table').html(tableHtml);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#perwalian-table').html(
                            '<p class="text-red-500">Terjadi kesalahan saat memuat data. Silakan coba lagi.</p>'
                            );
                    }
                });
            } else {
                $('#perwalian-table').html(
                    '<p class="text-gray-500">Pilih angkatan untuk menampilkan daftar mahasiswa</p>');
            }
        });
    </script>
@endsection
