<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(AuthRequest $request)
    {
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password'), 'role' => 'admin'])) {
            return redirect()->intended('/');
        }
        return redirect('login')->withErrors('wrong credential');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }
}
