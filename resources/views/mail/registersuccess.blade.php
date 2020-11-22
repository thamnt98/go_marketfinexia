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
        <p>Xin chào {{ $firstName .' ' . $lastName}} !</p>
        <br>
        <p>Cảm ơn bạn đã đăng ký tài khoản của Gemifx</p>
        <p>Chỉ cần nhấp chuột vào liên kết bên dưới để tiếp tục sử dụng dịch vụ :</p>
        <a href="{{ $url }}">{{ $url }}</a>
    </div>
</body>
</html>