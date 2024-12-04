<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Events\Registered;

class CustomAuthController extends Controller
{
    public function index()
    {
        return Redirect::back();
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return Redirect::back();
        } else {
            return back()->withErrors(['error' => 'ошибка']);
        }
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'login' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        $credentials = $request->only('email', 'password');
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User::create($request->all());

        if ($user) {
            if (Auth::attempt($credentials)) {

                event(new Registered($user));
                return redirect()->route('verification.notice');
            }
        } else {
            return back()->withErrors(['error' => 'ошибка']);
        }
    }


    public function signOut()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
