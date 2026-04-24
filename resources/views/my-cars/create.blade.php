@extends('main')

@section('title', 'Добавить машину')

@section('content')
    <form action="{{ url('/my-cars') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Марка</label>
            <input type="text" name="brand" value="{{ old('brand') }}" required>
        </div>
        
        <div class="form-group">
            <label>Модель</label>
            <input type="text" name="model" value="{{ old('model') }}" required>
        </div>
        
        <div class="form-group">
            <label>Цвет</label>
            <input type="text" name="color" value="{{ old('color') }}">
        </div>
        
        <div class="form-group">
            <label>Госномер</label>
            <input type="text" name="license_plate" value="{{ old('license_plate') }}" required>
        </div>
        
        <div class="form-group">
            <label>Количество мест</label>
            <select name="passenger_seats">
                <option value="1">1 место</option>
                <option value="2">2 места</option>
                <option value="3">3 места</option>
                <option value="4" selected>4 места</option>
                <option value="5">5 мест</option>
                <option value="6">6 мест</option>
                <option value="7">7 мест</option>
                <option value="8">8 мест</option>
            </select>
        </div>
        
        <button type="submit" class="btn">Сохранить</button>
        <a href="{{ url('/my-cars') }}" class="btn-back">Назад</a>
    </form>
@endsection