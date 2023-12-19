<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPembinaController extends Controller
{
    function index() {
        return view("pembina/laporanMahasiswa/index");
    }
}
