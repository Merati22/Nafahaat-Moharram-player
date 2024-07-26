<!-- resources/views/participant/create.blade.php -->

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نفحات - ثبت نام</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
            alert('{{ session('success') }}');
            @elseif(session('error'))
            alert('{{ session('error') }}');
            @endif
        });
    </script>
</head>
<body>
<div class="form-container">
    <h2 class="form-title">ثبت نام هدیه نفحات</h2>
    <form action="{{ url('/register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="full_name">نام و نام خانوادگی</label>
            <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
        </div>
        <div class="form-group">
            <label for="phone_number">شماره تلفن</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
        </div>
        <div class="form-group">
            <label for="address">آدرس</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}" required>
        </div>
        <div class="form-group">
            <label for="province">استان</label>
            <input type="text" id="province" name="province" value="{{ old('province') }}" required>
        </div>
        <div class="form-group">
            <label for="city">شهر</label>
            <input type="text" id="city" name="city" value="{{ old('city') }}" required>
        </div>
        <div class="form-group">
            <label for="post_code">کد پستی</label>
            <input type="text" id="post_code" name="post_code" value="{{ old('post_code') }}" required>
        </div>
        <div class="form-group">
            <button type="submit">ارسال</button>
        </div>
    </form>
</div>
</body>
</html>
