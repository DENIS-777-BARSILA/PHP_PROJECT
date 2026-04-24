@extends('main')

@section('title', 'Просмотр машины')

@section('content')
    <div class="card">
        <div class="form-group">
            <label>ID:</label>
            <p>{{ $car->id }}</p>
        </div>
        
        <div class="form-group">
            <label>Марка:</label>
            <p>{{ $car->brand }}</p>
        </div>
        
        <div class="form-group">
            <label>Модель:</label>
            <p>{{ $car->model }}</p>
        </div>
        
        <div class="form-group">
            <label>Цвет:</label>
            <p>{{ $car->color ?? '—' }}</p>
        </div>
        
        <div class="form-group">
            <label>Госномер:</label>
            <p>{{ $car->license_plate }}</p>
        </div>
        
        <div class="form-group">
            <label>Количество мест:</label>
            <p>{{ $car->passenger_seats }}</p>
        </div>
        
        <div class="form-group">
            <label>Дата добавления:</label>
            <p>{{ $car->created_at }}</p>
        </div>
    </div>
    
    <a href="{{ url('/my-cars') }}" class="btn-back">Назад</a>
    <a href="{{ url('/my-cars/' . $car->id . '/edit') }}" class="btn-edit">Редактировать</a>
    <form action="{{ url('/my-cars/' . $car->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-delete" onclick="return confirm('Удалить машину?')">Удалить</button>
    </form>
@endsection