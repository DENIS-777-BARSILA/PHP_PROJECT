@extends('main')

@section('title', 'Мои бронирования')

@section('content')
    @if($bookings->count() > 0)
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Откуда</th>
                        <th>Куда</th>
                        <th>Дата и время</th>
                        <th>Водитель</th>
                        <th>Машина</th>
                        <th>Мест</th>
                        <th>Цена</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->ride->from }}</td>
                        <td>{{ $booking->ride->to }}</td>
                        <td>{{ $booking->ride->departure_time }}</td>
                        <td>{{ $booking->ride->driver->name ?? '—' }}</td>
                        <td>{{ $booking->ride->car->brand ?? '—' }} {{ $booking->ride->car->model ?? '' }}</td>
                        <td>{{ $booking->ride->free_seats }}</td>
                        <td>{{ $booking->ride->price }} ₽</td>
                        <td>{{ $booking->status }}</td>
                        <td class="actions">
                            <a href="{{ url('/my-bookings/' . $booking->id) }}" class="btn">Просмотр</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="empty">
            <p>У вас нет бронирований</p>
            <p>Перейдите на <a href="{{ url('/rides') }}">страницу поездок</a> и запишитесь</p>
        </div>
    @endif
@endsection

@section('pagination')
    {{ $bookings->links() }}
@endsection