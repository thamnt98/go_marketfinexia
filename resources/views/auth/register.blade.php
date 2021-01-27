@extends('layouts.app')

@section('content')
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block" style="margin: 0px 15px 20px 15px">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="column row">
    <div class="col-lg-6 col-md-6 col-sm-6 background">
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
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
                <h2 class="text-header text-center">Create Account</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="name" autofocus placeholder="First name">
                            @if($errors->has('first_name'))
                                <span class="text-danger text-md-left" >{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                        <div class="col-md-5">
                            <input id="last_name" type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="name" autofocus placeholder="Last name">
                            @if($errors->has('last_name'))
                                <span class="text-danger text-md-left" >{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <input id="email" type="email" class="form-control @error('name') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="name" autofocus placeholder="Email">
                            @if($errors->has('email'))
                                <span class="text-danger text-md-left" >{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="col-md-5">
                            <input id="ib_id" type="text" class="form-control @error('ib_id') is-invalid @enderror" name="ib_id" value="{{ old('ib_id', $ibId) }}"
                                   required autocomplete="ib_id" autofocus placeholder="IB ID" @if(!is_null($ibId)) readonly @endif>
                            @if($errors->has('ib_id'))
                                <span class="text-danger text-md-left" >{{ $errors->first('ib_id') }}</span>
                            @endif
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <select name="" id="phone_number_type"  class="form-control" >
                                <option>Phone</option>
                                <option>Mobile</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <input id="phone_number" placeholder="Phone number" type="text" class="form-control" name="phone_number" required autocomplete="new-password" value="{{ old('phone_number') }}">
                            @if($errors->has('phone_number'))
                                <span class="text-danger text-md-left" >{{ $errors->first('phone_number') }}</span>
                            @endif
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <select name="country" id="country" class="form-control">
                                @foreach(config('country') as $key=> $country)
                                    @if(old('country') == $key)
                                        <option value="{{$key}}" selected>{{$country}}</option>
                                    @else
                                        <option value="{{$key}}">{{$country}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->has('country'))
                                <span class="text-danger text-md-left" >{{ $errors->first('country') }}</span>
                            @endif
                        </div>
                        <div class="col-md-5">
                            <select name="application_type" id="application_type"  class="form-control" name="application_type">
                                <option value="1">Individual</option>
                                <option value="2">Join</option>
                            </select>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} required>
                            <label class="form-check-label" for="remember">
                                I have read and consent to my data being used in accordance with the <a href="https://gemifx.com/index.php/privacy-statement/" target="_blank" style="text-decoration: none;" > Privacy Policy.</a>
                            </label>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} required>
                            <label class="form-check-label" for="remember">
                                I would also like to receive free Daily Market Analysis from GemiFX
                            </label>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-primary btn-block"><b>Register</b></button>
                        </div>
                    </div>
                    <div class="form-group row" style="text-align: center">
                        <div class="col-md-1"></div>
                        <div class="col-md-10" style="margin-top:16px">
                            <span class="">Did you have an account? <a href="{{ route('login')}}">Login here</a></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
