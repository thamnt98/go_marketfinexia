@extends('layouts.simplepage')
@section('css')
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
            <li><span>Deposit & Withdrawal</span></li>
            <li><span>Withdrawal Funds</span></li>
        </ol>
        <a class="sidebar-right-toggle" data-open="sidebar-right"></a>
    </div>
</header>
@section('content')
<div class="row">
    <div class="col-lg-12">
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

                <h2 class="panel-title">Withdrawal Funds</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" method="post" action="{{ route('withdraw.funds.create') }}">
                    @csrf
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>Account Number</b></label>
                                <select class="form-control login" name="login">
                                    <option value="">Select one account</option>
                                    @foreach ($logins as $login)
                                    @if ($login == old('login'))
                                    <option value="{{$login}}" selected>{{$login}}</option>
                                    @else
                                    <option value="{{$login}}">{{$login}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @if($errors->has('login'))
                                <span class="text-danger text-md-left">{{ $errors->first('login') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label><b>Account Name</b></label>
                                <input type="text" name="account_name" class="form-control" placeholder="Account Name" value="{{old('account_name')}}">
                                @if($errors->has('account_name'))
                                <span class="text-danger text-md-left">{{ $errors->first('account_name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>Currency</b></label>
                                <select class="form-control" name="currency">
                                    <option value="usd" @if(old('currency')=='usd' ) selected @endif>USD</option>
                                    <option value="eur" @if(old('currency')=='eur' ) selected @endif>EUR</option>
                                </select>
                                @if($errors->has('currency'))
                                <span class="text-danger text-md-left">{{ $errors->first('currency') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label><b>Balance</b></label>
                                <input type="number" class="form-control" placeholder="Balance" name="balance" value="{{ old('balance') }}">
                                @if($errors->has('balance'))
                                <span class="text-danger text-md-left">{{ $errors->first('balance') }}</span>
                                @endif
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>Available Balance</b></label>
                                <input type="number" class="form-control available-balance" name="available_balance" placeholder="Available Balance" value="{{old('available_balance')}}">
                                @if($errors->has('available_balance'))
                                <span class="text-danger text-md-left">{{ $errors->first('available_balance') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label><b>Withdrawal Currency</b></label>
                                <select class="form-control" name="withdrawal_currency">
                                    <option value="usd" @if(old('currency')=='usd' ) selected @endif>USD</option>
                                    <option value="eur" @if(old('currency')=='eur' ) selected @endif>EUR</option>
                                </select>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>Withdrawal Type</b></label>
                                <select class="form-control" name="withdrawal_type">
                                    <option value="usd" @if(old('currency')=='usd' ) selected @endif>USD</option>
                                    <option value="eur" @if(old('currency')=='eur' ) selected @endif>EUR</option>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label><b><i class="fa fa-usd"></i></b></label>
                                <input type="number" class="form-control" placeholder="Amount" name="amount" value="{{old('amount')}}">
                                @if($errors->has('amount'))
                                <span class="text-danger text-md-left">{{ $errors->first('amount') }}</span>
                                @endif
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>Bank Account</b></label>
                                <input type="number" class="form-control" placeholder="Bank Account" name="bank_account" value="{{old('bank_account')}}">
                                @if($errors->has('bank_account'))
                                <span class="text-danger text-md-left">{{ $errors->first('bank_account') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label><b>Account Holder</b></label>
                                <input type="text" class="form-control" placeholder="Account Holder" name="account_holder" value="{{old('account_holder')}}">
                                @if($errors->has('account_holder'))
                                <span class="text-danger text-md-left">{{ $errors->first('account_holder') }}</span>
                                @endif
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>Bank Name</b></label>
                                <input type="text" class="form-control" name="bank_name" value="{{old('bank_name')}}">
                                @if($errors->has('bank_name'))
                                <span class="text-danger text-md-left">{{ $errors->first('bank_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label><b>Bank Branch Name</b></label>
                                <input type="text" class="form-control" name="bank_branch_name" value="{{old('bank_branch_name')}}">
                                @if($errors->has('bank_branch_name'))
                                <span class="text-danger text-md-left">{{ $errors->first('bank_branch_name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>SWIFT Code</b></label>
                                <input type="text" class="form-control" placeholder="Swift Code" name="swift_code" value="{{old('swift_code')}}">
                                @if($errors->has('swift_code'))
                                <span class="text-danger text-md-left">{{ $errors->first('swift_code') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label><b>Bank Address</b></label>
                                <input type="text" class="form-control" placeholder="Bank Address" name="bank_address" value="{{old('bank_address')}}">
                                @if($errors->has('bank_address'))
                                <span class="text-danger text-md-left">{{ $errors->first('bank_address') }}</span>
                                @endif
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>IBAN</b></label>
                                <input type="text" class="form-control" placeholder="IBAN" name="iban" value="{{old('iban')}}">
                                @if($errors->has('iban'))
                                <span class="text-danger text-md-left">{{ $errors->first('iban') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label><b>Comment</b></label>
                                <input type="text" class="form-control" placeholder="Comment" name="note" value="{{old('note')}}">
                                @if($errors->has('note'))
                                <span class="text-danger text-md-left">{{ $errors->first('note') }}</span>
                                @endif
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5"></div>
                            <div class="form-group col-md-5">
                                <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary">WithDrawal</button>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <span class="text-danger"><b>Please be aware of the beneficiary name is not match with your user name, double check before you continue the process.</b></span>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<input type="hidden" class="level1-toggle" value="bank" />
<input type="hidden" class="level2-toggle" value="withdraw" />
</section>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('.login').on('change', function() {
            let login = $(this).val();
            let url = window.location.origin +  '/trader/' + login + '/balance';
            $.ajax({
                type: 'get',
                url: url ,
                success: function(data) {
                    $('.available-balance').val(data)
                },
            });

        })
    })
</script>
@endsection
