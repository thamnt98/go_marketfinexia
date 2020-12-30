@extends('layouts.simplepage')
@section('css')
@endsection
<header class="page-header">
    @include('layouts.menutop')
    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Account</span></li>
            <li><span>Change Password</span></li>
        </ol>
        <a class="sidebar-right-toggle" data-open="sidebar-right"></a>
    </div>
</header>
@section('content')
<div class="row">
    <div class="col-lg-12">
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
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                </div>

                <h2 class="panel-title">Change MT Password</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" method="post"
                    action="{{route('account.MTPassword.change')}}">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>Account</b></label>
                        <div class="col-md-6">
                            <select class="form-control" name="login">
                                <option value="">Select...</option>
                                @foreach($data as $login => $balance)
                                @if(old('login') == $login)
                                <option value="{{$login}}" selected>Trading # {{$login}} | Standard | {{$balance}} USD
                                </option>
                                @else
                                <option value="{{$login}}">Trading # {{$login}} | Standard | {{$balance}} USD </option>
                                @endif
                                @endforeach
                            </select>
                            @if($errors->has('login'))
                            <span class="text-danger text-md-left">{{ $errors->first('login') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>Password Type</b></label>
                        <div class="col-md-6">
                            <select class="form-control">
                                <option>Main</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>Password</b></label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password" value="{{old('password')}}">
                            @if($errors->has('password'))
                            <span class="text-danger text-md-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>Confirm Password</b></label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password_confirmation"
                                value="{{old('password_confirmation')}}">
                            @if($errors->has('password_confirmation'))
                            <span class="text-danger text-md-left">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<input type="hidden" class="level1-toggle" value="password" />
</section>
@endsection
@section('js')
@endsection
