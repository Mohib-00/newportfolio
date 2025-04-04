<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\RateLimiter;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

      public function sendResetLink(Request $request)
{
    $request->validate(['email' => 'required|email|exists:users,email']);

    RateLimiter::clear('passwords.'. $request->input('email'));

    $status = Password::sendResetLink($request->only('email'));

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['success' => __($status)])
        : back()->withErrors(['email' => __($status)]);
}
}
