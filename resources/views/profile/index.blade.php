@extends('main')

@section('title', 'Мой профиль')

@section('content')
    <div class="card">
        <form action="{{ url('/profile') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label>Имя</label>
                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required>
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
            </div>
            
            <div class="form-group">
                <label>Телефон</label>
                <input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}">
            </div>
            
            <div class="form-group">
                <label>Новый пароль (оставьте пустым, если не меняете)</label>
                <input type="password" name="password" placeholder="Новый пароль">
            </div>
            
            <div class="form-group">
                <label>Подтверждение пароля</label>
                <input type="password" name="password_confirmation" placeholder="Повторите пароль">
            </div>
            
            <button type="submit" class="btn">Сохранить изменения</button>
        </form>
    </div>
    
    <div class="card" style="margin-top: 20px;">
        <div class="form-group">
            <label>Роль:</label>
            <p>{{ auth()->user()->role }}</p>
        </div>
        
        <div class="form-group">
            <label>Дата регистрации:</label>
            <p>{{ auth()->user()->created_at ? auth()->user()->created_at->format('d.m.Y H:i') : '—' }}</p>
        </div>
    </div>
@endsection