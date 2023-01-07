<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);
        
        if(!Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'login' => __('auth.failed')
            ]);
        }

        if(!$request->user()->hasVerifiedEmail()) {
            $request->user()->sendEmailVerificationNotification();
        }

        $request->session()->regenerate();
        return redirect()->intended('/dashboard')->with('status', 'Iniciaste sesión');
    }

    public function destroy(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('home')->with('status', "Cerraste sesión");
    }
}
