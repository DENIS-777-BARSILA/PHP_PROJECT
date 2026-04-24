@extends('main')

@section('title', 'Мои машины')

@section('content')
    <a href="{{ url('/my-cars/create') }}" class="btn-add">Добавить машину</a>
    
    @if($cars->count() > 0)
        <div class="table-responsive">
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
                            <a href="{{ url('/my-cars/' . $car->id) }}" class="btn">Просмотр</a>
                            <a href="{{ url('/my-cars/' . $car->id . '/edit') }}" class="btn-edit">Редактировать</a>
                            <form action="{{ url('/my-cars/' . $car->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Удалить машину?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="empty">
            <p>У вас нет машин</p>
            <p>Нажмите "Добавить машину"</p>
        </div>
    @endif
@endsection

@section('pagination')
    {{ $cars->links() }}
@endsection