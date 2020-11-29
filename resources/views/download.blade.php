@extends('layouts.simplepage')
@section('css')
@endsection
<header class="page-header">
    @include('layouts.menutop')
    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Download</span></li>
        </ol>
        <a class="sidebar-right-toggle" data-open="sidebar-right"></a>
    </div>
</header>
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Download</h2>
            </header>
            <div class="panel-body">
                <div class="isotope-item document col-sm-6 col-md-3 col-lg-3">
                    <a href="{{ asset('image/logo.png') }}" target="_blank">
                        <div class="box-item rounded">
                            <h4><b>Corporate Logo</b></h4>
                            <i class="fa fa-download"></i>
                        </div>
                    </a>
                </div>
                <div class="isotope-item document col-sm-6 col-md-3 col-lg-3">
                    <a href="{{ asset('image/logo.png') }}" target="_blank">
                        <div class="box-item rounded">
                            <h4><b>Corporate Logo Dark</b></h4>
                            <i class="fa fa-download"></i>
                        </div>
                    </a>
                </div>
                <div class="isotope-item document col-sm-6 col-md-3 col-lg-3">
                    <a href="{{ asset('file/TermsAndConditions.pdf') }}" target="_blank">
                        <div class="box-item rounded">
                            <h4><b>Terms Of Service</b></h4>
                            <i class="fa fa-download"></i>
                        </div>
                    </a>
                </div>
                <div class="isotope-item document col-sm-6 col-md-3 col-lg-3">
                    <a href="{{ asset('file/cawadainvestment4setup.exe') }}" target="_blank">
                        <div class="box-item rounded">
                            <h4><b>Trading Terminal</b></h4>
                            <i class="fa fa-download"></i>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
</div>
<input type="hidden" class="level1-toggle" value="bank" />
<input type="hidden" class="level2-toggle" value="deposit" />
</section>
@endsection
@section('js')
{{-- <script src="{{ asset('js/magnific-popup.js') }}"></script>
<script src="{{ asset('js/examples.modals.js') }}"></script> --}}
@endsection