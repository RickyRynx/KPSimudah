<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengumumanAdminSimudahController extends Controller
{
    function index() {
        return view("adminSimudah/pengumuman/index");
    }
}
