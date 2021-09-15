<?php

namespace App\Http\Controllers\BloggerControllers;

use App\Http\Controllers\Controller;
use App\Models\BloggerProduct;
use App\Models\AllPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class VideoPostController extends Controller
{
    public function VideoPostIndex()
    {
        return view('blogger.posts.video_post_editor');
    }
    public function VideoPostStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'template' => 'required',
            'first_headline' => 'required',
            'first_description' => 'required|min:25',
            'editor' => 'required',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'image1' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072',
            'image2' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072',
            'image3' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072',
            'last_headline' => 'required',
            'last_description' => 'required|min:25',
            'color_code' => 'required',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->input());
        }

        $imagePost = new AllPost();
        $imagePost->blogger_id = Auth::guard('blogger')->id();
        $imagePost->template_id = $request->template;
        $imagePost->post_type = 'image';
        $imagePost->title = $request->title;
        $imagePost->header1 = $request->first_headline;
        $imagePost->header2 = $request->last_headline;
        $imagePost->des1 = $request->first_description;
        $imagePost->des2 = $request->last_description;
        $imagePost->editor = $request->editor;

        $imagePost->colors = json_encode($request->color_code);

        $fimage = time() . 'f.' .$request->featured_image->extension();
        $fname_path = 'upload/blogger_image_post/'.$fimage;
        $image1 = time() . '1.' .$request->image1->extension();
        $name_path1 = 'upload/blogger_image_post/'.$image1;
        $image2 = time() . '2.' .$request->image2->extension();
        $name_path2 = 'upload/blogger_image_post/'.$image2;
        $image3 = time() . '3.' .$request->image3->extension();
        $name_path3 = 'upload/blogger_image_post/'.$image3;

        $imagePost->fimage = $fimage;
        $imagePost->image1 = $image1;
        $imagePost->image2 = $image2;
        $imagePost->image3 = $image3;

        Image::make($request->file('featured_image'))->save($fname_path, 80, 'jpg');
        Image::make($request->file('image1'))->save($name_path1, 80, 'jpg');
        Image::make($request->file('image2'))->save($name_path2, 80, 'jpg');
        Image::make($request->file('image3'))->save($name_path3, 80, 'jpg');

        $imagePost->save();
        $imagePost->categories()->sync($request->category);

        return back()->with('success','Post upload successfully');
    }

    public function VideoPostShow($slug)
    {
        $post['post'] = AllPost::where('slug',$slug)->where('blogger_id',Auth::guard('blogger')->id())->first();
        $post['products'] = BloggerProduct::where('blogger_id',Auth::guard('blogger')->id())->get();
        return view('post',compact('post'));
    }
}
