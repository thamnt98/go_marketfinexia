@extends('layouts.app')

@section('content')
<div class="container register-form">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="row card-header">
                    <div class="col-lg-3">
                        <h2>Create Account</h2>
                    </div>
                    <div class="col-lg-7"></div>
                    <div class="col-lg-2">
                        <a href="{{ route('login') }}" class="btn btn-primary" style="float: right;">Login</a>
                    </div>
                </div>
                <div class="card-body" style="padding-right:50px">
                    <div class="logo" style="text-align: center !important;">
                        <a href="#">
                            <img src="{{ asset('image/logo.png')}}" class="img-fluid" style="width:120px; margin:40px">
                        </a>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                    <input id="first_name" type="text" class="col-md-8 form-control @error('name') is-invalid @enderror" name="first_name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                    <input id="last_name" type="text" class="col-md-8 form-control @error('name') is-invalid @enderror" name="last_name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="family_name" class="col-md-4 col-form-label text-md-right">Family name</label>
                                    <input id="family_name" type="text" class="col-md-8 form-control @error('name') is-invalid @enderror" name="family_name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                    <input id="email" type="email" class="col-md-8 form-control @error('name') is-invalid @enderror" name="email" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="phone_number_type" class="col-md-4 col-form-label text-md-right">Phone Type</label>
                                    <select name="" id="phone_number_type"  class="col-md-8 form-control" >
                                        <option>Phone</option>
                                        <option>Mobile</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone number</label>
                                    <input id="phone_number" type="text" class="col-md-8 form-control" name="phone_number" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                                    <select name="" id="country"  class="col-md-8 form-control" name="country" >
                                        <option value="vn">Viet Nam</option>
                                        <option value="nb">Nhat Ban</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="application_type" class="col-md-4 col-form-label text-md-right">Application Type</label>
                                    <select name="" id="application_type"  class="col-md-8 form-control" name="application_type">
                                        <option value="1">Individual</option>
                                        <option value="2">Join</option>
                                    </select>
                                </div>
                            </div>
                        </div>  
                        <div class="form-group row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-10 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    I have read and consent to my data being used in accordance with the Privacy Policy.
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-10 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    I would also like to receive free Daily Market Analysis from GemiFX
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection