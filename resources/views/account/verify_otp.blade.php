@extends('layouts.simplepage')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-table.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">
@endsection
@include('layouts.menutop')
<header class="page-header">
    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Account</span></li>
            <li><span>Live</span></li>
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

                    <h2 class="panel-title">Verify your phone number</h2>
                </header>
                <div class="panel-body">
                    Please enter the OTP sent to your number: {{ Session::get('phone') }}
                    <form action="{{ route('otp.verify')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-3 control-label text-right" for="inputSuccess" style="margin-top: 6px;"><b>OTP</b></label>
                            <div class="col-md-6">
                                <input type="hidden" name="phone_number" value="{{ Session::get('phone') }}">
                                <input id="verification_code" type="tel" class="form-control"  name="verification_code" value="{{ old('verification_code') }}" required>
                                @if($errors->has('verification_code'))
                                    <span class="text-danger text-md-left">{{ $errors->first('verification_code') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary">
                                    Verify phone number
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="table-responsive @if(!$liveAccounts->count()) hidden @endif">
                        <table id="table" data-toggle="table" data-resizable="true">
                            <thead>
                            <tr>
                                <th>Login</th>
                                <th>IB ID</th>
                                <th>Group</th>
                                <th>Leverage</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($liveAccounts as $account)
                                <tr class="text-center">
                                    <td>{{ $account->login }}</td>
                                    <td>{{ $account->ib_id }}</td>
                                    <td>{{ $account->group }}</td>
                                    <td>{{ config('mt4.leverage')[$account->leverage] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <input type="hidden" class="level1-toggle" value="account"/>
    <input type="hidden" class="level2-toggle" value="live"/>
    </section>
@endsection
@section('js')
    <script src="{{ asset('js/bootstrap-table.js') }}"></script>
    <script src="{{ asset('js/data-table-active.js') }}"></script>
@endsection
