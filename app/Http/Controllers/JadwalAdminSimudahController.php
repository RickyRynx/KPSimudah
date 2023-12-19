<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalAdminSimudahController extends Controller
{
    function index() {
        return view("adminSimudah/jadwal/index");
    }
}
