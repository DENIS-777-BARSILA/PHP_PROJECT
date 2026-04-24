@extends('main')

@section('title', 'Вход в систему')

@section('content')
    <div class="container" style="max-width: 500px;">
        <form method="POST" action="{{ url('/login') }}">
            @csrf

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Пароль</label>
                <input type="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Войти</button>
        </form>

        <p style="margin-top: 20px;">Нет аккаунта? <a href="{{ url('/register') }}">Зарегистрироваться</a></p>
    </div>
@endsection