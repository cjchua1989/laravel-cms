<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        if(Auth::check())
            return redirect()->route('home');

        return view('login');
    }

    public function postLogin(LoginRequest $request) {

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withError("Invalid credentials provided, please try again")->onlyInput('email');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
