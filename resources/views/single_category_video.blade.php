<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- All Styles -->
    @include('layouts.all_styles')

    <title>Thornior</title>
</head>
<body>

<!-- header area start -->
@include('layouts.home_navbar')
<!-- header area ends  -->

<!-- page header area start -->
<section class="page-header style-one style-two">
    <div class="overlay"></div>
    <div class="container">
        <div class="header-content">
            <h2>{{(\App\Models\Category::where('slug',$slug)->select('name')->first()->name)}}</h2>
            <p>Explore all kind of interior inspiration & ideas</p>
        </div>
    </div>
</section>
<!-- page header area ends  -->

<!-- latest blog slider start -->
<section class="latest-blog">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header">
                <h3>Latest <i class="fa fa-angle-right"></i></h3>
                <!-- slider arrow -->
                <div class="slider-arrow">
                    <div class="latest-button-prev prev">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="latest-button-next next">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="latest-blog-slider">
                <div class="swiper-wrapper">
                    @if(isset($posts['posts']))
                        @foreach($posts['posts'] as $post)
                            <div class="swiper-slide">
                                <div class="blog-item style-one">
                                    <div class="item-thumb">
                                        <img src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}" alt=""
                                             style="height: 200px">
                                        <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                            <div class="video-btn">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="blog-text">
                                        <div class="blog-cat">
                                        <span>@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                                +{{$post->categories->count()-1}}
                                                more @break @endif  @endforeach</span>
                                        </div>
                                        <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                            <h5>{{$post->title}}</h5>
                                        </a>
                                    </div>
                                    <div class="blog-timeline">
                                        <div class="bloger-thumb">
                                            <img src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                 alt="" style="width: 25px;height: 25px">
                                        </div>
                                        <div class="time-line">
                                                <span class="border-end pe-2"
                                                      style="font-size: 13px">{{substr($post->blogger->blog->blog_name,0,10)}}{{strlen($post->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                            <span
                                                style="font-size: 13px">{{$post->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- add progressbar -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- latest blog slider ends  -->

<!-- viewed slider area start -->
<section class="viewed-blog padding-tb pt-0">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header">
                <h3>Most viewed <i class="fa fa-angle-right"></i></h3>
                <!-- slider arrow -->
                <div class="slider-arrow">
                    <div class="viewed-button-prev prev">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="viewed-button-next next">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="viewed-blog-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="thumb-crount">
                                <div class="crount">
                                    <span>01</span>
                                </div>
                                <div class="item-thumb">
                                    <img src="assets/images/blog/latest/02.jpg" alt="">
                                    <div class="video-btn">
                                        <a href="#0">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="thumb-crount">
                                <div class="crount">
                                    <span>02</span>
                                </div>
                                <div class="item-thumb">
                                    <img src="assets/images/blog/latest/01.jpg" alt="">
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="thumb-crount">
                                <div class="crount">
                                    <span>03</span>
                                </div>
                                <div class="item-thumb">
                                    <img src="assets/images/blog/latest/02.jpg" alt="">
                                    <div class="video-btn">
                                        <a href="#0">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="thumb-crount">
                                <div class="crount">
                                    <span>04</span>
                                </div>
                                <div class="item-thumb">
                                    <img src="assets/images/blog/latest/01.jpg" alt="">
                                    <div class="video-btn">
                                        <a href="#0">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="thumb-crount">
                                <div class="crount">
                                    <span>05</span>
                                </div>
                                <div class="item-thumb">
                                    <img src="assets/images/blog/latest/02.jpg" alt="">
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="thumb-crount">
                                <div class="crount">
                                    <span>06</span>
                                </div>
                                <div class="item-thumb">
                                    <img src="assets/images/blog/latest/01.jpg" alt="">
                                    <div class="video-btn">
                                        <a href="#0">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="thumb-crount">
                                <div class="crount">
                                    <span>07</span>
                                </div>
                                <div class="item-thumb">
                                    <img src="assets/images/blog/latest/02.jpg" alt="">
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="thumb-crount">
                                <div class="crount">
                                    <span>08</span>
                                </div>
                                <div class="item-thumb">
                                    <img src="assets/images/blog/latest/02.jpg" alt="">
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add progressbar -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- viewed slider area ends  -->

<!-- thornior blog slider start -->
<section class="thornior-blog padding-tb">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header">
                <h3>Thornior recommend <i class="fa fa-angle-right"></i></h3>
                <!-- slider arrow -->
                <div class="slider-arrow">
                    <div class="thornior-button-prev prev">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="thornior-button-next next">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="thornior-blog-slider">
                <div class="swiper-wrapper">
                    @if(isset($posts['posts']))
                        @foreach($posts['posts'] as $post)
                            <div class="swiper-slide">
                                <div class="blog-item style-one">
                                    <div class="item-thumb">
                                        <img src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}" alt=""
                                             style="height: 200px">
                                        <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                            <div class="video-btn">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="blog-text">
                                        <div class="blog-cat">
                                        <span>@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                                +{{$post->categories->count()-1}}
                                                more @break @endif  @endforeach</span>
                                        </div>
                                        <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                            <h5>{{$post->title}}</h5>
                                        </a>
                                    </div>
                                    <div class="blog-timeline">
                                        <div class="bloger-thumb">
                                            <img src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                 alt="" style="width: 25px;height: 25px">
                                        </div>
                                        <div class="time-line">
                                                <span class="border-end pe-2"
                                                      style="font-size: 13px">{{substr($post->blogger->blog->blog_name,0,10)}}{{strlen($post->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                            <span
                                                style="font-size: 13px">{{$post->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- add progressbar -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- thornior blog slider ends  -->

<!-- videos blog slider start -->
<section class="videos-blog padding-tb pt-0">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header">
                <h3>Videos <i class="fa fa-angle-right"></i></h3>
                <!-- slider arrow -->
                <div class="slider-arrow">
                    <div class="videos-button-prev prev">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="videos-button-next next">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="videos-blog-slider">
                <div class="swiper-wrapper">
                    @if(isset($posts['posts']))
                        @foreach($posts['posts'] as $post)
                            @if(!isset($post->video))
                                @continue
                            @endif
                            <div class="swiper-slide">
                                <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                    <div class="blog-item style-one">
                                        <div class="item-thumb">
                                            <img src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}" alt=""
                                                 style="height: 200px">
                                            <div class="video-btn">
                                                <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                                    <i class="fa fa-play"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="blog-text">
                                            <div class="blog-cat">
                                        <span>@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                                +{{$post->categories->count()-1}}
                                                more @break @endif  @endforeach</span>
                                            </div>
                                            <h5>{{$post->title}}</h5>
                                        </div>
                                        <div class="blog-timeline">
                                            <div class="bloger-thumb">
                                                <img src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                     alt="" style="width: 25px;height: 25px">
                                            </div>
                                            <div class="time-line">
                                                <span class="border-end pe-2"
                                                      style="font-size: 13px">{{substr($post->blogger->blog->blog_name,0,10)}}{{strlen($post->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                                <span
                                                    style="font-size: 13px">{{$post->created_at->diffForHumans()}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- add progressbar -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- videos blog slider ends  -->

<!-- collabs blog slider start -->
<section class="collabs-blog padding-tb pt-0">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header">
                <h3>Collabs <i class="fa fa-angle-right"></i></h3>
                <!-- slider arrow -->
                <div class="slider-arrow">
                    <div class="collabs-button-prev prev">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="collabs-button-next next">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="collabs-blog-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="assets/images/blog/latest/02.jpg" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="assets/images/blog/latest/01.jpg" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="assets/images/blog/latest/02.jpg" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="assets/images/blog/latest/01.jpg" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="assets/images/blog/latest/02.jpg" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="assets/images/blog/latest/01.jpg" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="assets/images/blog/latest/02.jpg" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add progressbar -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- collabs blog slider ends  -->

<!-- footer area star -->
<footer class="border-top pt-5">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-md-between justify-content-center">
            <div class="footer-menu">
                <ul class="menulist list-unstyled d-flex align-items-center p-0 m-0">
                    <li class="me-3"><a href="{{route('index')}}">Home</a></li>
                    <li class="me-3"><a href="{{route('about')}}">About</a></li>
                    <li class="me-3"><a href="{{route('blogs')}}">Creators</a></li>
                    <li><a href="{{route('about')}}">Contact</a></li>
                </ul>
            </div>
            <div class="social-link pt-3 pt-md-0">
                <ul class="media-list list-unstyled d-flex p-0 m-0">
                    <li class="me-3"><span>Follow us :</span></li>
                    <li class="me-3 d-flex flex-wrap justify-content-center">
                        <i class="me-2 fab fa-facebook-f"></i>
                        <span>Facebook</span>
                    </li>
                    <li class="me-3 d-flex flex-wrap justify-content-center">
                        <i class="me-2 fab fa-pinterest-p"></i>
                        <span>Pinterest</span>
                    </li>
                    <li class="d-flex flex-wrap justify-content-center">
                        <i class="me-2 fab fa-instagram"></i>
                        <span>Instagram</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom mt-5">
        <div class="bottom-content bg-dark text-center pt-3 pb-3">
            <p class="m-0 text-white">&copy; Designed By <a href="#0" class="text-white font-bold">Thornior</a></p>
        </div>
    </div>
</footer>
<!-- footer area ends -->

<!-- All JS -->
@include('layouts.all_scripts')

<script>
    $(document).ready(function () {
        // $('.see-more-about').on('click', activaTab('tabs-5'));
        activaTab('tabs-5')
    });

    function activaTab(tab) {
        $('.nav-tabs a[href="#' + tab + '"]').tab('show');
    };
</script>
</body>
</html>
