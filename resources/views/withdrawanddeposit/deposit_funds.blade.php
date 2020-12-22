@extends('layouts.simplepage', ['pageName' => 'Live account', 'parent' => 'Account', 'children' => 'Live'])
@section('css')
<link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
@endsection
<header class="page-header">
    @include('layouts.menutop')
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
                                    <a href="{{ route('deposit.bepay') }}">
                                        <div class="thumbnail">
                                            <div class="thumb-preview text-center">
                                                <img src="{{ asset('image/bepay.jpg') }}" class="img-thumnail" alt="Project" style="height:110px">
                                                <div class="mg-thumb-options"></div>
                                            </div>
                                        </div>
									</a>
								</div>
								<div class="isotope-item document col-sm-6 col-md-4 col-lg-2">
                                    <a href="#vifa" class="modal-with-form">
                                        <div class="thumbnail">
                                            <div class="thumb-preview" style="padding-top: 34px; padding-bottom:34px">
                                                <img src="{{ asset('image/vifapay.jpg') }}" class="img-responsive" alt="Project">
                                                <div class="mg-thumb-options"></div>
                                            </div>
                                        </div>
									</a>
									<div id="vifa" class="modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<div class="panel-body">
												<form class="ajax-form" class="form-horizontal" method="post" action="{{ route('transfer.vifa') }}" novalidate="novalidate">
													@csrf
													<div class="form-group">
														<label class="col-sm-3 control-label"><b>Amount of money (VND)</b></label>
														<div class="col-sm-9">
														<input type="number" name="amount_money"  class="form-control" placeholder="Amount of money" value="{{ old('amount_money') }}"/>
														<div class="errors errors-amount_money"></div>
														</div>
													</div>
													<br>
													<div class="form-group">
														<div class="col-sm-3"></div>
														<div class="col-sm-9">
															<button type="submit" class="btn btn-primary">Transfer</button>
															<button class="btn btn-default modal-dismiss">Cancel</button>
														</div>
													</div>
												</form>
											</div>
										</section>
									</div>
								</div>
								<div class="isotope-item document col-sm-6 col-md-4 col-lg-2">
                                    <a href="#">
                                        <div class="thumbnail">
                                            <div class="thumb-preview">
                                                <img src="{{ asset('image/neteller.jpg') }}" class="img-responsive" alt="Project" style="height:110px">
                                                <div class="mg-thumb-options"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                {{-- <div class="isotope-item document col-sm-6 col-md-4 col-lg-2">
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
												<h2 class="panel-title"><b>Tether</b></h2>
											</header>
											<div class="panel-body">
												<form id="demo-form" class="form-horizontal" novalidate="novalidate">
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label"><b>Account</b></label>
														<div class="col-sm-9">
                                                            <select class="form-control">
                                                                <option>Trading #2131809431 | Standard | 0 USD </option>
                                                                <option> Trading #2131834286 | Standard | 0 USD </option>
                                                                <option> Trading #2131834287 | Standard | 0 USD </option>
                                                                <option> Trading #2131834288 | Standard | 0 USD </option>
                                                                <option> Trading #2131834289 | Standard | 0 USD </option>
                                                            </select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label"><b>First Name</b></label>
														<div class="col-sm-9">
															<input type="text" name="email" class="form-control" placeholder="First Name" required/>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label"><b>Last Name</b></label>
														<div class="col-sm-9">
															<input type="text" name="url" class="form-control" placeholder="Last Name" />
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label"><b>Email</b></label>
														<div class="col-sm-9">
															<input type="email" name="url" class="form-control" placeholder="Email" />
														</div>
                                                    </div>
                                                    <div class="form-group">
														<label class="col-sm-3 control-label"><b>Amount</b></label>
														<div class="col-sm-9">
															<input type="email" name="url" class="form-control" placeholder="Amount" />
														</div>
                                                    </div>
                                                    <div class="form-group mt-lg">
														<label class="col-sm-3 control-label"><b>Currency</b></label>
														<div class="col-sm-9">
                                                            <select class="form-control">
                                                                <option>USDT</option>
                                                            </select>
														</div>
													</div>
												</form>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-basic">Pay</button>
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
												<h2 class="panel-title"><b>Internet Banking</b></h2>
											</header>
											<div class="panel-body">
												<form id="demo-form" class="form-horizontal" novalidate="novalidate">
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label"><b>Account</b></label>
														<div class="col-sm-9">
                                                            <select class="form-control">
                                                                <option> Trading #2131809431 | Standard | 0 USD </option>
                                                                <option> Trading #2131834286 | Standard | 0 USD </option>
                                                                <option> Trading #2131834287 | Standard | 0 USD  </option>
                                                                <option> Trading #2131834288 | Standard | 0 USD </option>
                                                                <option> Trading #2131834289 | Standard | 0 USD  </option>
                                                            </select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label"><b>First Name</b></label>
														<div class="col-sm-9">
															<input type="text" name="email" class="form-control" placeholder="First Name" required/>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label"><b>Last Name</b></label>
														<div class="col-sm-9">
															<input type="text" name="url" class="form-control" placeholder="Last Name" />
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label"><b>Email</b></label>
														<div class="col-sm-9">
															<input type="email" name="url" class="form-control" placeholder="Email" />
														</div>
                                                    </div>
                                                    <div class="form-group">
														<label class="col-sm-3 control-label"><b>Amount</b></label>
														<div class="col-sm-9">
															<input type="email" name="url" class="form-control" placeholder="Amount" />
														</div>
                                                    </div>
                                                    <div class="form-group mt-lg">
														<label class="col-sm-3 control-label"><b>Currency</b></label>
														<div class="col-sm-9">
                                                            <select class="form-control">
                                                                <option>MYR</option>
                                                                <option>THB</option>
                                                                <option>VND</option>
                                                                <option>YDR</option>
                                                            </select>
														</div>
													</div>
												</form>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-basic">Pay</button>
														<button class="btn btn-default modal-dismiss">Close</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
                                </div> --}}
                                {{-- <div class="isotope-item document col-sm-6 col-md-4 col-lg-2">
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
												<h2 class="panel-title"><b>Bitcoin</b></h2>
											</header>
											<div class="panel-body">
												<form id="demo-form" class="form-horizontal" novalidate="novalidate">
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label"><b>Account</b></label>
														<div class="col-sm-9">
                                                            <select class="form-control">
                                                                <option> Trading #2131809431 | Standard | 0 USD  </option>
                                                                <option> Trading #2131834286 | Standard | 0 USD  </option>
                                                                <option> Trading #2131834287 | Standard | 0 USD   </option>
                                                                <option> Trading #2131834288 | Standard | 0 USD  </option>
                                                                <option> Trading #2131834289 | Standard | 0 USD   </option>
                                                            </select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label"><b>First Name</b></label>
														<div class="col-sm-9">
															<input type="text" name="email" class="form-control" placeholder="First Name" required/>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label"><b>Last Name</b></label>
														<div class="col-sm-9">
															<input type="text" name="url" class="form-control" placeholder="Last Name" />
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label"><b>Email</b></label>
														<div class="col-sm-9">
															<input type="email" name="url" class="form-control" placeholder="Email" />
														</div>
                                                    </div>
                                                    <div class="form-group">
														<label class="col-sm-3 control-label"><b>Amount</b></label>
														<div class="col-sm-9">
															<input type="email" name="url" class="form-control" placeholder="Amount" />
														</div>
                                                    </div>
                                                    <div class="form-group mt-lg">
														<label class="col-sm-3 control-label"><b>Currency</b></label>
														<div class="col-sm-9">
                                                            <select class="form-control">
                                                                <option>BTC</option>
                                                            </select>
														</div>
													</div>
												</form>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-basic">Pay</button>
														<button class="btn btn-default modal-dismiss">Close</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
</div>
<input type="hidden" class="level1-toggle" value="bank"/>
<input type="hidden" class="level2-toggle" value="deposit"/>
</section>
@endsection
@section('js')
    <script src="{{ asset('js/magnific-popup.js') }}"></script>
	<script src="{{ asset('js/examples.modals.js') }}"></script>
    <script src="{{ asset('js/form.js') }}"></script>
@endsection