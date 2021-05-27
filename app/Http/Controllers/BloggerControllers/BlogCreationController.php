<?php

namespace App\Http\Controllers\BloggerControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCreationController extends Controller
{
    public function step1(Request $request)
    {
        if ($request->blog_name != null)
        {
            $_COOKIE['blog_name'] = $request->blog_name;
            return redirect(route('blogger.blog.create.step2'));
        }
        return view('blogger.blog_create_process.step1');
    }

    public function step2(Request $request)
    {
        if ($request->region != null)
        {
            $_COOKIE['region'] = $request->region;
            dd($_COOKIE['region']);
//            return redirect();
        }
        return view('blogger.blog_create_process.step2');
    }
}
