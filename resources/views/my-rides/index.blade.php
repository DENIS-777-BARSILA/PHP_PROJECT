@extends('main')

@section('title', 'Мои поездки')

@section('content')
    <a href="{{ url('/admin/rides/create-no-auth') }}" class="btn">Создать поездку</a>
    
    @if($rides->count() > 0)
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Откуда</th>
                        <th>Куда</th>
                        <th>Дата и время</th>
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
                        <td>{{ $ride->car->brand ?? '—' }} {{ $ride->car->model ?? '' }}</td>
                        <td>{{ $ride->free_seats }}</td>
                        <td>{{ $ride->price }} ₽</td>
                        <td>{{ $ride->status }}</td>
                        <td class="actions">
                            <a href="{{ url('/my-rides/' . $ride->id) }}" class="btn">Просмотр</a>
                            <a href="{{ url('/rides/' . $ride->id . '/edit') }}" class="btn-edit">Редактировать</a>
                            <form action="{{ url('/rides/' . $ride->id) }}" method="POST" style="display:inline;">
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
            <p>У вас нет созданных поездок</p>
            <p>Нажмите "Создать поездку"</p>
        </div>
    @endif
@endsection

@section('pagination')
    {{ $rides->links() }}
@endsection