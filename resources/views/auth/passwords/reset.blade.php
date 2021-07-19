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
                    <a href="https://marketfinexia.com/">
                        <img src="{{ asset('image/logo.png')}}" class="img-fluid" style="width:120px; margin:40px">
                    </a>
                </div>
                <h2 class="text-header text-center">Reset Password</h2>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @if($errors->has('password'))
                                <span class="text-danger text-md-left" >{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            @if($errors->has('password_confirmation'))
                                <span class="text-danger text-md-left" >{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
