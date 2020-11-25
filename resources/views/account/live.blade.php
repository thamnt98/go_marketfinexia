@extends('layouts.simplepage', ['pageName' => 'Live account', 'parent' => 'Account', 'children' => 'Live'])
@section('css')

@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                </div>

                <h2 class="panel-title">Open Trading Account</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" method="get">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>Type</b></label>
                        <div class="col-md-6">
                            <select class="form-control">
                                <option>Select...</option>
                                <option>Standard</option>
                                <option>Option 3</option>
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
                                    I agree to the Terms & Conditions
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
@endsection
@section('js')
@endsection