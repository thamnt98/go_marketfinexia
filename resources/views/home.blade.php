@extends('layouts.simplepage', ['pageName' => 'Live account', 'parent' => 'Account', 'children' => 'Live'])
@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-table.css') }}" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="panel-body" style="margin-top: -60px;">
                <h2>Welcome to Gemifx</h2>
                <p>Complete account management at your fingertips: from downloads, electronic deposits and withdrawals, to advanced partnership automation and analytics. Start by downloading our Trading Terminal for your computer and making a deposit.</p>
            </div>
        </section>
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                </div>

                <h2 class="panel-title">Recent Trading Activity</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="table" data-toggle="table" data-resizable="true" >
                        <thead>
                            <tr>
                                <th>Login</th>
                                <th>Order</th>
                                <th>Open Time</th>
                                <th>Type</th>
                                <th>Volume</th>
                                <th>Symbol</th>
                                <th>Open Price</th>
                                <th>SL</th>
                                <th>TP</th>
                                <th>Close Time</th>
                                <th>Close Price</th>
                                <th>Commission</th>
                                <th>Swap</th>
                                <th>Profit</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="footer" style="position: fixed; bottom: 0; width: 100%;">
    <p style="font-size:11px">Risk Warning Note: Forex and CFDs are leveraged products, incur a high level of risk and may not be suitable for all investors. You should not risk more than you are prepared to lose. Before deciding to trade, please ensure you understand the risks involved and take into account your level of experience. Seek independent advice if necessary.
        © 2020 Copyright KenmoreFX Inc. 2010-2020 All rights reserved. Various trademarks held by their respective owners. One Financial Center, Suite 1000, Boston, MA, 02111, United States
        <input type="hidden" class="level1-toggle" value="account"/></p>

</div>

<input type="hidden" class="level2-toggle" value="demo"/>
</section>
@endsection
@section('js')
<script src="{{ asset('js/bootstrap-table.js') }}"></script>
<script src="{{ asset('js/data-table-active.js') }}"></script>
<script src="{{ asset('js/bootstrap-table-resizable.js') }}"></script>
@endsection