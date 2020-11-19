<!doctype html>
<html class="no-js" lang="ja">
@include('layout.header')
<body class="">
@include('layout.top')
@include('layout.carousel')
<div id="main">
    <div id="loading" style="position: fixed;
        top: 50%;
        left: 50%;
        background-color: rgba(100,100,100,0.3);
        width: 100%;
        text-align: center;
        height: 100%;
        transform: translate(-50%,-50%); z-index: 99999999; display: none">
        <img src="{{asset('img/Spinner-1s-800px.gif')}}" width="100" height="100" style="position: fixed;
        top: 50%;
        left: 50%;
        background-color: grey;
        /* width: 100%; */
        text-align: center;
        /* height: 100%; */
        transform: translate(-50%,-50%);">
    </div>
</div>
@include('layout.copyright')
@include('layout.footer')

</body>
</html>