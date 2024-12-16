@extends('layout')

@section('css')
    <!-- Menambahkan FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
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
                        @foreach ($angkatan as $tahun)
                            <option value="{{ $tahun->angkatan }}">{{ $tahun->angkatan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div id="irs-table" class="mt-8">
                <!-- Tabel data IRS akan muncul di sini -->
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
            url: '/get-irs-by-angkatan', // URL sesuai dengan rute yang Anda tentukan
            type: 'GET',
            data: {
                angkatan: angkatan
            },
            success: function(response) {
                if (response.success) {
                    var irsData = response.data;

                    // Jika ada data IRS
                    if (irsData.length > 0) {
                        var tableHtml =
                            '<table class="min-w-full table-auto border-collapse border border-gray-300">';
                        tableHtml +=
                            '<thead><tr><th class="border border-gray-300 px-4 py-2">NIM</th><th class="border border-gray-300 px-4 py-2">Status</th><th class="border border-gray-300 px-4 py-2">Aksi</th></tr></thead>';
                        tableHtml += '<tbody>';

                        // Loop untuk mengelompokkan data IRS per NIM
                        var groupedData = {};
                        irsData.forEach(function(irs) {
                            if (!groupedData[irs.nim]) {
                                groupedData[irs.nim] = [];
                            }
                            groupedData[irs.nim].push(irs);
                        });

                        for (var nim in groupedData) {
                            var nimData = groupedData[nim];

                            // Tentukan status final: jika ada 'pending', gunakan 'pending'; jika tidak, gunakan 'approved'
                            var finalStatus = nimData.some(irs => irs.status === 'pending') 
                                ? 'pending' 
                                : 'approved';

                            tableHtml += '<tr>';
                            tableHtml += '<td class="border border-gray-300 px-4 py-2">' + nim + '</td>';
                            tableHtml += '<td class="border border-gray-300 px-4 py-2">' + finalStatus + '</td>';

                            // Kolom Aksi
                            tableHtml += '<td class="border border-gray-300 px-4 py-2 text-center">';
                            if (finalStatus === 'pending') {
                                tableHtml +=
                                    '<button class="approve-btn bg-green-500 text-white px-4 py-2 rounded" data-nim="' + 
                                    nim + '">Approve</button>';
                            } else {
                                tableHtml += '<span class="text-gray-500">Approved</span>';
                            }
                            tableHtml += '</td>';

                            tableHtml += '</tr>';
                        }

                        tableHtml += '</tbody></table>';

                        // Masukkan HTML tabel ke dalam #irs-table
                        $('#irs-table').html(tableHtml);

                        // Tambahkan event listener untuk tombol Approve
                        $('.approve-btn').on('click', function() {
                            var nim = $(this).data('nim');
                            approveIrs(nim);
                        });
                    } else {
                        // Jika tidak ada data IRS
                        $('#irs-table').html(
                            '<p class="text-red-500 text-center">Tidak ada data IRS untuk angkatan ini.</p>'
                        );
                    }
                } else {
                    alert('Gagal mengambil data IRS.');
                }
            }
        });
    } else {
        // Jika tidak ada angkatan yang dipilih
        $('#irs-table').html(
            '<p class="text-gray-500 text-center">~ Pilih angkatan dan kelas terlebih dahulu ~</p>'
        );
    }
});

function approveIrs(nim) {
    $.ajax({
        url: '/approve-irs', // URL endpoint untuk mengubah status
        type: 'POST',
        data: {
            nim: nim,
            _token: '{{ csrf_token() }}' // Token CSRF untuk keamanan
        },
        success: function(response) {
            if (response.success) {
                alert('IRS mahasiswa berhasil disetujui.');
                $('#angkatan').trigger('change'); // Refresh data tabel
            } else {
                alert('Gagal menyetujui IRS mahasiswa.');
            }
        },
        error: function() {
            alert('Terjadi kesalahan. Silakan coba lagi.');
        }
    });
}

    </script>
@endsection
