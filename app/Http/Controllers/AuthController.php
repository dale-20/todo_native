<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    //login
    public function login(Request $request)
    {
        $user = User::where("email", $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user_id', $user->id);
            return redirect('/tasks');
        }
        return back()->with('error', 'Invalid credentials');
    }

    //showLogin
    public function showLogin()
    {
        return view('login');
    }

    //logout
    public function logout()
    {
        Session::forget('user_id');
        return redirect('/login');
    }

    //register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/login');
    }
    
    //showRegister
    public function showRegister(Request $request)
    {
        return view('register');
    }

}
