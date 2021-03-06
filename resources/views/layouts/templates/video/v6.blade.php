<style>
    @media screen and (min-width: 1200px) {
        .container {
            width: 960px !important;
        }
    }

    h3 {
        font-size: 25px;
    }

    .blog-video-banner .image-thumb{
        height: 700px;
    }
    .blog-video-banner .image-thumb img {
        width: 100%;
        height: inherit !important;
    }
    .blog-video-banner .image-thumb:hover img {
        transform: scale(1.1);
    }

    .page-header{
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .blog-area{
        margin-top: 50px !important;
    }

    #main-post-content h4 span {
        font-size: 25px;
    }
    #main-post-content .v5-post-title{
        position: relative;
        margin: auto;
    }
    #main-post-content .v5-post-title h3{
        font-size: 25px;
        position: relative;
        display: inline;
    }
    #main-post-content .v5-post-title p{
        display: inline;
    }
    #main-post-content .v5-post-title h3::after{
        content: '';
        width: 17px;
        height: 17px;
        background: lightgrey;
        position: absolute;
        left: -1px;
        bottom: 3px;
        z-index: -9;
        border-radius: 50%;
    }
    #main-post-content .container > .row:nth-child(2), #main-post-content .container > .row:nth-child(3){
        margin-top: 100px;
    }

    .blog-area {
        margin-top: 150px;
        margin-bottom: 50px;
    }

    #bottom-part.ads .container{
        padding: 0;
        padding-top: 300px;
        background-image: url("../assets/images/banner/profile/01.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    #bottom-part.ads .container .ads-part{
        background-color: white;
        padding: 30px;
        border-top-left-radius: 5px;
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
        font-size: 20px;
        margin-left: 90px;
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
        margin-top: 300px;
    }

    @media screen and (max-width: 576px) {
        .blog-video-banner .image-thumb{
            box-sizing: border-box;
            overflow: hidden;
            height: 20vh;
            border-radius: 5px;
        }
        .blog-video-banner .image-thumb img {
            width: 100%;
            height: auto;
        }
        .blog-video-banner .image-thumb:hover img {
            transform: scale(1.1);
        }

        /*#top-section .video-thumb img {*/
        /*    width: 100%;*/
        /*    height: auto;*/
        /*}*/
        .page-header{
            padding-top: 20px;
            padding-bottom: 80px;
        }

        .page-header h3 {
            font-size: 20px;
        }

        #main-post-content h3, h4, p {
            text-align: center;
        }
        #main-post-content .v5-post-title{
            width: 50%;
        }
        #main-post-content .col-space{
            margin-top: 50px;
        }
        #main-post-content .col-inner-space{
            margin-top: 15px;
        }
        #main-post-content .container > .row:nth-child(2), #main-post-content .container > .row:nth-child(3){
            margin-top: 50px;
        }

        #last-three-image .col {
            width: 33.33%;
            padding: 0;
        }

        #last-three-image .col img {
            border-radius: 0 !important;
        }

        #bottom-part.ads .container{
            padding-top: 30px;
            padding-bottom: 30px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        #bottom-part.ads .container .ads-part{
            border-radius: 5px;
        }
        #bottom-part.ads h3{
            text-align: center;
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

        #comment-box .comments .comment-text p {
            text-align: left;
        }

        #comment-box .comment-field {
            margin-top: 300px;
        }

        #comment-box .comment-field h4 {
            text-align: left;
        }
    }
    @media screen and (max-width: 459px) {
        #main-post-content .v5-post-title{
            width: 90%;
        }
    }
</style>

<!-- page header area start -->
<section class="page-header" style="padding-top: 50px">
    <div class="container">
        <div class="header-content">
            <div class="blog-cat" style="padding: 12px 0 10px">
                <span style="padding: 3px 10px;background-color: black;color: white;border-radius: 5px">Diy</span>
            </div>
            <h3 id="post-title">@if(isset($post['post'])) {{$post['post']->title}} @else Create New inspiration to your
                leaving room, here are a few basic tips @endif</h3>
            <span><img class="rounded-circle" src="{{asset('backend/assets/images/blog/card/01.jpg')}}" width="20px"
                       height="20px">{{Auth::user()->name}}</span>
            <span class="ms-4">@if(isset($post['post'])) {{$post['post']->created_at->format('d M Y')}} @else June 8,
                2021 @endif</span>
            <span class="ms-4"><i
                    class="fa fa-clock me-2"></i>@if(isset($post['post'])) {{$post['post']->created_at->diffForHumans()}} @else
                    11 Min @endif</span>
        </div>
    </div>
