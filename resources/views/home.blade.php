@extends('layouts.simplepage')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-table.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"/>
@endsection
<header class="page-header">
    @include('layouts.menutop')
</header>
@section('content')
    <div class="container-fluid">
        <ul class="index-links row an-mar-10"><a id="an-indexico0"
                                                 href="{{ route('otp.send') }}">
                <li class="col-xs-12 col-sm-6 col-md-6 col-lg-3 an-pad-10">
                    <div class="insidebox">
                        <div class="an-index-ico an-bgcolor1"><i class="fa fa-id-card-o" aria-hidden="true"></i></div>
                        <span style="font-size: 15px;">Trader</span></div>
                </li>
            </a><a id="an-indexico1" href="{{route('deposit.funds')}}">
                <li class="col-xs-12 col-sm-6 col-md-6 col-lg-3 an-pad-10">
                    <div class="insidebox">
                        <div class="an-index-ico an-bgcolor2"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
                        <span style="font-size: 15px;">Deposit</span></div>
                </li>
            </a><a id="an-indexico2" href="{{route('withdraw.funds')}}">
                <li class="col-xs-12 col-sm-6 col-md-6 col-lg-3 an-pad-10">
                    <div class="insidebox">
                        <div class="an-index-ico an-bgcolor3"><i class="fa fa-bar-chart" aria-hidden="true"></i></div>
                        <span style="font-size: 15px;">Withdrawal</span></div>
                </li>
            </a><a id="an-indexico3" href="{{route('account.MTPassword')}}">
                <li class="col-xs-12 col-sm-6 col-md-6 col-lg-3 an-pad-10">
                    <div class="insidebox">
                        <div class="an-index-ico an-bgcolor4"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                        <span style="font-size: 15px;">Change Password</span></div>
                </li>
            </a>
            <div class="clear"></div>
        </ul>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="an-box widget-box an-topline" sort="23">
                    <div class="widget-header"><h4>ACCOUNT LISTING</h4></div>
                    <div class="widget-body index-table">
                        <div class="widget-main no-padding table-box">
                            <table class="table table-bordered table-striped an-index-table">
                                <thead>
                                <tr>
                                    <th style="width:20%">Login</th>
                                    <th style="width:20%">ACCOUNT TYPE</th>
                                    <th style="width:20%">Balance</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($balances as $login => $balance)
                                    <tr>
                                        <td>{{ $login }}</td>
                                        <td>{{ config('mt4.group.CWD-STD-B') }}</td>
                                        <td>{{ $balance }}$</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gx-5">
            <div class="col-md-6 mb-5">
                <div class="card card-raised border-top border-4 border-secondary h-100">
                    <div class="card-body p-5">
                        <div class="overline text-muted mb-4">Money Out Last 30 Days</div>
                        <h2 class="mb-4">
                            -$ {{ number_format($withdrawalTotal , 2, '.', ',') }}
                        </h2>
                        @foreach($withdrawals as $withdrawal)
                            <div class="mb-2">
                                <div class="mb-1">{{ $withdrawal->login }}</div>
                                <div class="d-flex align-items-center">
                                    <div class="progress w-100 me-3">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width:{{ $withdrawalTotal ? (100*round($withdrawal->total / $withdrawalTotal, 2)) : 0 }}%"></div>
                                    </div>
                                    <div class="flex-shrink-0">${{ $withdrawal->total }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer bg-transparent position-relative ripple-gray mdc-ripple-upgraded">
                        <a class="d-flex align-items-center justify-content-end text-decoration-none stretched-link text-primary"
                           href="{{ route('trading.history') }}">
                            <div class="fst-button">View All</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="card card-raised border-top border-4 border-success h-100">
                    <div class="card-body p-5">
                        <div class="overline text-muted mb-4">Money In Last 30 Days</div>
                        <h2 class="mb-4">
                            $ {{ number_format($orderTotal , 2, '.', ',') }}
                        </h2>
                        @foreach(config('deposit.type') as $type)
                            <div class="mb-2">
                                <div class="mb-1">{{ config('deposit.type_text')[$type] }}</div>
                                <div class="d-flex align-items-center">
                                    <div class="progress w-100 me-3">
                                        <div class="progress-bar bg-success" role="progressbar" style="width:{{ $orderData[$type] ? (100*round($orderData[$type] / $orderTotal, 2)) : 0 }}%"></div>
                                    </div>
                                    <div class="flex-shrink-0">${{ $orderData[$type] }}</div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="card-footer bg-transparent position-relative ripple-gray mdc-ripple-upgraded">
                        <a class="d-flex align-items-center justify-content-end text-decoration-none stretched-link text-primary"
                           href="{{ route('trading.history') }}">
                            <div class="fst-button">View All</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" class="level1-toggle" value="dashboard"/>
    </section>
@endsection
@section('js')
    <script src="{{ asset('js/bootstrap-table.js') }}"></script>
    <script src="{{ asset('js/data-table-active.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table-resizable.js') }}"></script>
@endsection
