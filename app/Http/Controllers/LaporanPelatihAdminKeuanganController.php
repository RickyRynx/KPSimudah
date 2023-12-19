<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPelatihAdminKeuanganController extends Controller
{
    function index() {
        return view("adminKeuangan/laporanPelatih/index");
    }
}
