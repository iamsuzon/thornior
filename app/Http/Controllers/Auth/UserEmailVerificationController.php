<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class UserEmailVerificationController extends Controller
{
    public function mustVerify()
    {
        return view('auth.verify');
    }

    public function emailVerified(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('user/dashboard');
    }

    public function sendVerifyEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

    /* For Approval Blade */
    public function notApprove()
    {
        return view('auth.approve');
    }
}
