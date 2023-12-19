<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WakilRektorIIIController extends Controller
{
    function index() {
        return view("wakilRektorIII/dashboardBidangKemahasiswaan");
    }
}
