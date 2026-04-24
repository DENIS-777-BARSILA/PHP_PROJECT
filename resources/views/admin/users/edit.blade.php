@extends('main')

@section('title', 'Редактировать пользователя')

@section('content')
    <form action="{{ url('/admin/users/' . $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Имя</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
        
        <div class="form-group">
            <label>Телефон</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">
        </div>
        
        <div class="form-group">
            <label>Роль</label>
            <select name="role">
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Администратор</option>
                <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Менеджер</option>
                <option value="client" {{ $user->role == 'client' ? 'selected' : '' }}>Клиент</option>
                <option value="guest" {{ $user->role == 'guest' ? 'selected' : '' }}>Гость</option>
            </select>
        </div>
        
        <button type="submit" class="btn">Сохранить</button>
        <a href="{{ url('/admin/users') }}" class="btn-back">Назад</a>
    </form>
@endsection