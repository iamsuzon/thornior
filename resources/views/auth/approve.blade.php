@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Account Approval') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('We will approve your account after a review.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please be patient for approval.') }}
                    {{ __('If we did not approve your account for a log time, please consider contact with us') }},
{{--                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.--}}
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
