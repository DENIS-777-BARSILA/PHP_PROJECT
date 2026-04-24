@extends('main')

@section('title', 'Редактировать машину')

@section('content')
    <form action="{{ url('/admin/cars/' . $car->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Марка *</label>
            <input type="text" name="brand" value="{{ old('brand', $car->brand) }}" required>
            @error('brand')
                <div class="error" style="color:red; font-size:12px; margin-top:5px;">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label>Модель *</label>
            <input type="text" name="model" value="{{ old('model', $car->model) }}" required>
            @error('model')
                <div class="error" style="color:red; font-size:12px; margin-top:5px;">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label>Цвет</label>
            <input type="text" name="color" value="{{ old('color', $car->color) }}">
        </div>
        
        <div class="form-group">
            <label>Госномер *</label>
            <input type="text" name="license_plate" value="{{ old('license_plate', $car->license_plate) }}" required>
            @error('license_plate')
                <div class="error" style="color:red; font-size:12px; margin-top:5px;">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label>Количество пассажирских мест</label>
            <select name="passenger_seats">
                <option value="1" {{ old('passenger_seats', $car->passenger_seats) == 1 ? 'selected' : '' }}>1 место</option>
                <option value="2" {{ old('passenger_seats', $car->passenger_seats) == 2 ? 'selected' : '' }}>2 места</option>
                <option value="3" {{ old('passenger_seats', $car->passenger_seats) == 3 ? 'selected' : '' }}>3 места</option>
                <option value="4" {{ old('passenger_seats', $car->passenger_seats) == 4 ? 'selected' : '' }}>4 места</option>
                <option value="5" {{ old('passenger_seats', $car->passenger_seats) == 5 ? 'selected' : '' }}>5 мест</option>
                <option value="6" {{ old('passenger_seats', $car->passenger_seats) == 6 ? 'selected' : '' }}>6 мест</option>
                <option value="7" {{ old('passenger_seats', $car->passenger_seats) == 7 ? 'selected' : '' }}>7 мест</option>
                <option value="8" {{ old('passenger_seats', $car->passenger_seats) == 8 ? 'selected' : '' }}>8 мест</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Владелец (user_id)</label>
            <input type="number" name="user_id" value="{{ old('user_id', $car->user_id) }}" required>
            @error('user_id')
                <div class="error" style="color:red; font-size:12px; margin-top:5px;">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn">Сохранить изменения</button>
        <a href="{{ url('/admin/cars') }}" class="btn-back">Назад</a>
    </form>
@endsection