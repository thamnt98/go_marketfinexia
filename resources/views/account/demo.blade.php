@extends('layouts.simplepage')
@section('css')
@endsection
    <header class="page-header">
        <h2>Demo Account</h2>
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Account</span></li>
                <li><span>Demo</span></li>
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

                <h2 class="panel-title">Open Demo Account</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" method="get">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>Type</b></label>
                        <div class="col-md-6">
                            <select class="form-control">
                                <option>Select...</option>
                                <option>Demo USD</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>Leverage</b></label>
                        <div class="col-md-6">
                            <select class="form-control">
                                <option>Select...</option>
                                <option>1:1</option>
                                <option>1:50</option>
                                <option>1:100</option>
                                <option>1:200</option>
                                <option>1:300</option>
                                <option>1:500</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    <b>I agree to the </b><a href="#"><b>Terms & Conditions</b></a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Open account</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<input type="hidden" class="level1-toggle" value="account"/>
<input type="hidden" class="level2-toggle" value="demo"/>
</section>
@endsection
@section('js')
@endsection