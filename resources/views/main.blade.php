<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск совместных поездок - @yield('title', 'Главная')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial; background: #f5f5f5; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; }
        h1 { margin-bottom: 20px; }
        
        .btn, .btn-add, .btn-edit, .btn-delete, .btn-back {
            display: inline-block;
            background: #28a745;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-delete {
            background: #ff4c67;
        }
        
        .btn-back {
            background: #6c757d;
        }
        
        .btn:hover, .btn-add:hover, .btn-edit:hover, .btn-back:hover {
            background: #1e7e34;
        }
        
        .btn-delete:hover {
            background: #e04460;
        }
        
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #f0f0f0; }
        .success { background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px; }
        .error { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px; }
        .actions { display: flex; gap: 5px; }
        .empty { text-align: center; padding: 40px; color: #666; }
        
        .navbar {
            background: #f8f9fa;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .navbar a {
            color: #333;
            text-decoration: none;
            margin-right: 20px;
        }
        
        .navbar a:hover {
            color: #28a745;
        }
        
        .logo {
            font-size: 1.5em;
            font-weight: bold;
            color: #28a745;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #28a745;
        }
        
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 5px;
        }
        
        .pagination a, .pagination span {
            padding: 8px 12px;
            background: #f0f0f0;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
        }
        
        .pagination a:hover {
            background: #28a745;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">Поиск совместных поездок</div>
            <div>
                <a href="{{ url('/') }}">Главная</a>
                <a href="{{ url('/rides') }}">Поездки</a>
                
                @auth
                    <a href="{{ url('/my-rides') }}">Мои поездки</a>
                    <a href="{{ url('/my-bookings') }}">Мои бронирования</a>
                    <a href="{{ url('/my-cars') }}">Мои машины</a>
                    <a href="{{ url('/profile') }}">Профиль</a>
                    
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ url('/admin/cars') }}">Машины (Admin)</a>
                        <a href="{{ url('/admin/rides') }}">Поездки (Admin)</a>
                        <a href="{{ url('/admin/users') }}">Пользователи (Admin)</a>
                    @endif
                    
                    <form action="{{ url('/logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn" style="background:#dc3545; padding:5px 12px;">Выйти</button>
                    </form>
                @else
                    <a href="{{ url('/login') }}">Вход</a>
                    <a href="{{ url('/register') }}">Регистрация</a>
                @endauth
            </div>
            
            @auth
                <div>
                    {{ auth()->user()->name }} ({{ auth()->user()->role }})
                </div>
            @endauth
        </div>
        
        <h1>@yield('title')</h1>
        
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif
        
        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif
        
        @yield('content')
        
        @yield('pagination')
    </div>
</body>
</html>