<?php

use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\DekanController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\RuangController;
use Illuminate\Routing\RouteUrlGenerator;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\IRSController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;

Route::middleware(["guest"])->group(function () {
    Route::get("/", [SesiController::class,"loginpage"]) -> name('loginpage');
    Route::post("/login", [SesiController::class,"login"]) -> name('login');
});

Route::group(['middleware' => 'auth', 'web'], function () {
    Route::post("/select-role", [SesiController::class,"selectRole"]) -> name('select-role');

    //Mahasiswa
    Route::get("/dashboard-mahasiswa", [MahasiswaController::class,"dashboard_mahasiswa"]) -> name('mahasiswa.dashboard');
    Route::get("/registrasi-mahasiswa", [MahasiswaController::class,"registrasi_mahasiswa"]) -> name('mahasiswa.registrasi');
    Route::get('/pembayaranUKT-mahasiswa', [MahasiswaController::class, "Rpembayaran_mahasiswa"]);
    Route::get("/akademik-mahasiswa", [MahasiswaController::class, "akademik_mahasiswa"]) -> name('mahasiswa.akademik');
    Route::get('/lihatIRS-mahasiswa', [MahasiswaController::class, "lihatIRS_mahasiswa"]) -> name('mahasiswa.lihatIRS');
    Route::get('/lihatKHS-mahasiswa', [MahasiswaController::class, "lihatKHS_mahasiswa"]) -> name('mahasiswa.lihatKHS');
    Route::get('/buatIRS-mahasiswa', [MahasiswaController::class, "buatIRS_mahasiswa"]) -> name('mahasiswa.buatIRS');
    Route::get('/irs/create', [IRSController::class, 'create'])->name('irs.create');
    Route::post('/simpan-irs', [IrsController::class, 'simpanIrs'])->name('simpan.irs');
    
    Route::post('/irs', [IRSController::class, 'store'])->name('irs.store');
    Route::get("/jadwalkuliah-mahasiswa", [MahasiswaController::class, "jadwalkuliah_mahasiswa"]) -> name('mahasiswa.jadwalkuliah');
    Route::get('/transkrip-mahasiswa', [MahasiswaController::class, "transkrip_mahasiswa"]);
    
    Route::get("/buatIRS-mahasiswa", [JadwalController::class, "buatIRS_mahasiswa"]) -> name('mahasiswa.buatIRS');
    Route::post('/submit-irs', [IrsController::class, 'submitIRS'])->name('irs.submit');

    
    //Dekan
    Route::get("/dashboard-dekan", [DekanController::class,"dashboard_dekan"]) -> name('dekan.dashboard');
    Route::get("/penyetujuanruangkuliah-dekan", [DekanController::class, "penyetujuanruangkuliah_dekan"]) -> name('dekan.penyetujuanruangkuliahh');
    // Route::get("/penyetujuanjadwalkuliah-dekan", [DekanController::class, "penyetujuanjadwalkuliah_dekan"]) -> name('dekan.penyetujuanjadwalkuliah');
    Route::get('/ruangan-approval', [RuangController::class, 'showRuanganApproval'])->name('dekan.penyetujuanruangkuliah');
    Route::post('/ruangan/{id}/approve', [RuangController::class, 'updateRuanganStatus'])->name('ruangan.approve');
    Route::post('/ruangan/{id}/reject', [RuangController::class, 'updateRuanganStatusReject'])->name('ruangan.reject');
    Route::post('/ruangan/approve-all', [RuangController::class, 'approveAll'])->name('ruangan.approveAll');

    Route::post('/jadwal/{id}/approve', [JadwalController::class, 'approveJadwal'])->name('jadwal.approve');
    Route::post('/jadwal/{id}/reject', [JadwalController::class, 'rejectJadwal'])->name('jadwal.reject');
    Route::get('/jadwal/{id}/cek', [JadwalController::class, 'cekJadwal'])->name('jadwal.cek');

    Route::get('/get-irs-by-angkatan', [KaprodiController::class, 'getIrsByAngkatan']);
    // Rute untuk mengubah status IRS menjadi 'Disetujui'
    Route::put('/update-status-irs/{id}', [KaprodiController::class, 'updateStatus'])->name('updateStatus');




    // Route untuk halaman Penyetujuan Jadwal Kuliah
    Route::get('/jadwal-penyetujuan', [JadwalController::class, 'showJadwalPenyetujuan'])->name('dekan.penyetujuanjadwalkuliah');


    
    //Kaprodi
    Route::get("/dashboard-kaprodi", [KaprodiController::class,"dashboard_kaprodi"]) -> name('kaprodi.dashboard');
    Route::get("/penyusunanjadwalkuliah-kaprodi", [KaprodiController::class, "penyusunanjadwalkuliah_kaprodi"]) -> name('kaprodi.penyusunanjadwalkuliah');
    Route::get("/penyusunanjadwalkuliah-kaprodi3", [KaprodiController::class, "penyusunanjadwalkuliah_kaprodi3"]) -> name('kaprodi.penyusunanjadwalkuliah3');
    Route::get("/penyusunanjadwalkuliah-kaprodi4", [KaprodiController::class, "penyusunanjadwalkuliah_kaprodi4"]) -> name('kaprodi.penyusunanjadwalkuliah3');
    Route::get("/verifikasiIRS-kaprodi", [KaprodiController::class, "verifikasiIRS"])->name('verifikasiIRS');
    Route::get("/verifikasiIRS-kaprodi2", [KaprodiController::class, "verifikasiIRS_kaprodi2"]);
    Route::post('/approve-irs', [IrsController::class, 'approveIrs']);

    // Route::get('jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::get("/penyusunanjadwalkuliah-kaprodi2", [JadwalController::class, 'index']) -> name('kaprodi.penyusunanjadwalkuliah2');
    // Route::post('jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
    // Route::post('jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('/mata-kuliahs/store', [MataKuliahController::class, 'store'])->name('mata_kuliahs.store');



    // Route::get('kalendar', [ScheduleController::class, 'index'])->name('kalendar.index');
    Route::get('jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('jadwal/store', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');



    // Menampilkan form untuk menambah jadwal

    // Menyimpan jadwal baru
    // Route::post('jadwal', [JadwalController::class, 'store'])->name('jadwal.store');

    // Menampilkan daftar jadwal (optional)
    // Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal.index');


    //Dosen
    Route::get("/dashboard-dosen", [DosenController::class,"dashboard_dosen"]) -> name('dosen.dashboard');
    Route::get("/perkembanganmahasiswa-dosen", [DosenController::class,"statusperkembanganmhs_dosen"]) -> name('dosen.statusperkembangan');
    Route::get("/perkembanganmahasiswa-dosen2", [DosenController::class, "statusperkembanganmhs_dosen2"]);
    Route::get("/perkembanganmahasiswa-dosen3", [DosenController::class, "statusperkembanganmhs_dosen3"]);
    Route::get("/perkembanganmahasiswa-dosen4", [DosenController::class, "statusperkembanganmhs_dosen4"]);
    Route::get("/verifikasiIRSpermintaan-dosen", [DosenController::class, "verifikasiIRSpermintaan_dosen"]) -> name('dosen.verifikasiIRS');
    Route::get("/verifikasiIRSSah-dosen", [DosenController::class, "verifikasiIRSdisahkan_dosen"]);
    Route::get("/verifikasiIRSditolak-dosen", [DosenController::class, "verifikasiIRSditolak_dosen"]);


    //Akademik

    Route::resource('ruangan', RuangController::class);
    Route::get("/penentuanruangkuliah-akademik", [AkademikController::class, "penentuanruangkuliah_akademik"]) -> name('akademik.penentuanruangkuliah');
    Route::get("/perubahannilai-akademik", [AkademikController::class,"perubahannilai_akademik"]) -> name('akademik.perubahannilai');

    Route::get("/dashboard-akademik", [AkademikController::class,"dashboard_akademik"]) -> name('akademik.dashboard');
    Route::get("/perubahanjadwalkuliah-akademik", [AkademikController::class, "perubahanjadwalkuliah_akademik"]) -> name('akademik.perubahanjadwalkuliah');

    //logout
    Route::post("/logout", [SesiController::class, "logout"]) -> name('logout');
    
});