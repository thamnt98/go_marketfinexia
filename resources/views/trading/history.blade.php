@extends('layouts.simplepage', ['pageName' => 'Trading History', 'parent' => 'Trading', 'children' => 'Trading History'])
@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-table.css') }}" />
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
            <li><span>Trading</span></li>
            <li><span>Trading History</span></li>
        </ol>
        <a class="sidebar-right-toggle" data-open="sidebar-right"></a>
    </div>
</header>
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tabs tabs-primary">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#popular1" data-toggle="tab"><b>Deposit History</b></a>
                </li>
                <li>
                    <a href="#recent1" data-toggle="tab"><b>Withdrawal History</b></a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="popular1" class="tab-pane active">
                    <div class="table-responsive" style="margin-top: 30px">
                        <table id="table" data-toggle="table" data-resizable="true">
                            <thead>
                                <tr>
                                    <th>Amount Money</th>
                                    <th>Type</th>
                                    <th>Bank Name</th>
                                    <th>Transaction Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr class="text-center">
                                    <td>{{ number_format($order->amount_money) }}</td>
                                    <td>{{ config('deposit.type_text')[$order->type] }}</td>
                                    <td>{{ $order->bank_name }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ config('deposit.status_text')[$order->status] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="recent1" class="tab-pane">
                    <div class="table-responsive" style="margin-top: 30px">
                        <table id="table" data-toggle="table" data-resizable="true">
                            <thead>
                                <tr>
                                    <th>Login</th>
                                    <th>Bank Account</th>
                                    <th>Bank Name</th>
                                    <th>Account Name</th>
                                    <th>Amount Money</th>
                                    <th>Withdrawal Currency </th>
                                    <th>Note</th>
                                    <th>Transaction Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($withdrawals as $withdrawal)
                                <tr class="text-center">
                                    <td>{{ $withdrawal->login }}</td>
                                    <td>{{ $withdrawal->bank_account }}</td>
                                    <td>{{ $withdrawal->bank_name }}</td>
                                    <td>{{ $withdrawal->account_name }}</td>
                                    <td>{{ number_format($withdrawal->amount) }}</td>
                                    <td>{{ $withdrawal->withdrawal_currency }}</td>
                                    <td>{{ $withdrawal->note }}</td>
                                    <td>{{ $withdrawal->created_at }}</td>
                                    <td>{{ config('deposit.status_text')[$withdrawal->status] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" class="level1-toggle" value="trading"/>
<input type="hidden" class="level2-toggle" value="history"/>
</section>
@endsection
@section('js')
<script src="{{ asset('js/bootstrap-table.js') }}"></script>
<script src="{{ asset('js/data-table-active.js') }}"></script>
@endsection
