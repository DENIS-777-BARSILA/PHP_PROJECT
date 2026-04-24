@extends('main')

@section('title', 'Управление поездками')

@section('content')
    <a href="{{ url('/admin/rides/create') }}" class="btn-add">Добавить поездку</a>
    
    @if($rides->count() > 0)
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Откуда</th>
                        <th>Куда</th>
                        <th>Время</th>
                        <th>Водитель</th>
                        <th>Машина</th>
                        <th>Мест</th>
                        <th>Цена</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rides as $ride)
                    <tr>
                        <td>{{ $ride->id }}</td>
                        <td>{{ $ride->from }}</td>
                        <td>{{ $ride->to }}</td>
                        <td>{{ $ride->departure_time }}</td>
                        <td>{{ $ride->driver->name ?? '—' }}</td>
                        <td>{{ $ride->car->brand ?? '—' }} {{ $ride->car->model ?? '' }}</td>
                        <td>{{ $ride->free_seats }}</td>
                        <td>{{ $ride->price }} ₽</td>
                        <td>{{ $ride->status }}</td>
                        <td class="actions">
                            <a href="{{ url('/admin/rides/' . $ride->id) }}" class="btn">Просмотр</a>
                            <a href="{{ url('/admin/rides/' . $ride->id . '/edit') }}" class="btn-edit">Редактировать</a>
                            <form action="{{ url('/admin/rides/' . $ride->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Удалить поездку?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="empty">
            <p>Нет ни одной поездки</p>
        </div>
    @endif
@endsection

@section('pagination')
    {{ $rides->links() }}
@endsection