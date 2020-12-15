<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('admin.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            
            return redirect()->route('main');
        }
        else {
            return redirect()->route('login')->withErrors(['error' => 'Wrong email or password.']);
        }

    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
