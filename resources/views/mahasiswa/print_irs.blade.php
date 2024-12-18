<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print IRS - Semester {{ $semester }}</title>
    <style>
        @page {
            margin: 2.5cm;
        }
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12pt;
            line-height: 1.5;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h2, .header h3 {
            margin: 5px 0;
        }

        .student-info {
            margin-bottom: 30px;
        }

        .info-row {
            margin-bottom: 8px;
        }

        .info-label {
            display: inline-block;
            width: 150px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            page-break-inside: avoid;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        .total-row {
            font-weight: bold;
        }

        .signature-section {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            page-break-inside: avoid;
        }

        .signature-box {
            width: 45%;
            text-align: center;
        }

        .signature-line {
            margin: 70px auto 10px;
            width: 200px;
            border-bottom: 1px solid black;
        }

        @media print {
            body { margin: 0; padding: 20px; }
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</h2>
        <h2>SI - LET</h2>
        <h2>FAKULTAS SAINS DAN MATEMATIKA</h2>
        <h2>DEPARTEMEN INFORMATIKA</h2>
        <hr style="margin: 20px 0; border-style: double;">
        <h2>ISIAN RENCANA STUDI (IRS)</h2>
        <h3>Semester {{ $semesterLabel }} Tahun Akademik {{ $tahunAkademik }}</h3>
    </div>

    <div class="student-info">
        <div class="info-row">
            <span class="info-label">NIM</span>
            <span>: {{ $mahasiswa->nim ?? '-' }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Nama</span>
            <span>: {{ $mahasiswa->nama_lengkap ?? '-' }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Program Studi</span>
            <span>: {{ optional($mahasiswa->programStudi)->nama ?? '-' }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Dosen Wali</span>
            <span>: {{ optional(optional($mahasiswa->doswal)->dosen)->nama_lengkap ?? '-' }}</span>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 12%;">Kode MK</th>
                <th style="width: 30%;">Mata Kuliah</th>
                <th style="width: 8%;">SKS</th>
                <th style="width: 10%;">Kelas</th>
                <th style="width: 25%;">Dosen Pengampu</th>
                <th style="width: 10%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @php $totalSks = 0; @endphp
            @foreach($irsData as $irs)
                <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td>{{ optional($irs->jadwal->mataKuliah)->kode_mk ?? '-' }}</td>
                    <td>{{ optional($irs->jadwal->mataKuliah)->nama_mk ?? '-' }}</td>
                    <td align="center">{{ optional($irs->jadwal)->sks ?? '-' }}</td>
                    <td align="center">{{ optional($irs->jadwal)->kelas ?? '-' }}</td>
                    <td>{{ optional(optional($irs->jadwal)->dosen)->nama_lengkap ?? '-' }}</td>
                    <td align="center">{{ ucfirst($irs->status) }}</td>
                </tr>
                @php $totalSks += optional($irs->jadwal)->sks ?? 0; @endphp
            @endforeach
            <tr class="total-row">
                <td colspan="3" align="right">Total SKS:</td>
                <td align="center">{{ $totalSks }}</td>
                <td colspan="3"></td>
            </tr>
        </tbody>
    </table>

    <div class="signature-section">
        <div class="signature-box">
            <p>Dosen Wali</p>
            <div class="signature-line"></div>
            <p>{{ optional(optional($mahasiswa->doswal)->dosen)->nama_lengkap ?? '-' }}</p>
            <p>NIP. {{ optional(optional($mahasiswa->doswal)->dosen)->nip ?? '-' }}</p>
        </div>
        <div class="signature-box">
            <p>Semarang, {{ Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
            <p>Mahasiswa</p>
            <div class="signature-line"></div>
            <p>{{ $mahasiswa->nama_lengkap ?? '-' }}</p>
            <p>NIM. {{ $mahasiswa->nim ?? '-' }}</p>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>