	<!-- start: sidebar -->
    <aside id="sidebar-left" class="sidebar-left">
				
        <div class="sidebar-header">
            <div class="sidebar-title">
                <img src="{{ asset('image/icon_offline_0.jpeg') }}">
            </div>
            <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>
    
        <div class="nano">
            <div class="nano-content">
                <nav id="menu" class="nav-main" role="navigation">
                    <ul class="nav nav-main">
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-parent level-1" data-toggle="account">
                            <a>
                                <i class="fa fa-play-circle-o " aria-hidden="true"></i>
                                <span>Open Accounts</span>
                            </a>
                            <ul class="nav nav-children">
                                <li class="level-2" data-toggle="live">
                                    <a href="{{ route('account.live') }}">
                                        Live Account
                                    </a>
                                </li>
                                {{-- <li class="level-2" data-toggle="demo">
                                    <a href="{{ route('account.demo') }}">
                                        Demo Account
                                    </a>
                                </li> --}}
                                <li class="level-2" data-toggle="ib">
                                    <a href="{{ route('account.ib') }}">
                                         IB Account
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-parent level-1" data-toggle="bank">
                            <a>
                                <i class="fa fa-bank" aria-hidden="true"></i>
                                <span>Deposit & Withdrawal</span>
                            </a>
                            <ul class="nav nav-children">
                                <li class="level-2" data-toggle="deposit">
                                    <a href="{{ route('deposit.funds') }}">
                                         Deposit Funds
                                    </a>
                                </li>
                                <li class="level-2" data-toggle="withdraw">
                                    <a href="{{ route('withdraw.funds') }}">
                                         Withdraw Funds
                                    </a>
                                </li>
                                <li class="level-2" data-toggle="transfer">
                                    <a href="#">
                                         Transfer Between Accounts
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-parent level -1">
                            <a>
                                <i class="fa fa-history" aria-hidden="true"></i>
                                <span>Trading</span>
                            </a>
                            <ul class="nav nav-children level-2">
                                <li>
                                    <a href="#">
                                         Trading History
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-parent level-1">
                            <a>
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span>IB Partnershipp</span>
                            </a>
                            <ul class="nav nav-children level-2">
                                <li>
                                    <a href="#">
                                         IB Account
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a>
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span>Change MT Passworrd</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
    
        </div>
    
    </aside>
    <!-- end: sidebar -->