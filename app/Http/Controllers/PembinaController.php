<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembinaController extends Controller
{
    function index() {
        return view("pembina/dashboard/index");
    }
}
