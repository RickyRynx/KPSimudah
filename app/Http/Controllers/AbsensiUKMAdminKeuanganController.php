<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiUKMAdminKeuanganController extends Controller
{
    function index() {
        return view("adminKeuangan/absensiUKM/index");
    }
}
