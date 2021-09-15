<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.all_styles')

    {{--    CSRF Token--}}
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>Thornior</title>
</head>
<body>
<style>
    .post-left-nav-button a:hover, .post-right-nav-button a:hover {
        background-color: #E2DED1;
    }

    .post-image {
        position: relative;
    }

    .post-image i {
        font-size: 25px;
        background: #000;
        color: #fff;
        padding: 15px;
        border-radius: 50%;
    }

    .post-image .image-label label {
        position: absolute;
        right: 5%;
        bottom: -10%;
    }


    /* add products */
    #add_products_section{
        margin-top: 10px;
    }
    #add_products_section .product{
        margin-top: 20px;
        border: 1px solid #5c636a;
        border-radius: 5px;
        overflow: hidden;
        position: relative;
    }
    #add_products_section .product img {
        width: 50px;
        height: 50px;
        float: left;
    }

    #add_products_section .product .product_texts {
        margin-left: 10px;
        margin-top: 3px;
        margin-bottom: 3px;
    }

    #add_products_section .product .product_texts h5 {
        margin: 0;
        font-size: 12px;
    }
    #add_products_section .product .product_texts p {
        margin: 0;
        font-size: 12px;
    }

    #add_products_section .product .product_texts a {
        font-size: 12px;
    }
    #add_products_section .product .cross{
        display: inline-block;
        float: right;
    }
    #add_products_section .product .cross i{
        font-size: 30px;
        color: #fff;
        background-color: #5c636a;
        padding: 10px;
        position: absolute;
        right: 0;
        bottom: 0;
    }
    #add_products_section .product .cross i:hover{
        background-color: #000;
    }

    .blog-item .item-thumb img{
        width: 200px !important;
    }
</style>

