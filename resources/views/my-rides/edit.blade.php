@extends('main')

@section('title', 'Редактировать поездку')

@section('content')
    <form action="{{ url('/rides/' . $ride->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Откуда</label>
            <input type="text" name="from" value="{{ old('from', $ride->from) }}" required>
        </div>
        
        <div class="form-group">
            <label>Куда</label>
            <input type="text" name="to" value="{{ old('to', $ride->to) }}" required>
        </div>
        
        <div class="form-group">
            <label>Дата и время</label>
            <input type="datetime-local" name="departure_time" value="{{ old('departure_time', date('Y-m-d\TH:i', strtotime($ride->departure_time))) }}" required>
        </div>
        
        <div class="form-group">
            <label>Свободных мест</label>
            <input type="number" name="free_seats" value="{{ old('free_seats', $ride->free_seats) }}" min="1" max="8" required>
        </div>
        
        <div class="form-group">
            <label>Цена (руб)</label>
            <input type="number" name="price" value="{{ old('price', $ride->price) }}" step="50">
        </div>
        
        <div class="form-group">
            <label>Регулярность</label>
            <select name="regularity">
                <option value="once" {{ $ride->regularity == 'once' ? 'selected' : '' }}>Разово</option>
                <option value="daily" {{ $ride->regularity == 'daily' ? 'selected' : '' }}>Ежедневно</option>
                <option value="weekdays" {{ $ride->regularity == 'weekdays' ? 'selected' : '' }}>По будням</option>
                <option value="weekly" {{ $ride->regularity == 'weekly' ? 'selected' : '' }}>Еженедельно</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Статус</label>
            <select name="status">
                <option value="active" {{ $ride->status == 'active' ? 'selected' : '' }}>Активна</option>
                <option value="completed" {{ $ride->status == 'completed' ? 'selected' : '' }}>Завершена</option>
                <option value="cancelled" {{ $ride->status == 'cancelled' ? 'selected' : '' }}>Отменена</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Машина</label>
            <select name="car_id" required>
                @foreach(auth()->user()->cars as $car)
                    <option value="{{ $car->id }}" {{ $ride->car_id == $car->id ? 'selected' : '' }}>{{ $car->brand }} {{ $car->model }} ({{ $car->license_plate }})</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label>Описание</label>
            <textarea name="description" rows="3">{{ old('description', $ride->description) }}</textarea>
        </div>
        
        <button type="submit" class="btn">Сохранить</button>
        <a href="{{ url('/my-rides') }}" class="btn-back">Назад</a>
    </form>
@endsection