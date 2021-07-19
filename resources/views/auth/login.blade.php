@extends('layouts.app')
@section('content')
<div class="column row">
    <div class="col-lg-7 col-md-6 col-sm-6 background">
    </div>
    <div class="col-lg-5 col-md-6 col-sm-6">
        <div class="row justify-content-center card">
            <div class="card-body">
                <div class="logo" style="text-align: center !important;">
                    <a href="https://marketfinexia.com/">
                        <img src="{{ asset('image/logo.png')}}" class="img-fluid" style="width:240px; margin:40px">
                    </a>
                </div>
                <h2 class="text-header text-center">Log into your account</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Email">
                            <i class="fa fa-user fa-lg"></i>
                            @error('email')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <input id="password" type="password" placeholder="Password"
                                class="form-control  @error('password') is-invalid @enderror" name="password" required
                                autocomplete="password">
                            <i class="fa fa-lock fa-lg"></i>
                            @error('password')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                                <a class="btn btn-link" href="{{route('password.forgot')}}"
                                    style="float: right; padding-top:0px">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-block"><b>LOGIN</b></button>
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: center">
                        <div class="col-md-2"></div>
                        <div class="col-md-8" style="margin-top:16px">
                            <span class="">Don't have an account? <a href="{{ route('register')}}">Register
                                    here</a></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
