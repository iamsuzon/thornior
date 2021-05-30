@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Blogger Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h5>Step 4 of 4</h5>
                            </div>
                            <div class="card-body">
                                <h3>Which Categories Fit Your Content?</h3>
                                <form action="{{route('blogger.blog.create.step4')}}" method="POST">
                                    @csrf
                                    @foreach($categories as $category)
                                        <div class="checkbox">
                                            <label class="form-control text-uppercase"><input type="checkbox" name="categories[]" value="{{$category->id}}">{{$category->name}}</label>
                                        </div>
                                    @endforeach
                                    <br>
                                    <button class="btn btn-success" type="submit">Next</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
