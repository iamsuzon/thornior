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
                                <h3>Click to complete the blog setup</h3>
                                <form action="{{route('blogger.blog.create.final')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="finish" name="finish">
                                    <br>
                                    <button class="btn btn-success" type="submit">Finish</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
