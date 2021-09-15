<style>
    @media screen and (min-width: 1200px) {
        .container {
            width: 960px !important;
        }
    }

    .video-thumb video {
        width: 100%;
    }

    #last-images img {
        width: 100%;
        height: auto;
    }

    #last-images {
        margin-top: 100px;
        margin-bottom: 100px;
    }

    #color-palettes .color-box {
        width: 120px;
    }

    #color-palettes .color-box > .box {
        width: 120px;
        height: 80px;
    }

    #comment-box {
        margin-top: 50px;
        margin-bottom: 50px;
    }

    #comment-box .social-interaction li {
        font-size: 25px;
        margin-left: 50px;
    }

    #comment-box .social-interaction li:first-child {
        margin: 0;
    }

    #comment-box .comments .comment-image {
        width: 5%;
        float: left;
    }

    #comment-box .comments .comment-text {
        width: 95%;
        float: left;
    }

    #comment-box .comment-field {
        margin-top: 200px;
    }

    @media screen and (max-width: 576px) {
        .image-thumb > img {
            width: 100%;
            height: auto;
        }

        .des-tips .col-sm-12 {
            margin-top: 30px;
        }

        .des-tips .list {
            margin: 0 20px;
        }

        .des-tips .list .list-span-1 .list-span-2 {
            left: 0 !important;
            bottom: -35px !important;
        }

        .des-tips .list .list-span-1 .list-span-2 h3 {
            padding: 0 10px !important;
            font-size: 20px !important;
        }

        .des-tips .list-span-1 h5 {
            margin-left: 40px;
        }

        #last-images {
            margin-top: 0px;
            margin-bottom: 30px;
        }

        #last-images .image-box {
            width: 50% !important;
        }

        #color-palettes .color-box {
            width: 100px;
        }

        #color-palettes .color-box > .box {
            width: 100px;
            height: 50px;
        }

        #comment-box .comments .comment-image {
            width: 10%;
            float: left;
        }

        #comment-box .comments .comment-text {
            width: 80%;
            float: left;
            margin-left: 15px;
        }
    }
</style>

<!-- page header area start -->
<section class="page-header">
    <div class="container">
        <div class="header-content">
            <div class="blog-cat" style="padding: 12px 0 10px">
                @foreach($post['post']->categories as $category)
                    <span id="post_categories"
                          style="padding: 3px 10px;background-color: black;color: white;border-radius: 5px">{{$category->name}}</span>
                @endforeach
            </div>
            <h3 id="post-title">{{$post['post']->title}}</h3>
            <span><img class="rounded-circle"
                       src="@if($post['post']->blogger->image != 'user.jpg') {{asset('upload/blogger/avatar')}}/{{$post['post']->blogger->image}} @else {{asset('backend/assets/images/blog/card/01.jpg')}} @endif"
                       width="20px" height="20px">{{$post['post']->blogger->name}}</span>
            <span class="ms-4">{{$post['post']->created_at->format('M d, Y')}}</span>
            <span class="ms-4"><i class="fa fa-clock me-2"></i>{{$post['post']->created_at->diffForHumans()}}</span>
        </div>
    </div>
</section>
<!-- page header area ends  -->

<!-- Blog video banner start -->
<section class="blog-video-banner">
    <div class="container-fluid">
        <video width="100%" height="240" controlsList="nodownload" controls>
            <source src="{{asset('upload/blogger_video_post')}}/{{$post['post']->blogger->id}}/{{$post['post']->video}}"
                    type="video/mp4">
            {{--            <source src="movie.ogg" type="video/ogg">--}}
            Your browser does not support the video
        </video>
    </div>
</section>
<!-- Blog video banner ends  -->

