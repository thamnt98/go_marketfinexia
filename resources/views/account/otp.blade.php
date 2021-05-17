<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Forex Broker | FX Trading Software / GEMI</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
    <meta name="author" content="JSOFT.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('image/favicon.ico') }}">
    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
          rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('css/default.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/otp.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-table.css') }}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme-custom.css')}}">
    <script src="{{ asset('js/modernizr.js')}}"></script>
    <script src="https://www.gstatic.com/firebasejs/7.21.1/firebase.js"></script>
    <script>
        var config = {
            apiKey: "{{ config('app.firebase_api_key') }}",
            authDomain: "{{ config('app.firebase_auth_domain') }}",
            {{--databaseURL: "{{ config('app.firebase_database_url') }}",--}}
            projectId: "{{ config('app.firebase_project_id') }}",
            storageBucket: "{{ config('app.firebase_storage_bucket') }}",
            messagingSenderId: "{{ config('app.firebase_messaging_sender_id') }}",
            appId: "{{ config('app.firebase_app_id') }}",
            measurementId: "{{ config('app.firebase_measurement_id') }}"
        };
        firebase.initializeApp(config);

    </script>
    <script src="https://cdn.firebase.com/libs/firebaseui/2.3.0/firebaseui.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/2.3.0/firebaseui.css"/>
    <!-- Head Libs -->
</head>
<body>
<section class="body">
    @include('layouts.top')
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
    <div class="inner-wrapper">
        @include('layouts.sidebar')
        <section role="main" class="content-body">
            <div class="row">
                <!----------------------------------- firebase otp ---------------------->
                <div class="col-sm-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <div id="container">
                                <!--<h3>Authentication via Gmail/Phone number</h3>-->
                                <div id="loading">Loading...</div>
                                <div id="loaded" class="hidden">
                                    <div id="main">
                                        <div id="user-signed-in" class="hidden">
                                            <form action="{{ route('account.live') }}" method="post">
                                                {{ csrf_field() }}
                                                <div id="user-info">
                                                    <div id="phone"></div>
                                                    <input type="text" id="mobile_no" name="mobile_no" value="" readonly>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <p>
                                                    <button type="submit" id="sign-out">Sign Out</button>
                                                </p>
                                            </form>
                                        </div>
                                        <div id="user-signed-out" class="hidden">
                                            <div id="firebaseui-spa">
                                                <!--<h3>App:</h3>-->
                                                <div id="firebaseui-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---------------------------------end firebase otp --------------------->
            </div>
            <div class="panel-body">
                <div class="table-responsive @if(!$liveAccounts->count()) hidden @endif" style="margin-top:200px;">
                    <table id="table" data-toggle="table" data-resizable="true">
                        <thead>
                        <tr>
                            <th>Login</th>
                            <th>IB ID</th>
                            <th>Group</th>
                            <th>Leverage</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($liveAccounts as $account)
                            <tr class="text-center">
                                <td>{{ $account->login }}</td>
                                <td>{{ $account->ib_id }}</td>
                                <td>{{ $account->group }}</td>
                                <td>{{ config('mt4.leverage')[$account->leverage] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <input type="hidden" class="level1-toggle" value="account" />
            <input type="hidden" class="level2-toggle" value="live" />
        </section>
    </div>
</section>
@include('layouts.footer')
<script src="{{ asset('js/bootstrap-table.js') }}"></script>
<script src="{{ asset('js/data-table-active.js') }}"></script>
<script>

    function getUiConfig() {
        return {
            'callbacks': {
                'signInSuccess': function (user, credential, redirectUrl) {
                    handleSignedInUser(user);
                    return false;
                }
            },
            'signInFlow': 'popup',
            'signInOptions': [{
                provider: firebase.auth.PhoneAuthProvider.PROVIDER_ID,
                recaptchaParameters: {
                    type: 'image',
                    size: 'invisible',
                    badge: 'bottomleft'
                },
                defaultCountry: 'IN',
                defaultNationalNumber: '1234567890',
                loginHint: '+11234567890'
            }],
            'tosUrl': 'https://www.google.com'
        };
    }

    var ui = new firebaseui.auth.AuthUI(firebase.auth());

    var handleSignedInUser = function (user) {
        document.getElementById('user-signed-in').style.display = 'block';
        document.getElementById('user-signed-out').style.display = 'none';
        document.getElementById('phone').textContent = user.phoneNumber;
        document.getElementById('mobile_no').value = user.phoneNumber;
        document.getElementById('sign-out').click();
    };

    var handleSignedOutUser = function () {
        document.getElementById('user-signed-in').style.display = 'none';
        document.getElementById('user-signed-out').style.display = 'block';
        ui.start('#firebaseui-container', getUiConfig());
    };

    firebase.auth().onAuthStateChanged(function (user) {
        document.getElementById('loading').style.display = 'none';
        document.getElementById('loaded').style.display = 'block';
        user ? handleSignedInUser(user) : handleSignedOutUser();
    });

    var initApp = function () {
        document.getElementById('sign-out').addEventListener('click', function () {
            firebase.auth().signOut();
        });
    };

    window.addEventListener('load', initApp);

</script>
</body>
</html>
