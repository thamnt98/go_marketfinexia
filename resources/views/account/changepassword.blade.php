@extends('layouts.simplepage')
@section('css')
@endsection
    <header class="page-header">
        <h2>Change MT Password</h2>
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

                <h2 class="panel-title">Change MT Password</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" method="get">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>Account</b></label>
                        <div class="col-md-6">
                            <select class="form-control">
                                <option>Select...</option>
                                <option>Trading #2131809431 | Standard | 0 USD </option>
                                <option> Trading #2131834286 | Standard | 0 USD </option>
                                <option> Trading #2131834287 | Standard | 0 USD </option>
                                <option> Trading #2131834288 | Standard | 0 USD </option>
                                <option> Trading #2131834289 | Standard | 0 USD </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>Password Type</b></label>
                        <div class="col-md-6">
                            <select class="form-control">
                                <option>Main</option>
                                <option>Investor</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>Password</b></label>
                        <div class="col-md-6">
                            <input type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>Confirm Password</b></label>
                        <div class="col-md-6">
                            <input type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<input type="hidden" class="level1-toggle" value="password"/>
</section>
@endsection
@section('js')
@endsection