<!-- common blog area start -->
<section class="blog-area pt-5">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-12">
                    <div class="blog-description my-5">
                        <div class="des-text my-5">
                            <h4 class="text-center" id="intro-heading">{{$post['post']->intro_header}}</h4>
                            <p id="intro-description">{{$post['post']->intro_description}}</p>
                        </div>
                        <div class="des-tips">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <img class="rounded"
                                         src="{{asset('upload/blogger_image_post')}}/{{$post['post']->image1}}"
                                         id="article-one-image" alt="">
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 offset-lg-1 offset-md-1">
                                    <div class="list my-3">
                                        <div class="list-1">
                                            <span class="list-span-1" style="position: relative">
                                                <span class="list-span-2"
                                                      style="position: absolute;left: -70px;bottom: -45px">
                                                    <h3 style="background-color: beige;padding:0 15px;border-radius: 50%">1</h3>
                                                </span>
                                                <h5 id="headline1">{{$post['post']->headline1}}</h5>
                                                <p id="description1">{{$post['post']->description1}}</p>
                                            </span>
                                        </div>
                                        <div class="list-2 mt-4">
                                            <span class="list-span-1" style="position: relative">
                                                <span class="list-span-2"
                                                      style="position: absolute;left: -70px;bottom: -45px">
                                                    <h3 style="background-color: beige;padding:0 15px;border-radius: 50%">2</h3>
                                                </span>
                                                <h5 id="headline2">{{$post['post']->headline2}}</h5>
                                                <p id="description2">{{$post['post']->description2}}</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12 col-12">
                    <div class="blog-description my-5">
                        <div class="des-tips">
                            <div class="row flex-column-reverse flex-lg-row">
                                <div class="col-lg-5 col-md-5 col-sm-12 offset-lg-1 offset-md-1">
                                    <div class="list my-3">
                                        <div class="list-1">
                                            <span class="list-span-1" style="position: relative">
                                                <span class="list-span-2"
                                                      style="position: absolute;left: -70px;bottom: -45px">
                                                    <h3 style="background-color: beige;padding:0 15px;border-radius: 50%">3</h3>
                                                </span>
                                                <h5 id="headline3">{{$post['post']->headline3}}</h5>
                                                <p id="description3">{{$post['post']->description3}}</p>
                                            </span>
                                        </div>
                                        <div class="list-2 mt-4">
                                            <span class="list-span-1" style="position: relative">
                                                <span class="list-span-2"
                                                      style="position: absolute;left: -70px;bottom: -45px">
                                                    <h3 style="background-color: beige;padding:0 15px;border-radius: 50%">4</h3>
                                                </span>
                                                <h5 id="headline4">{{$post['post']->headline4}}</h5>
                                                <p id="description4">{{$post['post']->description4}}</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <img class="rounded"
                                         src="{{asset('upload/blogger_image_post')}}/{{$post['post']->image2}}"
                                         id="article-two-image" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12 col-12">
                    <div class="blog-description my-5">
                        <div class="des-tips">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <img class="rounded"
                                         src="{{asset('upload/blogger_image_post')}}/{{$post['post']->image3}}"
                                         id="article-three-image" alt="">
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 offset-lg-1 offset-md-1">
                                    <div class="list my-3">
                                        <div class="list-1">
                                            <span class="list-span-1" style="position: relative">
                                                <span class="list-span-2"
                                                      style="position: absolute;left: -70px;bottom: -45px">
                                                    <h3 style="background-color: beige;padding:0 15px;border-radius: 50%">5</h3>
                                                </span>
                                                <h5 id="headline5">{{$post['post']->headline5}}</h5>
                                                <p id="description5">{{$post['post']->description5}}</p>
                                            </span>
                                        </div>
                                        <div class="list-2 mt-4">
                                            <span class="list-span-1" style="position: relative">
                                                <span class="list-span-2"
                                                      style="position: absolute;left: -70px;bottom: -45px">
                                                    <h3 style="background-color: beige;padding:0 15px;border-radius: 50%">6</h3>
                                                </span>
                                                <h5 id="headline6">{{$post['post']->headline6}}</h5>
                                                <p id="description6">{{$post['post']->description6}}</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- common blog area ends  -->


