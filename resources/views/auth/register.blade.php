@extends('layouts.app')

@section('content')
<div class="container register-form">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block" style="margin: 0px 15px 20px 15px">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block" style="margin: 0px 15px 20px 15px">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                    <div class="row">
                    <div class="col-lg-3">
                            <h2>Create Account</h2>
                        </div>
                        <div class="col-lg-7"></div>
                        <div class="col-lg-2">
                            <a href="{{ route('login') }}" class="btn btn-primary" style="float: right;">Login</a>
                        </div>
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
                                    <div class="col-md-8">
                                    <input id="first_name" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="name" autofocus>
                                    @if($errors->has('first_name'))
                                        <span class="text-danger text-md-left" >{{ $errors->first('first_name') }}</span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                    <div class="col-md-8">
                                    <input id="last_name" type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="name" autofocus>
                                    @if($errors->has('last_name'))
                                        <span class="text-danger text-md-left" >{{ $errors->first('last_name') }}</span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="family_name" class="col-md-4 col-form-label text-md-right">Family name</label>
                                    <div class="col-md-8">
                                    <input id="family_name" type="text" class="form-control @error('name') is-invalid @enderror" name="family_name" value="{{ old('family_name') }}" required autocomplete="name" autofocus>
                                    @if($errors->has('family_name'))
                                        <span class="text-danger text-md-left" >{{ $errors->first('family_name') }}</span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                    <div class="col-md-8">
                                    <input id="email" type="email" class="form-control @error('name') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="name" autofocus>
                                    @if($errors->has('email'))
                                        <span class="text-danger text-md-left" >{{ $errors->first('email') }}</span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="phone_number_type" class="col-md-4 col-form-label text-md-right">Phone Type</label>
                                    <div class="col-md-8">
                                    <select name="" id="phone_number_type"  class="form-control" >
                                        <option>Phone</option>
                                        <option>Mobile</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone number</label>
                                    <div class="col-md-8">
                                    <input id="phone_number" type="text" class="form-control" name="phone_number" required autocomplete="new-password" value="{{ old('phone_number') }}">
                                    @if($errors->has('phone_number'))
                                        <span class="text-danger text-md-left" >{{ $errors->first('phone_number') }}</span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                                    <div class="col-md-8">
                                    <select name="country" id="country"  class="form-control" name="country" >
                                        <option value="vn">Viet Nam</option>
                                        <option value="nb">Nhat Ban</option>
                                    </select>
                                    @if($errors->has('country'))
                                        <span class="text-danger text-md-left" >{{ $errors->first('country') }}</span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="application_type" class="col-md-4 col-form-label text-md-right">Application Type</label>
                                    <div class="col-md-8">
                                    <select name="application_type" id="application_type"  class="form-control" name="application_type">
                                        <option value="1">Individual</option>
                                        <option value="2">Join</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="form-group row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-10 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} required>
                                <label class="form-check-label" for="remember">
                                    I have read and consent to my data being used in accordance with the Privacy Policy.
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-10 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} required>

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