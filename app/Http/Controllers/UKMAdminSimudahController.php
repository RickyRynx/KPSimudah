<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UKMAdminSimudahController extends Controller
{
    function index() {
        return view("adminSimudah/ukm/index");
    }
}
