@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="card">
                            <form action="{{route('admin.blogger.account.store')}}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$token}}" name="token">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name">
                                <br>
                                <br>
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email">
                                <br>
                                <br>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password">
                                <br>
                                <br>
                                <label for="password">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password-confirm">
                                <br>
                                <br>
                                <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox">
                                <label class="form-check-label" for="checkbox">Check me out</label>
                                <br>
                                <br>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
