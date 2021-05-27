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
                            <h5>Step 2 of 4</h5>
                        </div>
                        <div class="card-body">
                            <h3>Blog Region</h3>
                            <form action="{{route('blogger.blog.create.step2')}}" method="POST">
                                @csrf
                                @include('layouts.countries')
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
