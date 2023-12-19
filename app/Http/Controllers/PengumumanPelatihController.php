<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengumumanPelatihController extends Controller
{
    function index() {
        return view("pelatih/pengumuman/index");
    }
}
