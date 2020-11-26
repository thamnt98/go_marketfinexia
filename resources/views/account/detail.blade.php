@extends('layouts.simplepage')
@section('css')
<link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-table.css') }}" />
@endsection
<header class="page-header">
    <h2><b>Edit your info</b></h2>
    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Your profile</span></li>
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

                <h2 class="panel-title"><b>Edit your info</b></h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" method="get">
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>First Name</b></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-5">
                                <label><b>City</b></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>Last Name</b></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-5">
                                <label><b>Zip Code</b></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>Phone</b></label>
                                <input id="phone" name="phone" type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-5">
                                <label><b>State</b></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label><b>Address</b></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-5">
                                <label><b>Country</b></label>
                                <select name="country" id="country"  class="form-control" name="country" >
                                    <option value="vn">Viet Nam</option>
                                    <option value="uk">United Kingdom</option>
                                    <option value="us">United States</option>
                                    <option value="th">Thailand</option>  
                                    <option value="ch">China</option>
                                    <option value="va">Vanuatu</option>
                                </select>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Save changes</button>
                                <button type="reset" class="mb-xs mt-xs mr-xs btn btn-default">Cancel</button>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section class="cpanel">
            <header class="panel-heading">
                <h2 class="panel-title"><b>Documents</b></h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" method="get">
                    <div class="table-responsive">
                        <table id="table" data-toggle="table" data-resizable="true" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th>File Type</th>
                                    <th>Status</th>
                                    <th>Uploaded On</th>
                                    <th>View</th>
                                    <th>Action</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b>Copy Of Id</b></td>
                                    <td></td>
                                    <td>-</td>
                                    <td></td>
                                    <td><input  type="file"></td>
                                </tr>
                                <tr>
                                    <td><b>Proof Of Address</b></td>
                                    <td></td>
                                    <td>-</td>
                                    <td></td>
                                    <td><input  type="file"></td>
                                </tr>
                                <tr>
                                    <td><b>New Additional File</b></td>
                                    <td></td>
                                    <td>-</td>
                                    <td></td>
                                    <td><input  type="file"></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </section>
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                </div>
                <h2 class="panel-title"><b>Change Your Password</b></h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" method="get">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>Current Password</b></label>
                        <div class="col-md-6">
                            <input type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess"><b>New Password</b></label>
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
                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<div class="footer" style="margin-top:30px; width: 100%;">
    <p style="font-size:11px">Risk Warning Note: Forex and CFDs are leveraged products, incur a high level of risk and may not be suitable for all investors. You should not risk more than you are prepared to lose. Before deciding to trade, please ensure you understand the risks involved and take into account your level of experience. Seek independent advice if necessary.
        © 2020 Copyright GemiFx Inc. 2010-2020 All rights reserved. Various trademarks held by their respective owners. One Financial Center, Suite 1000, Boston, MA, 02111, United States
        <input type="hidden" class="level1-toggle" value="account"/></p>
</div>
</section>
@endsection
@section('js')
<script src="{{ asset('js/intlTelInput.js')}}"></script>
<script src="{{ asset('js/bootstrap-table.js') }}"></script>
<script src="{{ asset('js/data-table-active.js') }}"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
    })
</script>
@endsection
