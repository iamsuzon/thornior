<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloggerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:blogger', ['except' => ['bloggerlogout']]);
    }

    public function showForm()
    {
        return view('blogger.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('blogger')->attempt($credentials, $request->filled('remember')));
        {
            return redirect()->intended(route('blogger.dashboard'));
        }

        return back()->withInput($request->only('email','remember'));
    }

    public function bloggerlogout(Request $request)
    {
        Auth::guard('blogger')->logout();
        $request->session()->invalidate();

        return redirect('/');
    }
}
