@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <br>
                            <br>

                        <div class="card">
                            <h4>Thank you for your registration, Please wait for approval</h4>
                            <h3>{{$newblogger->name}}</h3>
                            <a href="{{route('index')}}">Landing Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
