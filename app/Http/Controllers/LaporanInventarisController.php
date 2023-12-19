<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanInventarisController extends Controller
{
    function index() {
        return view("pembina/laporanInventaris/index");
    }
}
