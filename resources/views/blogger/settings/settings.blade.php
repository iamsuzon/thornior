@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Blogger Settings') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <br>
                        <br>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#home">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#menu1">Notice</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#menu2">Settings</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="m-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(session('message'))
                                    <div class="alert alert-success">{{session('message')}}</div>
                                @endif
                                <h3>Profile</h3>
                                <form action="{{route('blogger.settings.profile.submit')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input class="form-control" type="text" name="name" id="name"
                                               placeholder="Natasha Malkova" value="{{$bloggerData['blogger']->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" name="email" id="email"
                                               placeholder="natasha1@gmail.com"
                                               value="{{$bloggerData['blogger']->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="region">Land/Region</label>
                                        @include('layouts.countries')
                                    </div>
                                    <div class="form-group">
                                        <label for="about">About Me</label>
                                        <textarea class="form-control" name="about" id="about" cols="30" rows="5"
                                                  placeholder="Beskriving">{{$bloggerData['blogger']->about}}</textarea>
                                    </div>

                                    <button class="btn btn-success float-right" type="submit">Update</button>
                                </form>
                            </div>
                            <div id="menu1" class="container tab-pane fade"><br>
                                <h3>Notice</h3>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                    ea commodo consequat.</p>
                            </div>
                            <div id="menu2" class="container tab-pane fade"><br>
                                <h3>Settings</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".nav-tabs a").click(function () {
                $(this).tab('show');
            });
        });
    </script>
@endsection
