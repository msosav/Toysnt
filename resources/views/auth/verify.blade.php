@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('app.verify.verify_email')</div>
                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        @lang('verify.link_sent')
                    </div>
                    @endif
                    @lang('app.verify.check_email')
                    @lang('app.verify.didnt_receive_email')
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">@lang('app.verify.request_email')</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection