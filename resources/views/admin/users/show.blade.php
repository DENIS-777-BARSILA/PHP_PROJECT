@extends('main')

@section('title', 'Просмотр пользователя')

@section('content')
    <div class="card">
        <div class="form-group">
            <label>ID:</label>
            <p>{{ $user->id }}</p>
        </div>
        
        <div class="form-group">
            <label>Имя:</label>
            <p>{{ $user->name }}</p>
        </div>
        
        <div class="form-group">
            <label>Email:</label>
            <p>{{ $user->email }}</p>
        </div>
        
        <div class="form-group">
            <label>Телефон:</label>
            <p>{{ $user->phone ?? '—' }}</p>
        </div>
        
        <div class="form-group">
            <label>Роль:</label>
            <p>{{ $user->role }}</p>
        </div>
        
        <div class="form-group">
            <label>Дата регистрации:</label>
            <p>{{ $user->created_at }}</p>
        </div>
        
        <div class="form-group">
            <label>Дата обновления:</label>
            <p>{{ $user->updated_at }}</p>
        </div>
    </div>
    
    <a href="{{ url('/admin/users') }}" class="btn-back">Назад</a>
    <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" class="btn-edit">Редактировать</a>
@endsection