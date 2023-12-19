<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAdminSimudahController extends Controller
{
    function index() {
        return view("adminSimudah/user/index");
    }
}