<div class="main-content">
    <!-- content-right start -->
    <div class="content-right" id="contentWidth" style="margin-left: 0">

        <!-- top navbar start -->
    @include('layouts.logged_in_navbar')
    <!-- top navbar ends  -->

        <!-- post top navbar start -->
        <form action="{{route('blogger.blog.post.video.store.1')}}" method="POST"
              enctype="multipart/form-data" id="videoForm">
            @csrf
            <div class="top-navbar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="post-left-nav-button d-inline-block float-start" style="margin-left: 20px">
                                <a class="btn p-3" href="#" style="background-color: #fff">Save in Library</a>
                            </div>
                            <div class="post-right-nav-button d-inline-block float-end" style="margin-right: 20px">
                                <button type="submit" value="0" name="post_status" class="btn p-3" style="background-color: #fff">Preview</button>
                                <button type="submit" value="1" name="post_status" class="btn p-3" style="margin-left: 10px;background-color: #fff">
                                    Publish
                                </button>
                            </div>
                        </div>
                        <div class="form-group" id="progressDiv" style="display: none">
                            <div class="progress" style="height: 10px">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>
                            <p class="progress-text text-center"><strong>Don't reload or close this window while uploading</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- post top navbar ends  -->

            <!-- Edit area start -->
            <div class="edit-area">
                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <div class="row">
                                <div class="col-12">
                                    @include('layouts.templates.video.v1')
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="card">
                                <div class="card-header bg-white">Video</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Select video from here</label>
                                        <input class="form-control" name="video" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header bg-white">Thumbnail Image</div>
                                <div class="card-body">
                                    <div class="post-image">
                                        <p><input type="file" accept="image/*" name="thumbnail_image" id="cover-image-input"
                                                  onchange="featuredImage(event)" style="display: none;"></p>
                                        <p id="cover-image-label" class="text-center image-label"><label for="cover-image-input"
                                                                                                   style="cursor: pointer;"><i
                                                    class="fas fa-camera"></i></label></p>
                                        <p id="image-box" class="text-center"><img
                                                src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                id="cover-image-file"
                                                width="100%"/>
                                        </p>
                                        <p id="remove-cover-image" class="text-center" style="display: none;cursor: pointer"
                                           onclick="removeFeaturedImage(event)">Remove featured image</p>
                                    </div>

                                    <div class="post-title mt-5">
                                        <label for="title"><strong>Title*</strong></label>
                                        <input class="form-control" type="text" name="title" id="title"
                                               placeholder="Add Title"
                                               value="{{ old('title') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header bg-white">Categories</div>
                                <div class="card-body">
                                    <div class="post-categories">
                                        @foreach($categories as $key => $category)
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                       id="categories-checkbox{{$key}}"
                                                       value="{{$category->id}}" name="category[]"
                                                       @if(is_array(old('category')) && in_array($category->id, old('category'))) checked @endif>
                                                <label class="form-check-label text-capitalize"
                                                       for="categories-checkbox{{$key}}">{{$category->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="headline-1">
                                        <label for="first-headline"><strong>Intro Heading*</strong></label>
                                        <input class="form-control" type="text" name="first_headline"
                                               id="first-headline"
                                               placeholder="Add Intro Heading" value="{{old('first_headline')}}">
                                    </div>
                                    <div class="first-description-box mt-2">
                                                <textarea class="form-control" name="first_description"
                                                          id="first-description" rows="4"
                                                          placeholder="Describe in details">{{old('first_description')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header bg-white">Main Article</div>
                                <div class="card-body">
                                    <div class="long-image">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="main_article_image" id="filem"
                                                      onchange="mainImage(event)" style="display: none;"></p>
                                            <p id="image-labelm" class="text-center image-label"><label for="filem"
                                                                                                        style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="image-boxm" class="text-center"><img
                                                    src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                    id="outputm"
                                                    width="100%"/>
                                            </p>
                                            <p id="remove-imagem" class="text-center"
                                               style="display: none;cursor: pointer"
                                               onclick="removeMainImage(event)">Remove featured image</p>
                                        </div>
                                    </div>
                                    <div class="head-1 mt-4">
                                        <label for="headline_1"><strong>Headline 1*</strong></label>
                                        <input class="form-control" type="text" name="headline_1"
                                               id="headline_1"
                                               placeholder="Add Headline 1" value="{{old('first_headline')}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_1"
                                                          id="description_1"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{old('first_headline')}}</textarea>
                                    </div>

                                    <div class="head-2 mt-3">
                                        <label for="headline_2"><strong>Headline 2*</strong></label>
                                        <input class="form-control" type="text" name="headline_2"
                                               id="headline_2"
                                               placeholder="Add Headline 2" value="{{old('first_headline')}}">
                                    </div>
                                    <div class="des-2 mt-2">
                                                <textarea class="form-control" name="description_2"
                                                          id="description_2"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{old('first_headline')}}</textarea>
                                    </div>

                                    <div class="head-3 mt-3">
                                        <label for="headline_3"><strong>Headline 3*</strong></label>
                                        <input class="form-control" type="text" name="headline_3"
                                               id="headline_3"
                                               placeholder="Add Headline 3" value="{{old('first_headline')}}">
                                    </div>
                                    <div class="des-3 mt-2">
                                                <textarea class="form-control" name="description_3"
                                                          id="description_3"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{old('first_headline')}}</textarea>
                                    </div>

                                    <div class="head-4 mt-2">
                                        <label for="headline_4"><strong>Headline 4*</strong></label>
                                        <input class="form-control" type="text" name="headline_4"
                                               id="headline_4"
                                               placeholder="Add Headline 4" value="{{old('first_headline')}}">
                                    </div>
                                    <div class="des-4 mt-2">
                                                <textarea class="form-control" name="description_4"
                                                          id="description_4"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{old('first_headline')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="headline-2 mt-3">
                                        <label for="last_headline"><strong>Outro Heading*</strong></label>
                                        <input type="text" class="form-control" id="last_headline"
                                               name="last_headline" placeholder="Add Outro Heading"
                                               value="{{old('last_headline')}}">
                                    </div>
                                    <div class="last-description-box mt-2">
                                            <textarea class="form-control" id="last-description" name="last_description"
                                                      placeholder="Describe in details"
                                                      rows="4">{{old('last_description')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="post-image">
                                        <p><input type="file" accept="image/*" name="image1" id="file1"
                                                  onchange="loadImage1(event)" style="display: none;"></p>
                                        <p class="text-center image-label" id="image-label1"><label for="file1"
                                                                                                    style="cursor: pointer;"><i
                                                    class="fas fa-camera"></i></label></p>
                                        <p id="image-box1" class="text-center"><img
                                                src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                id="output1" width="100%"/>
                                        </p>
                                        <p id="remove-image1" onclick="removeImage1(event)"
                                           style="display: none; cursor: pointer;text-align: center">Remove
                                            first image</p>
                                    </div>
                                    <div class="post-image mt-5">
                                        <p><input type="file" accept="image/*" name="image2" id="file2"
                                                  onchange="loadImage2(event)" style="display: none;"></p>
                                        <p class="text-center image-label" id="image-label2"><label for="file2"
                                                                                                    style="cursor: pointer;"><i
                                                    class="fas fa-camera"></i></label></p>
                                        <p id="image-box2" class="text-center"><img
                                                src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                id="output2" width="100%"/>
                                        </p>
                                        <p id="remove-image2" onclick="removeImage2(event)"
                                           style="display: none; cursor: pointer;text-align: center">Remove
                                            second image</p>
                                    </div>
                                    <div class="post-image mt-5">
                                        <p><input type="file" accept="image/*" name="image3" id="file3"
                                                  onchange="loadImage3(event)" style="display: none;"></p>
                                        <p class="text-center image-label" id="image-label3"><label for="file3"
                                                                                                    style="cursor: pointer;"><i
                                                    class="fas fa-camera"></i></label></p>
                                        <p id="image-box3" class="text-center"><img
                                                src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                id="output3" width="100%"/>
                                        </p>
                                        <p id="remove-image3" onclick="removeImage3(event)"
                                           style="display: none;cursor: pointer;text-align: center">Remove third
                                            image</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header bg-white">Used Colors <span
                                        style="font-size: 10px">Optional</span></div>
                                <div class="card-body">
                                    <div>
                                        <input class="form-control form-control-sm" type="text" id="color_code1"
                                               name="color_code1" placeholder="#FFF000">
                                        <input class="form-control form-control-sm mt-3" type="text" id="color_code2"
                                               name="color_code2" placeholder="#FFF000">
                                        <input class="form-control form-control-sm mt-3" type="text" id="color_code3"
                                               name="color_code3" placeholder="#FFF000">
                                        <input class="form-control form-control-sm mt-3" type="text" id="color_code4"
                                               name="color_code4" placeholder="#FFF000">
                                        <input class="form-control form-control-sm mt-3" type="text" id="color_code5"
                                               name="color_code5" placeholder="#FFF000">
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header bg-white">Add Product</div>
                                <div class="card-body">
                                    <a class="btn btn-dark bg-dark text-white text-center d-block dropdown-item my-2" href="#"
                                       data-bs-toggle="modal"
                                       data-bs-target="#addNewProduct">Add New Product</a>

                                    <div class="" id="add_products_section">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Add New Product Dropdown -->
        <div class="modal fade" id="addNewProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">New Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" id="bloggerProductForm" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <input type="hidden" value="{{Auth::user()->id}}" name="id">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   placeholder="write product name..">
                            <br>
                            <label for="details">Product Details</label>
                            <textarea type="text" name="details" id="details" class="form-control"
                                      placeholder="write in details.." rows="4"></textarea>
                            <br>
                            <label for="link">Product Link</label>
                            <input type="url" name="link" id="link" class="form-control" placeholder="enter a link..">
                            <br>
                            <div class="post-image mb-5">
                                <p><input type="file" accept="image/*" name="image" id="filep"
                                          onchange="productImage(event)" style="display: none;"></p>
                                <p class="text-center image-label" id="image-labelp"><label for="filep"
                                                                                            style="cursor: pointer;"><i
                                            class="fas fa-camera"></i></label></p>
                                <p id="image-boxp"><img src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                        id="outputp" width="100%" height="auto"/></p>
                                <p id="remove-imagep" class="text-center" onclick="removeProductImage(event)"
                                   style="display: none;cursor: pointer">Remove image</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="modal_close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit area ends  -->

        <!-- footer area start -->
        <footer>
            <div class="footer-content">
                <p>&copy; 2021 | Thornior | All right reserved</p>
                <p>V 1.8</p>
            </div>
        </footer>
        <!-- footer area ends  -->

    </div>
    <!-- content-right start -->

</div>


<!-- optional js -->
@include('layouts.all_scripts')
<script>
    //***** Fixed Part Start *****
    @include('layouts.post_visual_js_works')
    //***** Fixed part end *****

    //***** relative part start *****
    // Main article image
    var mainImage = function (event) {
        // featured image
        var imagem = document.getElementById('outputm');
        imagem.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('image-labelm').style.display = 'none';
        document.getElementById('remove-imagem').style.display = 'block';

        var imageShowm = document.getElementById('long-image');
        imageShowm.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeMainImage = function (event) {
        var imageInputm = document.getElementById('filem');
        imageInputm.value = "";
        var imagem = document.getElementById('outputm');
        imagem.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        var imageShowm = document.getElementById('long-image');
        imageShowm.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        document.getElementById('image-labelm').style.display = 'block';
        document.getElementById('remove-imagem').style.display = 'none';
    }

    // Last 3 images
    // 1st image
    var loadImage1 = function (event) {
        // document.getElementById('image-box1').style.display = 'block';
        var image1 = document.getElementById('output1');
        image1.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('image-label1').style.display = 'none';
        document.getElementById('remove-image1').style.display = 'block';

        var loadimage1 = document.getElementById('loadimage-1');
        loadimage1.src = URL.createObjectURL(event.target.files[0]);
    };
    // remove image1
    var removeImage1 = function (event) {
        var imageInput1 = document.getElementById('file1');
        imageInput1.value = "";
        var image1 = document.getElementById('output1');
        image1.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        var loadimage1 = document.getElementById('loadimage-1');
        loadimage1.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        document.getElementById('image-label1').style.display = 'block';
        document.getElementById('remove-image1').style.display = 'none';
    }

    // 2nd images
    var loadImage2 = function (event) {
        // document.getElementById('image-box2').style.display = 'block';
        var image2 = document.getElementById('output2');
        image2.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('image-label2').style.display = 'none';
        document.getElementById('remove-image2').style.display = 'block';

        var loadimage2= document.getElementById('loadimage-2');
        loadimage2.src = URL.createObjectURL(event.target.files[0]);
    };
    // remove image2
    var removeImage2 = function (event) {
        var imageInput2 = document.getElementById('file2');
        imageInput2.value = "";
        var image2 = document.getElementById('output2');
        image2.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        var loadimage2 = document.getElementById('loadimage-2');
        loadimage2.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        // document.getElementById('image-box2').style.display = 'none';
        document.getElementById('image-label2').style.display = 'block';
        document.getElementById('remove-image2').style.display = 'none';
    }

    // 3rd images
    var loadImage3 = function (event) {
        // document.getElementById('image-box3').style.display = 'block';
        var image3 = document.getElementById('output3');
        image3.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('image-label3').style.display = 'none';
        document.getElementById('remove-image3').style.display = 'block';

        var loadimage3 = document.getElementById('loadimage-3');
        loadimage3.src = URL.createObjectURL(event.target.files[0]);
    };
    // remove image3
    var removeImage3 = function (event) {
        var imageInput3 = document.getElementById('file3');
        imageInput3.value = "";
        var image3 = document.getElementById('output3');
        image3.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        var loadimage3 = document.getElementById('loadimage-3');
        loadimage3.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        document.getElementById('image-label3').style.display = 'block';
        document.getElementById('remove-image3').style.display = 'none';
    }

    // headline 1
    $('#headline_1').keyup(function () {
        $('#headline1').text($('#headline_1').val());
    });

    // headline 2
    $('#headline_2').keyup(function () {
        $('#headline2').text($('#headline_2').val());
    });

    // headline 3
    $('#headline_3').keyup(function () {
        $('#headline3').text($('#headline_3').val());
    });

    // headline 4
    $('#headline_4').keyup(function () {
        $('#headline4').text($('#headline_4').val());
    });

    // description 1
    $('#description_1').keyup(function () {
        $('#description1').text($('#description_1').val());
    });

    // description 2
    $('#description_2').keyup(function () {
        $('#description2').text($('#description_2').val());
    });

    // description 3
    $('#description_3').keyup(function () {
        $('#description3').text($('#description_3').val());
    });

    // description 4
    $('#description_4').keyup(function () {
        $('#description4').text($('#description_4').val());
    });
    //***** relative part end *****
</script>

@include('layouts.addProductScript')

<script>
    $(function () {
        $(document).ready(function () {
            $('#videoForm').ajaxForm({
                beforeSend: function () {
                    var percentage = '0';
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    var percentage = percentComplete;
                    $('#progressDiv').css('display','block');
                    $('.progress .progress-bar').css("width", percentage+'%', function() {
                        return $(this).attr("aria-valuenow", percentage) + "%";
                    })
                },
                complete: function (data) {
                    if (data.responseJSON.error != null)
                    {
                        errorsHtml = '<div><ul>';
                        $.each( data.responseJSON.error, function( key, value ) {
                            errorsHtml += '<li>'+ value + '</li>';
                        });
                        errorsHtml += '</ul></div>';
                        toastr.error(errorsHtml);

                        $('.progress .progress-bar').css('width','0%');
                    }
                    else
                    {
                        if (data.responseJSON.slug != null)
                        {
                            var slug = data.responseJSON.slug;
                            var url = '{{ route("blogger.blog.post.video.show.1", ":slug") }}';
                            url = url.replace(':slug', slug);

                            window.location.replace(url);
                        }
                        // console.log(data.responseJSON.slug);
                        toastr.success(data.responseJSON.success);
                        $('.progress-text').text('Saving. Please Wait.');
                        setTimeout(
                            function()
                            {
                                location.reload();
                            }, 3000);
                    }
                }
            });
        });
    });
</script>

<script>
    @if(Session::has('success'))
    var type = "{{Session::get('alert-type','success')}}"
    toastr.success("{{ Session::get('success') }}");
    @endif
</script>
<script>
    @if(Session::has('error'))
    var type = "{{Session::get('alert-type','error')}}"
    toastr.success("{{ Session::get('error') }}");
    @endif
</script>
</body>
</html>
