<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiPelatihController extends Controller
{
    function index() {
        return view("pelatih/absensi/index");
    }
}
