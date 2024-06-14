<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function register() {
        $data['title'] = 'Register';
        return view('user/register', $data);
    }

    function register_action(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'konfirmasi_password' => 'required|same:password',
            'status_user' => 'required',
        ]);
        $user = new user([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status_user' => $request->status_user,
        ]);
        $user->save();
        return redirect()->route('login')->with('Success', 'Registration Succesfully. Please Login!!');
    }
}
