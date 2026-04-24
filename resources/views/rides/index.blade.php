@extends('main')

@section('title', 'Все поездки')

@section('content')
    @if($rides->count() > 0)
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Откуда</th>
                        <th>Куда</th>
                        <th>Дата и время</th>
                        <th>Водитель</th>
                        <th>Машина</th>
                        <th>Мест</th>
                        <th>Цена</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rides as $ride)
                    <tr>
                        <td>{{ $ride->from }}</td>
                        <td>{{ $ride->to }}</td>
                        <td>{{ $ride->departure_time }}</td>
                        <td>{{ $ride->driver->name ?? '—' }}</td>
                        <td>{{ $ride->car->brand ?? '—' }} {{ $ride->car->model ?? '' }}</td>
                        <td>{{ $ride->free_seats }}</td>
                        <td>{{ $ride->price }} ₽</td>
                        <td class="actions">
                            <a href="{{ url('/rides/' . $ride->id) }}" class="btn">Подробнее</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="empty">
            <p>Поездок не найдено</p>
        </div>
    @endif
@endsection

@section('pagination')
    {{ $rides->links() }}
@endsection