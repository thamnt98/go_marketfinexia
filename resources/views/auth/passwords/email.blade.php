@extends('layouts.app')
@section('content')
<div class="column row">
    <div class="col-lg-7 col-md-6 col-sm-6 background">
    </div>
    <div class="col-lg-5 col-md-6 col-sm-6">
        <div class="row justify-content-center card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block" style="margin: 0px 15px 20px 15px">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="logo" style="text-align: center !important;">
                    <a href="https://gemifx.com/">
                        <img src="{{ asset('image/logo.png')}}" class="img-fluid" style="width:120px; margin:40px">
                    </a>
                </div>
                <h2 class="text-header text-center">Reset Password</h2>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                            @error('email')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-block"><b>Send Password Reset Link</b></button>
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: center">
                        <div class="col-md-2"></div>
                        <div class="col-md-8" style="margin-top:16px">
                            <span class="">Don't have an account? <a href="{{ route('register')}}">Register here</a></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection