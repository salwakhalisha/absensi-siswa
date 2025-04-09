<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function authenticate(Request $request):RedirectResponse
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();

            return redirect()->route('index');
        }

        else {
            return $this->LoginError();
        }
    }

    public function LoginError()
    {
        return back()->with('Username atau password salah.');
    }

    public function logout(Request $request):RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
