<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $user = DB::table('users')->where('email', $request->email)->first();
        $deleted = false;

        if(!is_null($user) && !is_null($user->deleted_at)) {
            DB::table('users')->where('id', $user->id)->update(['deleted_at' => null]);
            $deleted = true;
        }

        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        $user = User::find($user->id);
        
        if(!Auth::attempt($credentials, $request->boolean('remember'))) {
            if($deleted) {
                $user->delete();
            }
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
