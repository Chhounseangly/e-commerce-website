<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //redirect to register page
    public function index()
    {
        return view('pages.auths.register');
    }

    //handle action of registration form
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',

        ]);
        //hash password
        $validatedData['password'] = Hash::make($request->input('password'));
        //role id 3 = guest
        $validatedData['role_id'] = 3;
        // Create a new user
        $user = User::create($validatedData);
        // Attempt to log the user in
        if (Auth::attempt(['username' => $user->username, 'password' => $request->input('password')])) {
            $request->session()->regenerate();
            //interded it' mean return to prev page or 
            //we can add path to redirect for it ex. intended('/home')
            return redirect()->intended('/')->with('message', 'Registration and login successful.');
        }
        dd('fdsa');
        // Handle login failure (shouldn't occur in this case)
        return redirect()->back()->withErrors(['error' => 'Login failed']);
    }
}