<section id="last-images">
    <div class="container">
        <div class="des-thumb">
            <div class="row">
                <div class="image-box col-lg-6 col-md-6 col-sm-6">
                    <img class="rounded" src="{{asset('upload/blogger_image_post')}}/{{$post['post']->image4}}"
                         id="imageOutro1" alt="">
                </div>
                <div class="image-box col-lg-6 col-md-6 col-sm-6">
                    <img class="rounded" src="{{asset('upload/blogger_image_post')}}/{{$post['post']->image5}}"
                         id="imageOutro2" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="color-palettes" style="margin: 100px 0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 text-center">
                @if(isset($post['post']->color1))
                    <div class="color-box mx-3 d-inline-block">
                        <div class="box rounded"
                             style="background-color: {{$post['post']->color1}};@if(strtolower($post['post']->color1) == '#fff' OR strtolower($post['post']->color1) == '#ffffff') border:1px solid lightgrey @endif"></div>
                        <p class="text-center mt-1">{{substr($post['post']->color1,1,7)}}</p>
                    </div>
                @endif
                @if(isset($post['post']->color2))
                    <div class="color-box mx-3 d-inline-block">
                        <div class="box rounded"
                             style="background-color: {{$post['post']->color2}};@if(strtolower($post['post']->color2) == '#fff' OR strtolower($post['post']->color2) == '#ffffff') border:1px solid lightgrey @endif"></div>
                        <p class="text-center mt-1">{{substr($post['post']->color2,1,7)}}</p>
                    </div>
                @endif
                @if(isset($post['post']->color3))
                    <div class="color-box mx-3 d-inline-block">
                        <div class="box rounded"
                             style="background-color: {{$post['post']->color3}};@if(strtolower($post['post']->color3) == '#fff' OR strtolower($post['post']->color3) == '#ffffff') border:1px solid lightgrey @endif"></div>
                        <p class="text-center mt-1">{{substr($post['post']->color3,1,7)}}</p>
                    </div>
                @endif
                @if(isset($post['post']->color4))
                    <div class="color-box mx-3 d-inline-block">
                        <div class="box rounded"
                             style="background-color: {{$post['post']->color4}};@if(strtolower($post['post']->color4) == '#fff' OR strtolower($post['post']->color4) == '#ffffff') border:1px solid lightgrey @endif"></div>
                        <p class="text-center mt-1">{{substr($post['post']->color4,1,7)}}</p>
                    </div>
                @endif
                @if(isset($post['post']->color5))
                    <div class="color-box mx-3 d-inline-block">
                        <div class="box rounded"
                             style="background-color: {{$post['post']->color5}};@if(strtolower($post['post']->color5) == '#fff' OR strtolower($post['post']->color5) == '#ffffff') border:1px solid lightgrey @endif"></div>
                        <p class="text-center mt-1">{{substr($post['post']->color5,1,7)}}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section id="bottom-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="des-text">
                    <h4 class="text-center" id="outro-heading">{{$post['post']->outro_header}}</h4>
                    <p id="outro-description">{{$post['post']->outro_description}}</p>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-lg-12 col-12">
                <div class="blog-post-slider overflow-hidden">
                    <div class="swiper-wrapper">
                        @forelse($post['products'] as $product)
                            <div class="swiper-slide">
                                <div class="blog-item style-one">
                                    <div class="item-thumb" style="height: 200px">
                                        <img src="{{asset('upload/blogger_product')}}/{{$product->image}}" alt=""
                                             style="height: 200px">
                                    </div>
                                    <div class="blog-text">
                                        <h4 class="mt-2">{{$product->product_name}}</h4>
                                        <p style="text-align: justify">{{substr($product->product_details,0,140)}}..</p>
                                        <a href="{{$product->link}}" target="_blank" class="text-dark fw-bold mt-2"
                                           style="font-size: 15px">Link to Website
                                            ></a>
                                    </div>
                                </div>
                            </div>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
