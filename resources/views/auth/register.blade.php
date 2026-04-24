@extends('main')

@section('title', 'Регистрация')

@section('content')
    <div class="container" style="max-width: 500px;">
        <form method="POST" action="{{ url('/register') }}">
            @csrf
            
            <div class="form-group">
                <label>Имя</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="error" style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error" style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" name="password" required>
                @error('password')
                    <div class="error" style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Подтверждение пароля</label>
                <input type="password" name="password_confirmation" required>
            </div>
            
            <div class="form-group">
                <label>Телефон (необязательно)</label>
                <input type="text" name="phone" value="{{ old('phone') }}">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn">Зарегистрироваться</button>
            </div>
            
            <p>Уже есть аккаунт? <a href="{{ url('/login') }}">Войти</a></p>
        </form>
    </div>
@endsection