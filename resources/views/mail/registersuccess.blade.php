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
        <p>Kính gửi {{ $firstName .' ' . $lastName}} ,</p>
        <br>
        <p>Cảm ơn bạn đã đăng ký tài khoản của Gemifx</p>
        <p>Chỉ cần nhấp chuột vào liên kết bên dưới để tiếp tục sử dụng dịch vụ :</p>
        <a href="https://accounts.gemifx.com/password/reset?token=b32385ee7d2c58a4e798ec3265b601270a3fd54f4dc13b56b9731c1fa45b4621&email=thamnt090498%40gmail.com">https://accounts.gemifx.com/password/reset?token=b32385ee7d2c58a4e798ec3265b601270a3fd54f4dc13b56b9731c1fa45b4621&email=thamnt090498%40gmail.com</a>
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
