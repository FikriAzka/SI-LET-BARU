<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Suppor\Facades\Auth;

class KaprodiController extends Controller
{
    function dashboard_kaprodi(){
        return view('kaprodi/indexDashboardKaprodi');
    }
    function penyusunanjadwalkuliah_kaprodi(){
        return view('kaprodi/indexPenyusunanJadwalKuliah');
    }
    function penyusunanjadwalkuliah_kaprodi2(){
        return view('kaprodi/indexPenyusunanJadwalKuliah2');
    }
    function penyusunanjadwalkuliah_kaprodi3(){
        return view('kaprodi/indexPenyusunanJadwalKuliah3');
    }
    function penyusunanjadwalkuliah_kaprodi4(){
        return view('kaprodi/indexPenyusunanJadwalKuliah4');
    }
    function verifikasiIRS_kaprodi(){
        return view('kaprodi/indexVerifikasiIRSKaprodi');
    }
    function verifikasiIRS_kaprodi2(){
        return view('kaprodi/indexVerifikasiIRSKaprodi2');
    }
}