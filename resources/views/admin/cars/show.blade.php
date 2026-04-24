@extends('main')

@section('title', 'Просмотр машины')

@section('content')
    <div class="card" style="background: #f9f9f9; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
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
            <label>Владелец:</label>
            <p>{{ $car->owner->name ?? '—' }} ({{ $car->owner->email ?? '—' }})</p>
        </div>
        
        <div class="form-group">
            <label>Дата создания:</label>
            <p>{{ $car->created_at }}</p>
        </div>
        
        <div class="form-group">
            <label>Дата обновления:</label>
            <p>{{ $car->updated_at }}</p>
        </div>
    </div>
    
    <a href="{{ url('/admin/cars') }}" class="btn-back">Назад к списку</a>
    <a href="{{ url('/admin/cars/' . $car->id . '/edit') }}" class="btn-edit">Редактировать</a>
@endsection