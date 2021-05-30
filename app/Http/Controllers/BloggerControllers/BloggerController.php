<?php

namespace App\Http\Controllers\BloggerControllers;

use App\Models\Blogger;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BloggerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('blogger.dashboard');
    }

    public function settingsProfileShow()
    {
        $bloggerData['blogger'] = Blogger::findOrFail(Auth::guard('blogger')->id());

        if ($bloggerData['blogger']->region != null)
        {
            $bloggerData['region'] = Country::where('code',$bloggerData['blogger']->region)->first();
        }

        return view('blogger.settings.settings',compact('bloggerData'));
    }

    public  function settingsProfileSubmit(Request $request)
    {
        $info = $this->validate($request, [
            'name' => 'required|min:10|max:50',
            'email' => 'required|email',
            'region' => 'required',
            'about' => 'max:800',
        ]);

        $blogger = Blogger::findOrFail(Auth::guard('blogger')->id());
        $blogger->name = $info['name'];
        $blogger->email = $info['email'];
        $blogger->region = $info['region'];
        $blogger->about = $info['about'];
        $blogger->save();

        return back()->with('message','Your Profile is Updated Successfully');
    }
}