</section>
<!-- page header area ends  -->

<!-- Blog video banner start -->
<section class="blog-video-banner">
    <div class="container-fluid p-0">
        @if(isset($post['post'])))
        <video width="100%" height="240" controlsList="nodownload" controls>
            <source src="{{asset('upload/blogger_video_post')}}/{{$post['post']->blogger->id}}/{{$post['post']->video}}"
                    type="video/mp4">
            {{--            <source src="movie.ogg" type="video/ogg">--}}
            Your browser does not support the video
        </video>
        @else
            <div class="video-position">
                <div class="overlay"></div>
                <div class="video-thumb image-thumb">
                    <img
                        src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                        alt="" id="coverImage">
                </div>
            </div>
        @endif
    </div>
</section>
<!-- Blog video banner ends  -->

<!-- common blog area start -->
<section class="blog-area">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="blog-description my-2">
                        <div class="des-text">
                            <h4 id="intro-heading">@if(isset($post['post'])) {{$post['post']->intro_headline}} @else
                                    Intro Headline @endif</h4>
                            <p class="lh-lg" id="intro-description">@if(isset($post['post'])) {{$post['post']->intro_description}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                                consequuntur, nobis
                                suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                                vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                                Eos voluptatum cupidi @endif</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="blog-description my-2">
                        <div class="des-text">
                            <h4></h4>
                            <p class="lh-lg">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                                consequuntur, nobis
                                suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                                vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                                Eos voluptatum cupidi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- common blog area ends  -->

<!-- Blog main area start -->
<section id="main-post-content">
    <div class="container">
        <div class="row gx-0">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="">1</h3>
                            <p class="" style="margin-left: 15px;font-size: 18px" id="headline1">
                                <strong>@if(isset($post['post'])) {{$post['post']->headline1}} @else Ask your question here? @endif</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                            consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                            vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                            Eos voluptatum</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->image1}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="headline-one-image" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 offset-lg-2 offset-lg-2 col-sm-12 col-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="">2</h3>
                            <p class="" style="margin-left: 15px;font-size: 18px" id="headline2">
                                <strong>@if(isset($post['post'])) {{$post['post']->headline2}} @else Ask your question here? @endif</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                            consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                            vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                            Eos voluptatum</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->image2}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="headline-two-image" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row gx-0">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="">3</h3>
                            <p class="" style="margin-left: 15px;font-size: 18px" id="headline3">
                                <strong>@if(isset($post['post'])) {{$post['post']->headline3}} @else Ask your question here? @endif</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                            consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                            vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                            Eos voluptatum</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->image3}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="headline-three-image" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 offset-lg-2 offset-lg-2 col-sm-12 col-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="">4</h3>
                            <p class="" style="margin-left: 15px;font-size: 18px" id="headline4">
                                <strong>@if(isset($post['post'])) {{$post['post']->headline4}} @else Ask your question here? @endif</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                            consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                            vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                            Eos voluptatum</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->image4}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="headline-four-image" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row gx-0">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="">5</h3>
                            <p class="" style="margin-left: 15px;font-size: 18px" id="headline5">
                                <strong>@if(isset($post['post'])) {{$post['post']->headline5}} @else Ask your question here? @endif</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                            consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                            vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                            Eos voluptatum</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->image5}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="headline-five-image" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 offset-lg-2 offset-lg-2 col-sm-12 col-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="">6</h3>
                            <p class="" style="margin-left: 15px;font-size: 18px" id="headline6">
                                <strong>@if(isset($post['post'])) {{$post['post']->headline6}} @else Ask your question here? @endif</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                            consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                            vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                            Eos voluptatum</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->image6}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="headline-six-image" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="color-palettes" style="margin: 100px 0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 text-center">
                @if(isset($post['colors']))
                    @foreach($post['colors'] as $color)
                        <div class="color-box color-box1 mx-3 d-inline-block">
                            <div class="box rounded"
                                 style="background-color: {{$color}} @if(strtolower($color) == '#fff' OR strtolower($color) == '#ffffff') ;border: 1px solid lightgrey @endif"></div>
                            <p class="text-center mt-1">{{$color}}</p>
                        </div>
                    @endforeach
                @else
                    <div class="color-box color-box1 mx-3 d-inline-block">
                        <div class="box rounded" style="background-color: red"></div>
                        <p class="text-center mt-1">Add Color</p>
                    </div>
                    <div class="color-box color-box2 mx-3 d-inline-block">
                        <div class="box rounded" style="background-color: blue"></div>
                        <p class="text-center mt-1">Add Color</p>
                    </div>
                    <div class="color-box color-box3 mx-3 d-inline-block">
                        <div class="box rounded" style="background-color: greenyellow"></div>
                        <p class="text-center mt-1">Add Color</p>
                    </div>
                    <div class="color-box color-box4 mx-3 d-inline-block">
                        <div class="box rounded" style="background-color: orangered"></div>
                        <p class="text-center mt-1">Add Color</p>
                    </div>
                    <div class="color-box color-box5 mx-3 d-inline-block">
                        <div class="box rounded" style="background-color: rebeccapurple"></div>
                        <p class="text-center mt-1">Add Color</p>
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
                    <h4 class="text-center" id="outro-heading">@if(isset($post['post'])) {{$post['post']->outro_header}} @else
                            Outro Headlines @endif</h4>
                    <p id="outro-description">@if(isset($post['post'])) {{$post['post']->outro_description}} @else Lorem
                        ipsum dolor, sit amet consectetur adipisicing
                        elit. Illum consequuntur, nobis suscipit at,
                        dicta dolor minima eligendi recusandae magnam,
                        ullam voluptatem dignissimos vero deleniti
                        tempore voluptate expedita architecto
                        nesciunt amet debitis optio eveniet?
                        Eos voluptatum cupidi @endif</p>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-lg-12 col-12">
                <div class="blog-post-slider overflow-hidden">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset('backend/assets/images/blog/placeholder.jpg')}}" alt="">
                                </div>
                                <div class="blog-text">
                                    <h4 class="mt-2">Product Name</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, accusantium?</p>
                                    <a href="#0" class="text-dark fw-bold mt-2" style="font-size: 15px">Link to Website
                                        ></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset('backend/assets/images/blog/placeholder.jpg')}}" alt="">
                                </div>
                                <div class="blog-text">
                                    <h4 class="mt-2">Product Name</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, accusantium?</p>
                                    <a href="#0" class="text-dark fw-bold mt-2" style="font-size: 15px">Link to Website
                                        ></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset('backend/assets/images/blog/placeholder.jpg')}}" alt="">
                                </div>
                                <div class="blog-text">
                                    <h4 class="mt-2">Product Name</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, accusantium?</p>
                                    <a href="#0" class="text-dark fw-bold mt-2" style="font-size: 15px">Link to Website
                                        ></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset('backend/assets/images/blog/placeholder.jpg')}}" alt="">
                                </div>
                                <div class="blog-text">
                                    <h4 class="mt-2">Product Name</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, accusantium?</p>
                                    <a href="#0" class="text-dark fw-bold mt-2" style="font-size: 15px">Link to Website
                                        ></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset('backend/assets/images/blog/placeholder.jpg')}}" alt="">
                                </div>
                                <div class="blog-text">
                                    <h4 class="mt-2">Product Name</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, accusantium?</p>
                                    <a href="#0" class="text-dark fw-bold mt-2" style="font-size: 15px">Link to Website
                                        ></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset('backend/assets/images/blog/placeholder.jpg')}}" alt="">
                                </div>
                                <div class="blog-text">
                                    <h4 class="mt-2">Product Name</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, accusantium?</p>
                                    <a href="#0" class="text-dark fw-bold mt-2" style="font-size: 15px">Link to Website
                                        ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog main area ends -->

