<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Blogger;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

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
        if (Blogger::where('id',Auth::id())->where('is_approved',1)->first() != null)
        {
            return redirect(route('blogger.dashboard'));
        }
        return view('auth.approve');
    }
}
