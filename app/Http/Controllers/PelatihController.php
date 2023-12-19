<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelatihController extends Controller
{
    function index() {
        return view("pelatih/dashboard/index");
    }
}
