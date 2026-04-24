@extends('main')

@section('title', 'Добавить поездку')

@section('content')
    <form action="{{ url('/admin/rides') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Откуда</label>
            <input type="text" name="from" value="{{ old('from') }}" required>
        </div>
        
        <div class="form-group">
            <label>Куда</label>
            <input type="text" name="to" value="{{ old('to') }}" required>
        </div>
        
        <div class="form-group">
            <label>Дата и время</label>
            <input type="datetime-local" name="departure_time" value="{{ old('departure_time') }}" required>
        </div>
        
        <div class="form-group">
            <label>Свободных мест</label>
            <input type="number" name="free_seats" value="{{ old('free_seats', 3) }}" min="1" max="8" required>
        </div>
        
        <div class="form-group">
            <label>Цена (руб)</label>
            <input type="number" name="price" value="{{ old('price', 0) }}" step="50">
        </div>
        
        <div class="form-group">
            <label>Регулярность</label>
            <select name="regularity">
                <option value="once">Разово</option>
                <option value="daily">Ежедневно</option>
                <option value="weekdays">По будням</option>
                <option value="weekly">Еженедельно</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Водитель (ID)</label>
            <input type="number" name="driver_id" value="{{ old('driver_id', 1) }}" required>
        </div>
        
        <div class="form-group">
            <label>Машина (ID)</label>
            <input type="number" name="car_id" value="{{ old('car_id', 1) }}" required>
        </div>
        
        <div class="form-group">
            <label>Описание</label>
            <textarea name="description" rows="3">{{ old('description') }}</textarea>
        </div>
        
        <button type="submit" class="btn">Сохранить</button>
        <a href="{{ url('/admin/rides') }}" class="btn-back">Назад</a>
    </form>
@endsection