@extends('main')

@section('title', 'Просмотр бронирования')

@section('content')
    <div class="card">
        <div class="form-group">
            <label>ID бронирования:</label>
            <p>{{ $booking->id }}</p>
        </div>
        
        <div class="form-group">
            <label>Статус:</label>
            <p>{{ $booking->status }}</p>
        </div>
        
        <div class="form-group">
            <label>Дата бронирования:</label>
            <p>{{ $booking->created_at }}</p>
        </div>
        
        <hr>
        
        <h3>Информация о поездке</h3>
        
        <div class="form-group">
            <label>Откуда:</label>
            <p>{{ $booking->ride->from }}</p>
        </div>
        
        <div class="form-group">
            <label>Куда:</label>
            <p>{{ $booking->ride->to }}</p>
        </div>
        
        <div class="form-group">
            <label>Дата и время:</label>
            <p>{{ $booking->ride->departure_time }}</p>
        </div>
        
        <div class="form-group">
            <label>Цена:</label>
            <p>{{ $booking->ride->price }} руб</p>
        </div>
        
        <hr>
        
        <h3>Информация о водителе</h3>
        
        <div class="form-group">
            <label>Имя:</label>
            <p>{{ $booking->ride->driver->name ?? '—' }}</p>
        </div>
        
        <div class="form-group">
            <label>Телефон:</label>
            <p>{{ $booking->ride->driver->phone ?? '—' }}</p>
        </div>
        
        <div class="form-group">
            <label>Машина:</label>
            <p>{{ $booking->ride->car->brand ?? '—' }} {{ $booking->ride->car->model ?? '' }}</p>
        </div>
        
        <div class="form-group">
            <label>Госномер:</label>
            <p>{{ $booking->ride->car->license_plate ?? '—' }}</p>
        </div>
    </div>
    
    <a href="{{ url('/my-bookings') }}" class="btn-back">Назад</a>
    
    <form action="{{ url('/bookings/' . $booking->id) }}" method="POST" style="display:inline; margin-left: 10px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-delete" onclick="return confirm('Отменить запись?')">Отменить запись</button>
    </form>
@endsection