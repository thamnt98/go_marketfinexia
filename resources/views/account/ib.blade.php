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
            <li><span>Account</span></li>
            <li><span>Live</span></li>
        </ol>
        <a class="sidebar-right-toggle" data-open="sidebar-right"></a>
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

                <h2 class="panel-title">Open IB Account</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" method="get">
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>Type</b></label>
                                <select class="form-control">
                                    <option>Select...</option>
                                    <option>IB</option>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label><b>Company Website</b></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>Full Name</b></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-5">
                                <label><b>Sky ID</b></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>Company Name</b></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-5">
                                <label><b>Describe your experience with FOREX or any related experience</b></label>
                                <textarea class="form-control" rows="2" placeholder="Type your describe"></textarea>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>Company Phone</b></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-5">
                                <label><b>Describe your services/Include any comments</b></label>
                                <textarea class="form-control" rows="2" placeholder="Type your describe"></textarea>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>Email</b></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-5">
                                <div class="checkbox" style="margin-top:30px">
                                    <label>
                                        <input type="checkbox" clavalue="">
                                        <b>I agree to the </b><a href="#"><b>Terms & Conditions</b></a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5"></div>
                            <div class="form-group col-md-5">
                                <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Open account</button>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<input type="hidden" class="level1-toggle" value="{{ $sideBar == 1 ? 'account' : 'partnership' }}" />
<input type="hidden" class="level2-toggle" value="ib" />
</section>
@endsection
@section('js')
@endsection
