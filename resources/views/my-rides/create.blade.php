@extends('main')

@section('title', 'Главная')

@section('content')
    <div class="welcome" style="text-align: center; padding: 50px 20px;">
        <h1 style="font-size: 2.5em; color: #28a745;">Поиск совместных поездок</h1>
        <p style="margin: 30px 0;">
            <a href="{{ url('/rides') }}" class="btn" style="font-size: 1.2em; padding: 12px 30px;">Найти поездку</a>
            @guest
                <a href="{{ url('/login') }}" class="btn" style="font-size: 1.2em; padding: 12px 30px; background: #17b82f;">Вход</a>
                <a href="{{ url('/register') }}" class="btn" style="font-size: 1.2em; padding: 12px 30px; background: #6c757d;">Регистрация</a>
            @endguest
        </p>
        
        <hr style="margin: 40px 0;">
    </div>
@endsection