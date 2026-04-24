@extends('main')

@section('title', 'Редактировать машину')

@section('content')
    <form action="{{ url('/my-cars/' . $car->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Марка</label>
            <input type="text" name="brand" value="{{ old('brand', $car->brand) }}" required>
        </div>
        
        <div class="form-group">
            <label>Модель</label>
            <input type="text" name="model" value="{{ old('model', $car->model) }}" required>
        </div>
        
        <div class="form-group">
            <label>Цвет</label>
            <input type="text" name="color" value="{{ old('color', $car->color) }}">
        </div>
        
        <div class="form-group">
            <label>Госномер</label>
            <input type="text" name="license_plate" value="{{ old('license_plate', $car->license_plate) }}" required>
        </div>
        
        <div class="form-group">
            <label>Количество мест</label>
            <select name="passenger_seats">
                <option value="1" {{ $car->passenger_seats == 1 ? 'selected' : '' }}>1 место</option>
                <option value="2" {{ $car->passenger_seats == 2 ? 'selected' : '' }}>2 места</option>
                <option value="3" {{ $car->passenger_seats == 3 ? 'selected' : '' }}>3 места</option>
                <option value="4" {{ $car->passenger_seats == 4 ? 'selected' : '' }}>4 места</option>
                <option value="5" {{ $car->passenger_seats == 5 ? 'selected' : '' }}>5 мест</option>
                <option value="6" {{ $car->passenger_seats == 6 ? 'selected' : '' }}>6 мест</option>
                <option value="7" {{ $car->passenger_seats == 7 ? 'selected' : '' }}>7 мест</option>
                <option value="8" {{ $car->passenger_seats == 8 ? 'selected' : '' }}>8 мест</option>
            </select>
        </div>
        
        <button type="submit" class="btn">Сохранить</button>
        <a href="{{ url('/my-cars') }}" class="btn-back">Назад</a>
    </form>
@endsection