@extends('main')

@section('title', 'Просмотр поездки')

@section('content')
    <div class="card">
        <div class="form-group">
            <label>Откуда:</label>
            <p>{{ $ride->from }}</p>
        </div>
        
        <div class="form-group">
            <label>Куда:</label>
            <p>{{ $ride->to }}</p>
        </div>
        
        <div class="form-group">
            <label>Дата и время:</label>
            <p>{{ $ride->departure_time }}</p>
        </div>
        
        <div class="form-group">
            <label>Свободных мест:</label>
            <p>{{ $ride->free_seats }}</p>
        </div>
        
        <div class="form-group">
            <label>Цена:</label>
            <p>{{ $ride->price }} руб</p>
        </div>
        
        <div class="form-group">
            <label>Водитель:</label>
            <p>{{ $ride->driver->name ?? '—' }}</p>
        </div>
        
        <div class="form-group">
            <label>Телефон водителя:</label>
            <p>{{ $ride->driver->phone ?? '—' }}</p>
        </div>
        
        <div class="form-group">
            <label>Машина:</label>
            <p>{{ $ride->car->brand ?? '—' }} {{ $ride->car->model ?? '' }} ({{ $ride->car->license_plate ?? '—' }})</p>
        </div>
        
        <div class="form-group">
            <label>Цвет машины:</label>
            <p>{{ $ride->car->color ?? '—' }}</p>
        </div>
        
        @if($ride->description)
        <div class="form-group">
            <label>Описание:</label>
            <p>{{ $ride->description }}</p>
        </div>
        @endif
    </div>
    
    @auth
        @if(auth()->id() != $ride->driver_id)
            <form action="{{ url('/rides/' . $ride->id . '/book') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn">Записаться</button>
            </form>
        @endif
    @else
        <div class="warning" style="background: #fff3cd; color: #856404; padding: 10px; border-radius: 5px; margin-top: 20px;">
            <p>Чтобы записаться на поездку, нужно <a href="{{ url('/login') }}">войти</a> или <a href="{{ url('/register') }}">зарегистрироваться</a></p>
        </div>
    @endauth
    
    <a href="{{ url('/rides') }}" class="btn-back" style="display: inline-block; margin-top: 10px;">Назад</a>
@endsection