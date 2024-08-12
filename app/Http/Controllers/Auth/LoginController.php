<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('pages.auths.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $credentials = $request->only(['username', 'password']);
        //check is login incorrent credentials
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->role_id;
            if ($role === 2) {
                return redirect()->intended('/admin')->with('message', 'Login successful.');
            } else if ($role === 3) {
                return redirect()->intended('/')->with('message', 'Login successful.');
            } else {
                return redirect()->intended('/superadmin')->with('message', 'Login successful.');
            }
        }
        return redirect()->back()->withInput()->withErrors(['error' => 'Invalided Credentials']);
    }
}
