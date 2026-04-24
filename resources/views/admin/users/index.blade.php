@extends('main')

@section('title', 'Управление пользователями')

@section('content')
    @if($users->count() > 0)
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Телефон</th>
                        <th>Роль</th>
                        <th>Дата регистрации</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone ?? '—' }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at ? $user->created_at->format('d.m.Y') : '—' }}</td>
                        <td class="actions">
                            <a href="{{ url('/admin/users/' . $user->id) }}" class="btn">Просмотр</a>
                            <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" class="btn-edit">Редактировать</a>
                            @if(auth()->id() != $user->id)
                            <form action="{{ url('/admin/users/' . $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Удалить пользователя?')">Удалить</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="empty">
            <p>Нет пользователей</p>
        </div>
    @endif
@endsection

@section('pagination')
    {{ $users->links() }}
@endsection