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
        <p>Cảm ơn bạn đã sử dụng dịch vụ của Gemifx</p>
        <p>Xin vui lòng nhấp chuột vào bên dưới để cài đặt lại mật khẩu:</p>
        <a href="{{ $url }}">{{ $url }}</a>
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
