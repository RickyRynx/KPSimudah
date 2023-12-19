<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminKeuanganController extends Controller
{
    function index() {
        return view("adminKeuangan/dashboard/index");
    }
}
