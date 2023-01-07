<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{   
    public function index(Request $request) {
        if($request->user()->hasVerifiedEmail()) {
            return to_route('dashboard');
        }
        return view('auth.verify-email');
    }

    public function create(EmailVerificationRequest $request) {
        $request->fulfill();
 
        return to_route('dashboard')->with('status', 'Email verificado');
    }

    public function store(Request $request) {
        $request->user()->sendEmailVerificationNotification();
 
        return back()->with('status', 'Link reenviado');
    }
}
