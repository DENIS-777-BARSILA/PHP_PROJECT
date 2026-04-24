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
            <label>Машина:</label>
            <p>{{ $ride->car->brand ?? '—' }} {{ $ride->car->model ?? '' }} ({{ $ride->car->license_plate ?? '—' }})</p>
        </div>
        
        @if($ride->description)
        <div class="form-group">
            <label>Описание:</label>
            <p>{{ $ride->description }}</p>
        </div>
        @endif
    </div>
    
    <h3>Записавшиеся пассажиры</h3>
    
    @if($ride->bookings->count() > 0)
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>Дата записи</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ride->bookings as $booking)
                    <tr>
                        <td>{{ $booking->passenger->name ?? '—' }}</td>
                        <td>{{ $booking->passenger->phone ?? '—' }}</td>
                        <td>{{ $booking->created_at }}</td>
                        <td>{{ $booking->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>Пока никто не записался</p>
    @endif
    
    <a href="{{ url('/my-rides') }}" class="btn-back">Назад</a>
    <a href="{{ url('/rides/' . $ride->id . '/edit') }}" class="btn-edit">Редактировать</a>
    <form action="{{ url('/rides/' . $ride->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-delete" onclick="return confirm('Удалить поездку?')">Удалить</button>
    </form>
@endsection