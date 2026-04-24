@extends('main')

@section('title', 'Управление машинами')

@section('content')
    <a href="{{ url('/admin/cars/create') }}" class="btn-add">Добавить машину</a>
    
    @if($cars->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Марка</th>
                    <th>Модель</th>
                    <th>Цвет</th>
                    <th>Госномер</th>
                    <th>Мест</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->color ?? '—' }}</td>
                    <td>{{ $car->license_plate }}</td>
                    <td>{{ $car->passenger_seats }}</td>
                    <td class="actions">
                        <a href="{{ url('/admin/cars/' . $car->id . '/edit') }}" class="btn-edit">Редактировать</a>
                        <form action="{{ url('/admin/cars/' . $car->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Удалить?')">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="empty">
            <p>Пока нет ни одной машины</p>
            <p>Добавьте машину</p>
        </div>
    @endif
@endsection

@section('pagination')
    {{ $cars->links() }}
@endsection