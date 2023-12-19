<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KegiatanPelatihController extends Controller
{
    function index() {
        return view("pelatih/kegiatan/index");
    }
}
