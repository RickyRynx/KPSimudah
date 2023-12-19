<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalPelatihController extends Controller
{
    function index() {
        return view("pelatih/jadwal/index");
    }
}
