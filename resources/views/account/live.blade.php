@extends('layouts.simplepage', ['pageName' => 'Live account', 'parent' => 'Account', 'children' => 'Live'])
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
                <form action="{{route('account.ib.open')}}"
                    class="form-horizontal form-bordered @if($liveAccounts->count() >= 2) hidden @endif" method="post">
                    @csrf
                    <input class="hidden" name="phone" value="{{ $phone }}">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>IB ID</b></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="ib_id" value="{{ old('ib_id', $ibId) }}" placeholder="IB ID">
                            @if($errors->has('ib_id'))
                                <span class="text-danger text-md-left">{{ $errors->first('ib_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>Type</b></label>
                        <div class="col-md-6">
                            <select class="form-control" name="group">
                                <option value="">Select...</option>
                                <option value="{{ $firstGroup }}">{{ $firstGroup }}</option>
                            </select>
                            @if($errors->has('group'))
                                <span class="text-danger text-md-left">{{ $errors->first('group') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>Leverage</b></label>
                        <div class="col-md-6">
                            <select class="form-control" name="leverage">
                                <option value="">Select...</option>
                                @foreach(config('mt4.leverage') as $key => $leverage)
                                    <option value="{{$key}}">{{$leverage}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('leverage'))
                                <span class="text-danger text-md-left">{{ $errors->first('leverage') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="" required class="checkbox">
                                    <b>I agree to the </b><a href="#"><b><a
                                                href="https://marketfinexia.com/en/term-of-services-for-trade/">Terms &
                                                Conditions</a></b>
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary">
                               Open account
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
