<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Suppor\Facades\Auth;

class DosenController extends Controller
{
    function dashboard_dosen (){
        return view ('dosen/indexDashboardDosen');
    }
    function statusperkembanganmhs_dosen(){
        return view ('dosen/indexPerkembanganMahasiswa');
    }
    function statusperkembanganmhs_dosen2(){
        return view ('dosen/indexPerkembanganMahasiswa2');
    }
    function statusperkembanganmhs_dosen3(){
        return view ('dosen/indexPerkembanganMahasiswa3');
    }
    function statusperkembanganmhs_dosen4(){
        return view ('dosen/indexPerkembanganMahasiswa4');
    }
    function verifikasiIRSpermintaan_dosen(){
        return view('dosen/indexVerifikasiIRSMintaDosen');
    }
    function verifikasiIRSdisahkan_dosen(){
        return view('dosen/indexVerifikasIRSDisahkanDosen');
    }
    function verifikasiIRSditolak_dosen(){
        return view('dosen/indexVerifikasiIRSDitolakDosen');
    }
}