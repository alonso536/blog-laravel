<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => ['required', 'string', 'min:4', 'max:25'],
            'apellido' => ['required', 'string', 'min:4', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $user = User::create([
            'role' => 'user',
            'name' => $request->nombre,
            'surname' => $request->apellido,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        Auth::login($user);
        $user->sendEmailVerificationNotification();
        
        return to_route('dashboard');
    }
}
