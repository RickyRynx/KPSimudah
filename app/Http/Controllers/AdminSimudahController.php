<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSimudahController extends Controller
{
    function index() {
        return view("adminSimudah/dashboard/index");
    }
}
