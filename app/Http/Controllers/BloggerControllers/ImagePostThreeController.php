<?php

namespace App\Http\Controllers\BloggerControllers;

use App\Events\UserActivity;
use App\Http\Controllers\Controller;
use App\Models\BloggerProduct;
use App\Models\ImagePostTemplateThree;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ImagePostThreeController extends Controller
{
    public function ImagePostIndexThree()
    {
        return view('blogger.posts.image_templates.editor_template_three');
    }

    public function ImagePostStoreThree(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'first_heading' => 'required',
            'first_description' => 'required|min:25',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'headline_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'main_article_image_1' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'main_article_image_2' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'main_article_image_3' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'headline_1' => 'required',
            'headline_2' => 'required',
            'headline_3' => 'required',
            'description_1' => 'required',
            'description_2' => 'required',
            'description_3' => 'required',
            'last_headline' => 'required',
            'last_description' => 'required|min:25',
            'bottom_image_1' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072',
            'bottom_image_2' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072',
            'outro_heading' => 'required',
            'outro_description' => 'required|min:25',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->input());
        }

        $imagePost = new ImagePostTemplateThree();
        $imagePost->blogger_id = Auth::guard('blogger')->id();
        $imagePost->template_id = 3;
        $imagePost->post_type = 'image';
        if ($request->post_status == 1)
        {
            $imagePost->post_status = 1;
        }
        else{
            $imagePost->post_status = 0;
        }
        $imagePost->title = $request->title;
        $imagePost->top_header = $request->first_heading;
        $imagePost->top_description = $request->first_description;
        $imagePost->bottom_header = $request->last_headline;
        $imagePost->bottom_description = $request->last_description;
        $imagePost->outro_header = $request->outro_heading;
        $imagePost->outro_description = $request->outro_description;

        $imagePost->headline1 = $request->headline_1;
        $imagePost->headline2 = $request->headline_2;
        $imagePost->headline3 = $request->headline_3;
        $imagePost->description1 = $request->description_1;
        $imagePost->description2 = $request->description_2;
        $imagePost->description3 = $request->description_3;

        $imagePost->color1 = $request->color_code1;
        $imagePost->color2 = $request->color_code2;
        $imagePost->color3 = $request->color_code3;
        $imagePost->color4 = $request->color_code4;
        $imagePost->color5 = $request->color_code5;

        $fimage = time() . 'f.' . $request->cover_image->extension();
        $fname_path = 'upload/blogger_image_post/' . $fimage;

        $headline_image = time() . 'ai1.' . $request->headline_image->extension();
        $headline_image_path = 'upload/blogger_image_post/' . $headline_image;

        $main_article_image_1 = time() . 'ai1.' . $request->main_article_image_1->extension();
        $main_article_image_path_1 = 'upload/blogger_image_post/' . $main_article_image_1;

        $main_article_image_2 = time() . 'ai2.' . $request->main_article_image_2->extension();
        $main_article_image_path_2 = 'upload/blogger_image_post/' . $main_article_image_2;

        $main_article_image_3 = time() . 'ai3.' . $request->main_article_image_3->extension();
        $main_article_image_path_3 = 'upload/blogger_image_post/' . $main_article_image_3;

        $bottom_image1 = time() . 'oi.' . $request->bottom_image_1->extension();
        $bottom_image_path1 = 'upload/blogger_image_post/' . $bottom_image1;
        $bottom_image2 = time() . 'oi.' . $request->bottom_image_2->extension();
        $bottom_image_path2 = 'upload/blogger_image_post/' . $bottom_image2;

        $imagePost->fimage = $fimage;
        $imagePost->article_image1 = $headline_image; //In database headline image is named by article image 1
        $imagePost->article_image2 = $main_article_image_1;
        $imagePost->article_image3 = $main_article_image_2;
        $imagePost->article_image4 = $main_article_image_3;

        $imagePost->bottom_image1 = $bottom_image1;
        $imagePost->bottom_image2 = $bottom_image2;

        Image::make($request->file('cover_image'))->save($fname_path, 80, 'jpg');
        Image::make($request->file('headline_image'))->save($headline_image_path, 80, 'jpg');
        Image::make($request->file('main_article_image_1'))->save($main_article_image_path_1, 80, 'jpg');
        Image::make($request->file('main_article_image_2'))->save($main_article_image_path_2, 80, 'jpg');
        Image::make($request->file('main_article_image_3'))->save($main_article_image_path_3, 80, 'jpg');

        Image::make($request->file('bottom_image_1'))->save($bottom_image_path1, 80, 'jpg');
        Image::make($request->file('bottom_image_2'))->save($bottom_image_path2, 80, 'jpg');

        $products = BloggerProduct::where('blogger_id',Auth::guard('blogger')->id())
                                ->where('post_id',null)->get();
        if (count($products) > 0)
        {
            foreach ($products as $product) {
                $all_product[] = $product->id;
            }
            $imagePost->product_id = json_encode($all_product);
        }

        $imagePost->save();
        $data = ['blogger_id' => $imagePost->blogger_id];
        $imagePost->categories()->attach($request->category,$data);

        if ($products != null)
        {
            foreach ($products as $product) {
                $product->post_id = $imagePost->id;
                $product->post_type = 'image';
                $product->template_id = $imagePost->template_id;
                $product->save();
            }
        }

        event(new UserActivity($imagePost->blogger_id, $imagePost->post_type, $imagePost->template_id, $imagePost->id));

        if ($request->post_status == 0)
        {
            return redirect()->route('blogger.blog.post.image.show.3',$imagePost->slug);
        }
        elseif ($request->post_status == 3)
        {
            return back()->with('success', 'Post saved in library successfully');
        }

        return back()->with('success', 'Post upload successfully');
    }

    public function ImagePostShowThree($slug)
    {
        $post['post'] = ImagePostTemplateThree::where('slug', $slug)->where('blogger_id', Auth::guard('blogger')->id())->first();
        $post['products'] = BloggerProduct::where('blogger_id', Auth::guard('blogger')->id())
            ->where('post_id',$post['post']->id)
            ->where('post_type',$post['post']->post_type)
            ->where('template_id',$post['post']->template_id)->get();
        $post['related_posts'] = ImagePostTemplateThree::where('id','!=',$post['post']->id)->inRandomOrder()->get();
        $post['like'] = $this->checkLike($post['post']);
        return view('blogger.posts.image_post_show', compact('post'));
    }

    public function ImagePostEditThree($id)
    {
        $post['post'] = ImagePostTemplateThree::where('id', $id)->where('blogger_id', Auth::guard('blogger')->id())->first();
        if ($post['post'] == null)
        {
            return back();
        }
        $post['products'] = BloggerProduct::where('blogger_id', Auth::guard('blogger')->id())
                                            ->where('post_id',$id)
                                            ->where('template_id',$post['post']->template_id)
                                            ->get();
        $ColorData = null;
        for($i=1; $i<6; $i++)
        {
            $color = 'color'.$i;
            if ($post['post']->$color == null)
            {
                continue;
            }
            $ColorData[$i] = $post['post']->$color;
        }
        $post['colors'] = $ColorData;

        return view('blogger.posts.image_templates_edit.editor_template_three_edit', compact('post'));
    }

    public function ImagePostUpdateThree(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'first_heading' => 'required',
            'first_description' => 'required|min:25',
            'headline_1' => 'required',
            'headline_2' => 'required',
            'headline_3' => 'required',
            'description_1' => 'required',
            'description_2' => 'required',
            'description_3' => 'required',
            'last_headline' => 'required',
            'last_description' => 'required|min:25',
            'outro_heading' => 'required',
            'outro_description' => 'required|min:25',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->input());
        }

        $imagePost = ImagePostTemplateThree::where('blogger_id', Auth::guard('blogger')->id())
            ->where('id', $id)->first();
        if ($request->post_status == 1)
        {
            $imagePost->post_status = 1;
        }

        $imagePost->title = $request->title;
        $imagePost->top_header = $request->first_heading;
        $imagePost->top_description = $request->first_description;
        $imagePost->bottom_header = $request->last_headline;
        $imagePost->bottom_description = $request->last_description;
        $imagePost->outro_header = $request->outro_heading;
        $imagePost->outro_description = $request->outro_description;

        $imagePost->headline1 = $request->headline_1;
        $imagePost->headline2 = $request->headline_2;
        $imagePost->headline3 = $request->headline_3;
        $imagePost->description1 = $request->description_1;
        $imagePost->description2 = $request->description_2;
        $imagePost->description3 = $request->description_3;

        $imagePost->color1 = $request->color_code1;
        $imagePost->color2 = $request->color_code2;
        $imagePost->color3 = $request->color_code3;
        $imagePost->color4 = $request->color_code4;
        $imagePost->color5 = $request->color_code5;

        if ($request->has('cover_image') AND $request->cover_image != null)
        {
            $fimage = time() . 'f.' . $request->cover_image->extension();
            $fname_path = 'upload/blogger_image_post/' . $fimage;
            $imagePost->fimage = $fimage;
            Image::make($request->file('cover_image'))->save($fname_path, 80, 'jpg');
        }
        if ($request->has('headline_image') AND $request->headline_image != null)
        {
            $headline_image = time() . 'hi.' . $request->headline_image->extension();
            $headline_image_path = 'upload/blogger_image_post/' . $headline_image;
            $imagePost->article_image1 = $headline_image_path;
            Image::make($request->file('headline_image'))->save($headline_image_path, 80, 'jpg');
        }
        if ($request->has('main_article_image_1') AND $request->main_article_image_1 != null)
        {
            $main_article_image_1 = time() . 'ai1.' . $request->main_article_image_1->extension();
            $main_article_image_path_1 = 'upload/blogger_image_post/' . $main_article_image_1;
            $imagePost->article_image1 = $main_article_image_1;
            Image::make($request->file('main_article_image_1'))->save($main_article_image_path_1, 80, 'jpg');
        }
        if ($request->has('main_article_image_2') AND $request->main_article_image_2 != null)
        {
            $main_article_image_2 = time() . 'ai2.' . $request->main_article_image_2->extension();
            $main_article_image_path_2 = 'upload/blogger_image_post/' . $main_article_image_2;
            $imagePost->article_image2 = $main_article_image_2;
            Image::make($request->file('main_article_image_2'))->save($main_article_image_path_2, 80, 'jpg');
        }
        if($request->has('main_article_image_3') AND $request->main_article_image_3 != null)
        {
            $main_article_image_3 = time() . 'ai3.' . $request->main_article_image_3->extension();
            $main_article_image_path_3 = 'upload/blogger_image_post/' . $main_article_image_3;
            $imagePost->article_image3 = $main_article_image_3;
            Image::make($request->file('main_article_image_3'))->save($main_article_image_path_3, 80, 'jpg');
        }
        if ($request->has('bottom_image_1') AND $request->bottom_image_1 != null)
        {
            $bottom_image_1 = time() . '3.' . $request->bottom_image_1->extension();
            $bottom_image_1_path = 'upload/blogger_image_post/' . $bottom_image_1;
            $imagePost->bottom_image_1 = $bottom_image_1;
            Image::make($request->file('bottom_image_1'))->save($bottom_image_1_path, 80, 'jpg');
        }
        if ($request->has('bottom_image_2') AND $request->bottom_image_2 != null)
        {
            $bottom_image_2 = time() . '3.' . $request->bottom_image_2->extension();
            $bottom_image_2_path = 'upload/blogger_image_post/' . $bottom_image_2;
            $imagePost->bottom_image_2 = $bottom_image_2;
            Image::make($request->file('bottom_image_2'))->save($bottom_image_2_path, 80, 'jpg');
        }

        $products = BloggerProduct::where('blogger_id',Auth::guard('blogger')->id())
            ->where('post_id',null)->get();

        if (count($products) > 0)
        {
            foreach ($products as $product) {
                $all_product[] = $product->id;
            }
            $imagePost->product_id = json_encode($all_product);
        }

        $imagePost->save();
        $data = ['blogger_id'=>$imagePost->blogger_id];

        $imagePost->categories()->detach();
        $imagePost->categories()->attach($request->category,$data);

        if ($products != null)
        {
            foreach($products as $product)
            {
                $product->post_id = $imagePost->id;
                $product->post_type = 'image';
                $product->template_id = $imagePost->template_id;
                $product->save();
            }
        }

        if ($request->post_status == 0)
        {
            return redirect()->route('blogger.blog.post.image.show',$imagePost->slug);
        }
        elseif ($request->post_status == 3)
        {
            return back()->with('success', 'Post saved in library successfully');
        }

        return back()->with('success', 'Post update successfully');
    }

    public function checkLike($post)
    {
        if (Auth::guard('blogger')->check())
        {
            $user_guard = 'blogger';
        }
        else if (Auth::guard('web')->check())
        {
            $user_guard = 'web';
        }

        $like = Like::where('template_type', $post->post_type)
            ->where('template_id', $post->template_id)
            ->where('post_id', $post->id)
            ->where('user_type', $user_guard)
            ->where('user_id', Auth::id())
            ->exists();

        return $like;
    }
}
