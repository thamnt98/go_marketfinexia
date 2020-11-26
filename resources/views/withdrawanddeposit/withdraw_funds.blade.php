@extends('layouts.simplepage')
@section('css')
@endsection
    <header class="page-header">
        <h2>Withdrawal Funds</h2>
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
            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                </div>

                <h2 class="panel-title">Withdrawal Funds</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" method="get">
                    <div class="tabs">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#account" data-toggle="tab"><b>Account Information</b></a>
                            </li>
                            <li>
                                <a href="#branch" data-toggle="tab"><b>Branch Information</b></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="account" class="tab-pane active">
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <label><b>Account Number</b></label>
                                            <input type="number" class="form-control" placeholder="Account Number">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label><b>Account Name</b></label>
                                            <input type="text" class="form-control" placeholder="Account Name">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <label><b>Currency</b></label>
                                            <select class="form-control">
                                                <option>USD</option>
                                                <option>EUR</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label><b>Balance</b></label>
                                            <input type="number" class="form-control" placeholder="Balance">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <label><b>Available Balance</b></label>
                                            <input type="number" class="form-control" placeholder="Available Balance">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label><b>Widthrawal Currency</b></label>
                                            <select class="form-control">
                                                <option>USD</option>
                                                <option>EUR</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <label><b>Widthrawal Type</b></label>
                                            <select class="form-control">
                                                <option>USD</option>
                                                <option>EUR</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label><b><i class="fa fa-usd"></i></b></label>
                                            <input type="number" class="form-control" placeholder="Amount">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <label><b>Bank Account</b></label>
                                            <input type="number" class="form-control" placeholder="Bank Account">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label><b>Account Holder</b></label>
                                            <input type="text" class="form-control" placeholder="Account Holder">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                            </div>
                            <div id="branch" class="tab-pane">
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <label><b>Bank Name</b></label>
                                            <input type="number" class="form-control">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label><b>Bank Branch Name</b></label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <label><b>SWIFT Code</b></label>
                                            <input type="text" class="form-control" placeholder="Swift Code">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label><b>Bank Address</b></label>
                                            <input type="number" class="form-control" placeholder="Bank Address">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <label><b>IBAN</b></label>
                                            <input type="text" class="form-control" placeholder="IBAN">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label><b>Comment</b></label>
                                            <input type="text" class="form-control" placeholder="Comment">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"></div>
                                    <div class="form-group col-md-5">
                                        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">WithDrawal</button>
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
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<input type="hidden" class="level1-toggle" value="bank"/>
<input type="hidden" class="level2-toggle" value="withdraw"/>
</section>
@endsection
@section('js')
@endsection