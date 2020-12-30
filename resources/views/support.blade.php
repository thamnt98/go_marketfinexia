@extends('layouts.simplepage', ['pageName' => 'Live account', 'parent' => 'Account', 'children' => 'Live'])
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
            <li><span>Support</span></li>
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

                <h2 class="panel-title">Support</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" method="get">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>I have a question</b></label>
                        <div class="col-md-6">
                            <select class="form-control">
                                <option>Select...</option>
                                <option>I have a technical question about this website</option>
                                <option>I have a technical question about MT4</option>
                                <option>I have a financial question</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>Question</b></label>
                        <div class="col-md-6">
                            <textarea class="form-control" rows="2" placeholder="Type your describe"></textarea>
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
<input type="hidden" class="level1-toggle" value="account" />
<input type="hidden" class="level2-toggle" value="live" />
</section>
@endsection
@section('js')
@endsection