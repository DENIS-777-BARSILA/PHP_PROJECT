@extends('main')

@section('title', 'Просмотр поездки')

@section('content')
    <div class="card">
        <div class="form-group">
            <label>ID:</label>
            <p>{{ $ride->id }}</p>
        </div>
        
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
            <label>Статус:</label>
            <p>{{ $ride->status }}</p>
        </div>
        
        <div class="form-group">
            <label>Водитель:</label>
            <p>{{ $ride->driver->name ?? '—' }}</p>
        </div>
        
        <div class="form-group">
            <label>Машина:</label>
            <p>{{ $ride->car->brand ?? '—' }} {{ $ride->car->model ?? '' }}</p>
        </div>
        
        @if($ride->description)
        <div class="form-group">
            <label>Описание:</label>
            <p>{{ $ride->description }}</p>
        </div>
        @endif
    </div>
    
    <a href="{{ url('/admin/rides') }}" class="btn-back">Назад</a>
    <a href="{{ url('/admin/rides/' . $ride->id . '/edit') }}" class="btn-edit">Редактировать</a>
    <form action="{{ url('/admin/rides/' . $ride->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-delete" onclick="return confirm('Удалить поездку?')">Удалить</button>
    </form>
@endsection