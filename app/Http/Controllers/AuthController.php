<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Display a form of the login.
     */
    public function login(): View
    {
        return view('auth.login');
    }
    /**
     * Check Login credentials.
     */
    public function checkLogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            if(Auth::user()->hasRole('District')){
                return redirect()->intended('/OOSC_2024'); // Change to your desired redirect route
            }else{
                return redirect()->intended('/dashboard'); // Change to your desired redirect route
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    /**
     * Logout User.
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect('/');
    }
}
