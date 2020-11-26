@extends('layouts.simplepage', ['pageName' => 'Live account', 'parent' => 'Account', 'children' => 'Live'])
@section('css')
<link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
@endsection
    <header class="page-header">
        <h2>Deposits</h2>
    </header>
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="panel-body">
                <section class="content-with-menu content-with-menu-has-toolbar media-gallery">
                    <div class="content-with-menu-container">
                        <div class="inner-body mg-main">
                            <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
                                <div class="isotope-item document col-sm-6 col-md-4 col-lg-2">
                                    <a href="https://www.nganluong.vn/vn/home.html" target="_blank">
                                        <div class="thumbnail">
                                            <div class="thumb-preview">
                                                <img src="{{ asset('image/nganluong.png') }}" class="img-responsive" alt="Project">
                                                <div class="mg-thumb-options"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="isotope-item document col-sm-6 col-md-4 col-lg-2">
                                    <a href="#openTetherForm" class="modal-with-form">
                                        <div class="thumbnail">
                                            <div class="thumb-preview">
                                                <img src="{{ asset('image/tether.png') }}" class="img-responsive" alt="Project">
                                                <div class="mg-thumb-options"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <div id="openTetherForm" class="modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title"><b>5Tether (USDT)</b></h2>
											</header>
											<div class="panel-body">
												<form id="demo-form" class="form-horizontal" novalidate="novalidate">
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label"><b>Select the account</b></label>
														<div class="col-sm-9">
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
														<label class="col-sm-3 control-label"><b>Amount for Withdrawal</b></label>
														<div class="col-sm-9">
															<input type="text" name="number" class="form-control" required/>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label"><b>Wallet Number</b></label>
														<div class="col-sm-9">
															<input type="text" name="url" class="form-control"/>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label"><b>Currency Rate</b></label>
														<div class="col-sm-9">
															<input type="email" name="url" class="form-control" value="0" disabled />
														</div>
                                                    </div>
                                                    <div class="form-group">
														<label class="col-sm-3 control-label"><b>Amount for Withdrawal</b></label>
														<div class="col-sm-9">
															<input type="email" name="url" class="form-control" value="0" disabled />
														</div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-3"></div>
                                                        <div class="col-md-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    <b>I agree to the </b><a href="#"><b>Terms & Conditions</b></a>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
												</form>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-basic">Confirm</button>
														<button class="btn btn-default modal-dismiss">Close</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
                                </div>
                                <div class="isotope-item document col-sm-6 col-md-4 col-lg-2">
                                    <div class="thumbnail">
                                        <div class="thumb-preview">
                                            <a class="thumb-image" href="{{ asset('image/webmoney.png') }}">
                                                <img src="{{ asset('image/webmoney.png') }}" style="padding-top:30.42px; padding-bottom: 30.42px" class="img-responsive" alt="Project">
                                            </a>
                                            <div class="mg-thumb-options">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="isotope-item document col-sm-6 col-md-4 col-lg-2">
                                    <a href="#openBankForm" class="modal-with-form">
                                        <div class="thumbnail">
                                            <div class="thumb-preview">
                                                <img src="{{ asset('image/bank.png') }}" class="img-responsive" alt="Project">
                                                <div class="mg-thumb-options"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <div id="openBankForm" class="modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title"><b>Bank Withdrawal</b></h2>
											</header>
											<div class="panel-body">
												<form id="demo-form" class="form-horizontal" novalidate="novalidate">
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label"><b>Select the account</b></label>
														<div class="col-sm-9">
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
														<label class="col-sm-3 control-label"><b>Amount for Withdrawal</b></label>
														<div class="col-sm-9">
															<input type="text" name="number" class="form-control" required/>
														</div>
                                                    </div>
                                                    <h3><b>Confirm your personal Information</b></h3>
                                                    <br>
													<div class="form-group">
														<label class="col-sm-3 control-label"><b>Bank Name</b></label>
														<div class="col-sm-9">
                                                            <select class="form-control">
                                                                <option>Select...</option>
                                                                <option>NHTM Ngoại thương Việt Nam (Vietcombank) </option>
                                                                <option> NH Công thương Việt Nam (Vietinbank)</option>
                                                                <option> NHTM CP Kỹ thương Việt Nam (Techcombank)</option>
                                                                <option>NH Đầu tư và Phát triển Việt Nam (BIDV) </option>
                                                                <option> NH Việt Nam Thịnh vượng (VPBank)</option>
                                                            </select>
														</div>
                                                    </div>
                                                    <div class="form-group">
														<label class="col-sm-3 control-label"><b>Bank Number/Plan</b></label>
														<div class="col-sm-9">
															<input type="text" name="url" class="form-control"/>
														</div>
                                                    </div>
                                                    <div class="form-group">
														<label class="col-sm-3 control-label"><b>Name</b></label>
														<div class="col-sm-9">
															<input type="text" name="url" class="form-control"/>
														</div>
													</div>
                                                    <div class="form-group">
                                                        <div class="col-md-3"></div>
                                                        <div class="col-md-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    <b>I agree to the </b><a href="#"><b>Terms & Conditions</b></a>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
												</form>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-basic">Confirm</button>
														<button class="btn btn-default modal-dismiss">Close</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
                                </div>
                                <div class="isotope-item document col-sm-6 col-md-4 col-lg-2">
                                    <a href="#openBitCoinForm" class="modal-with-form">
                                        <div class="thumbnail">
                                            <div class="thumb-preview">
                                                <img src="{{ asset('image/bitcoin.png') }}" class="img-responsive" alt="Project">
                                                <div class="mg-thumb-options"> </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div id="openBitCoinForm" class="modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title"><b>Bitcoin Withdrawal</b></h2>
											</header>
											<div class="panel-body">
												<form id="demo-form" class="form-horizontal" novalidate="novalidate">
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label"><b>Select the account</b></label>
														<div class="col-sm-9">
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
														<label class="col-sm-3 control-label"><b>Amount for Withdrawal</b></label>
														<div class="col-sm-9">
															<input type="text" name="number" class="form-control" required/>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label"><b>BTC Wallet</b></label>
														<div class="col-sm-9">
															<input type="text" name="url" class="form-control"/>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label"><b>BTC Rate</b></label>
														<div class="col-sm-9">
															<input type="email" name="url" class="form-control" value="0" disabled />
														</div>
                                                    </div>
                                                    <div class="form-group">
														<label class="col-sm-3 control-label"><b>Amount for Withdrawal</b></label>
														<div class="col-sm-9">
															<input type="email" name="url" class="form-control" value="0" disabled />
														</div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-3"></div>
                                                        <div class="col-md-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    <b>I agree to the </b><a href="#"><b>Terms & Conditions</b></a>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
												</form>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-basic">Confirm</button>
														<button class="btn btn-default modal-dismiss">Close</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
</div>
<input type="hidden" class="level1-toggle" value="bank"/>
<input type="hidden" class="level2-toggle" value="withdraw"/>
</section>
@endsection
@section('js')
    <script src="{{ asset('js/magnific-popup.js') }}"></script>
    <script src="{{ asset('js/examples.modals.js') }}"></script>
@endsection