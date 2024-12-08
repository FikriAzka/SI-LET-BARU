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
                                    '<thead><tr><th class="border border-gray-300 px-4 py-2">NIM</th><th class="border border-gray-300 px-4 py-2">Jadwal ID</th><th class="border border-gray-300 px-4 py-2">Semester</th><th class="border border-gray-300 px-4 py-2">Prioritas</th><th class="border border-gray-300 px-4 py-2">Status</th><th class="border border-gray-300 px-4 py-2">Aksi</th></tr></thead>';
                                tableHtml += '<tbody>';

                                // Loop untuk mengisi data IRS
                                irsData.forEach(function(irs) {
                                    tableHtml += '<tr>';
                                    tableHtml +=
                                        '<td class="border border-gray-300 px-4 py-2">' + irs
                                        .nim + '</td>';
                                    tableHtml +=
                                        '<td class="border border-gray-300 px-4 py-2">' + irs
                                        .jadwal_id + '</td>';
                                    tableHtml +=
                                        '<td class="border border-gray-300 px-4 py-2">' + irs
                                        .semester + '</td>';
                                    tableHtml +=
                                        '<td class="border border-gray-300 px-4 py-2">' + irs
                                        .prioritas + '</td>';
                                    tableHtml +=
                                        '<td class="border border-gray-300 px-4 py-2">' + irs
                                        .status + '</td>';

                                    // Kolom Aksi dengan ikon check
                                    tableHtml +=
                                        '<td class="border border-gray-300 px-4 py-2 text-center">';
                                    if (irs.status === 'pending') {
                                        tableHtml +=
                                            '<button class="approve-btn text-green-500" data-id="' +
                                            irs.id +
                                            '"><i class="fas fa-check"></i> Disetujui</button>';
                                    }
                                    tableHtml += '</td>';
                                    tableHtml += '</tr>';
                                });

                                tableHtml += '</tbody></table>';

                                // Masukkan HTML tabel ke dalam #irs-table
                                $('#irs-table').html(tableHtml);
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
                    '<p class="text-gray-500 text-center">~ Pilih angkatan dan kelas terlebih dahulu ~</p>');
            }
        });

        // Menambahkan event listener pada tombol approve
        $(document).on('click', '.approve-btn', function() {
            var irsId = $(this).data('id'); // Mengambil ID IRS dari data-id

            // Kirim request untuk mengubah status IRS menjadi 'Disetujui'
            $.ajax({
                url: '/update-status-irs/' + irsId, // Ganti dengan URL yang sesuai
                type: 'PUT', // Pastikan menggunakan metode yang benar
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // Ambil token dari meta tag
                },
                success: function(response) {
                    alert('IRS disetujui!');
                    location.reload(); // Reload untuk memperbarui status di halaman
                },
                error: function(xhr, status, error) {
                    console.error("Error Status: ", status);
                    console.error("Error Message: ", error);
                    console.error("Response: ", xhr.responseText);
                    alert('Terjadi kesalahan saat mengubah status.');
                }
            });
        });
    </script>
@endsection
