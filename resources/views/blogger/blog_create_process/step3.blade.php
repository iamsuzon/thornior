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
                                <h5>Step 3 of 4</h5>
                            </div>
                            <div class="card-body">
                                <h3>How Often Do You Plan to Post? </h3>
                                <form action="{{route('blogger.blog.create.step3')}}" method="POST">
                                    @csrf
                                    <label class="form-control radio-inline">
                                        <input type="radio" name="howpost" value="57">5 Posts/Week
                                    </label>
                                    <label class="form-control radio-inline">
                                        <input type="radio" name="howpost" value="17">1 Posts/Week
                                    </label>
                                    <label class="form-control radio-inline">
                                        <input type="radio" name="howpost" value="130">1 Posts/Month
                                    </label>
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
