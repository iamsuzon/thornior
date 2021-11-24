<?php

namespace App\Http\Controllers\BloggerControllers;

use App\Http\Controllers\Controller;
use App\Models\BloggerProduct;
use App\Models\AllPost;
use App\Models\Video;
use App\Services\Blogger\AddImages;
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'template' => 'required',
            'category' => 'required',
            'thumbnail_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'video' => 'required|mimes:mp4,mkv,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv|max:40000',
        ]);

        if ($request->has('main_article_image') and $request->main_article_image != null) {
            $validator = Validator::make($request->all(), [
                'main_article_image' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_1') and $request->image_1 != null) {
            $validator = Validator::make($request->all(), [
                'image_1' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_2') and $request->image_2 != null) {
            $validator = Validator::make($request->all(), [
                'image_2' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_3') and $request->image_3 != null) {
            $validator = Validator::make($request->all(), [
                'image_3' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_4') and $request->image_4 != null) {
            $validator = Validator::make($request->all(), [
                'image_4' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_5') and $request->image_5 != null) {
            $validator = Validator::make($request->all(), [
                'image_5' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_6') and $request->image_6 != null) {
            $validator = Validator::make($request->all(), [
                'image_6' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_7') and $request->image_7 != null) {
            $validator = Validator::make($request->all(), [
                'image_7' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()]);
        }

        $videoPost = new Video();
        $videoPost->blogger_id = Auth::guard('blogger')->id();
        $videoPost->template_id = $request->template;
        $videoPost->post_type = 'video';
        if ($request->post_status == 1) {
            $videoPost->post_status = 1;
        } else {
            $videoPost->post_status = 0;
        }
        $videoPost->title = $request->title;
        $videoPost->intro_heading = $request->first_headline;
        $videoPost->outro_heading = $request->last_headline;
        $videoPost->intro_description = $request->first_description;
        $videoPost->outro_description = $request->last_description;
        $videoPost->headline1 = $request->headline_1;
        $videoPost->headline2 = $request->headline_2;
        $videoPost->headline3 = $request->headline_3;
        $videoPost->headline4 = $request->headline_4;
        $videoPost->description1 = $request->description_1;
        $videoPost->description2 = $request->description_2;
        $videoPost->description3 = $request->description_3;
        $videoPost->description4 = $request->description_4;

        $videoPost->color1 = $request->color_code1;
        $videoPost->color2 = $request->color_code2;
        $videoPost->color3 = $request->color_code3;
        $videoPost->color4 = $request->color_code4;
        $videoPost->color5 = $request->color_code5;


        if ($request->has('video') and $request->video != null) {
            $video_file_name = time() . 'v.' . $request->video->extension();
            $video_file_path = public_path('/upload/blogger_video_post/' . $request->user()->id);
            $request->video->move($video_file_path, $video_file_name);
            $videoPost->video = $video_file_name;
        }

        $images = new AddImages();
        $images->videoImagesToAdd($request, $videoPost);

        $videoPost->save();
        $data = ['blogger_id' => $videoPost->blogger_id];
        $videoPost->categories()->attach($request->category, $data);

        if ($request->post_status == 0) {
            return response()->json([
                'success' => 'File Uploaded Successfully',
                'slug' => $videoPost->slug
            ]);
        } elseif ($request->post_status == 3) {
            return response()->json(['success' => 'Post saved in library successfully']);
        }

        return response()->json(['success' => 'Post Uploaded Successfully']);
    }

    public function VideoPostShow($slug)
    {
        $post['post'] = AllPost::where('slug', $slug)->where('blogger_id', Auth::guard('blogger')->id())->first();
        $post['products'] = BloggerProduct::where('blogger_id', Auth::guard('blogger')->id())->get();
        return view('post', compact('post'));
    }
}
