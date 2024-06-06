<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function loginuser()
    {
        return view('user.Form.LoginUser');
    }

    public function loginusereque(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('usersession',auth()->guard('user')->user()->username);
            return redirect()->route('home.home');
        }
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function logoutuser()
    {
        $message = '';
        if (session()->has('usersession')) {
            $message = 'Successful logout'.session('usersession').'.';
        }
        Auth::guard('user')->logout();
        Session::flush();
        return redirect()->route('home.home')->with('LogoutAdmin',$message);
    }

    public function registeruser()
    {
        return view('user.Form.RegisterUser');
    }

    public function storeuser(Request $request)
    {
        //dd($request);
        logger()->info($request->all());

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:10',
        ]);

        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('user.loginuser')->with('success', ''.$request->username.' created successfully!');
    }
}
