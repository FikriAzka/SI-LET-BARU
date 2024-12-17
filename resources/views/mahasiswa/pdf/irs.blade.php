<!DOCTYPE html>
<html>

<head>
    <title>IRS {{ $mahasiswa->nama }} - Semester {{ $semester }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .student-info {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .semester-header {
            background-color: #e9ecef;
            padding: 10px;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .total-sks {
            text-align: right;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>ISIAN RENCANA STUDI (IRS)</h2>
        <h3>Semester {{ $semester }} | Tahun Akademik 2024/2025</h3>
    </div>
    <div class="student-info">
        <p><strong>Nama:</strong> {{ $mahasiswa->nama_lengkap }}</p>
        <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
        <p><strong>Program Studi:</strong> {{ $mahasiswa->programStudi->nama_program_studi }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Dosen</th>
                <th>Status</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($irsList[$semester] as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->jadwal->mataKuliah->kode_mk ?? '-' }}</td>
                    <td>{{ $item->jadwal->mataKuliah->nama_mk ?? 'Data tidak tersedia' }}</td>
                    <td>{{ $item->jadwal->sks ?? '-' }}</td>
                    <td>{{ $item->jadwal->dosen->nama ?? 'Data tidak tersedia' }}</td>
                    <td>{{ $item->status_lulus ?? '-' }}</td>
                    <td>{{ $item->nilai ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="total-sks">
        <strong>Total SKS:
            {{ $irsList[$semester]->sum(function ($item) {
                return $item->jadwal->sks ?? 0;
            }) }}</strong>
    </div>
</body>

</html>
