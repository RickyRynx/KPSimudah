<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiMahasiswaAdminKeuanganController extends Controller
{
    function index() {
        return view("adminKeuangan/absensiMahasiswa/index");
    }
}
