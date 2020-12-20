<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <style>
        .container {
            padding: 20px;
        }
        .info {
            padding: 0 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <br>
        <p>Dear {{ $name}} ,</p>
        <p>Bạn đã hoàn tất thành công việc đăng ký tài tại khoản GemiFX, dưới đây là thông tin đăng nhập của bạn:</p>
        <b>Meta Trader 4</b>
        <br>
        <b>Tên đăng nhập : {{ $login }} </b>
        <br>
        <b>Mật khẩu : {{ $password }} </b>
        <br>
        <b>Tên máy chủ :  CawadaInvestment - Live</b>
        <br>
        <b>Tiền tệ tài khoản : USD</b>
        <br>
        <b>Đòn bẩy tài khoản: {{ $leverage}}</b>
        <br>
        <p>Trân trọng,</p>
        <p>Đội ngũ GemiFx</p>
        <br>
        <b>Điện thoại: 1-800-123-4567 </b>
        <br>
        <b>Email: support@gemifx.com</b>
    </div>
</body>
</html>
