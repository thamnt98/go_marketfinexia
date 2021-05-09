@extends('layouts.simplepage')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-table.css') }}" />
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

                    <h2 class="panel-title">Open Trading Account</h2>
                </header>
                <div class="panel-body">
                    <form method="post" action="{{route('otp.send')}}" class="form-horizontal form-bordered ">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputSuccess"><b>Phone nummber</b></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" placeholder="+19172678536">
                                @if($errors->has('phone_number'))
                                    <span class="text-danger text-md-left">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary">
                                    Send OTP
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
    <input type="hidden" class="level1-toggle" value="account" />
    <input type="hidden" class="level2-toggle" value="live" />
    </section>
@endsection
@section('js')
    <script src="{{ asset('js/bootstrap-table.js') }}"></script>
    <script src="{{ asset('js/data-table-active.js') }}"></script>
@endsection