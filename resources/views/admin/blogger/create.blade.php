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
                            <form action="{{route('admin.blogger.sent')}}" method="POST">
                                @csrf
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name">
                                <br>
                                <br>
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email">
                                <br>
                                <br>
                                <button type="submit" class="btn btn-success">Create Link</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
