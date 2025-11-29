<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Jogadores')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #f4f6f9; 
            color: #333; 
            line-height: 1.6; 
        }

        .container { 
            max-width: 1000px; 
            margin: 30px auto; 
            padding: 20px; 
            background: #fff; 
            border-radius: 8px; 
            box-shadow: 0 2px 8px rgba(0,0,0,0.1); 
        }

        nav { 
            background: #004085; 
            padding: 15px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
        }

        nav a { 
            color: #fff; 
            margin-right: 20px; 
            font-weight: 500; 
        }

        nav a:hover { 
            text-decoration: underline; 
        }

        nav form button { 
            background: #dc3545; 
            border: none; 
            color: #fff; 
            padding: 6px 12px; 
            border-radius: 4px; 
            cursor: pointer; 
        }

        nav form button:hover { 
            background: #c82333; 
        }

        h1, h2, h3 { 
            margin-bottom: 15px; 
            color: #004085; 
        }

        input[type=text], input[type=email], input[type=password], 
        input[type=date], input[type=number] {
            padding: 10px; 
            margin: 8px 0; 
            width: 100%; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
        }

        a {
            text-decoration: none;
        }

        button { 
            padding: 10px 15px; 
            margin-top: 10px; 
            cursor: pointer; 
            background: #004085; 
            color: #fff; 
            border: none; 
            border-radius: 4px; 
        }

        button:hover { 
            background: #002752; 
        }

        table { 
            border-collapse: collapse; 
            width: 100%; 
            margin-top: 20px; 
        }

        table th, table td { 
            border: 1px solid #ddd; 
            padding: 10px; 
            text-align: left; 
        }

        table th { 
            background: #004085; 
            color: #fff; 
        }

        .alert { 
            padding: 12px; 
            margin-bottom: 20px; 
            border-radius: 4px; 
        }

        .alert-success { 
            background-color: #d4edda; 
            color: #155724; 
            border: 1px solid #c3e6cb; 
        }

        .alert-error { 
            background-color: #f8d7da; 
            color: #721c24; 
            border: 1px solid #f5c6cb; 
        }
    </style>
</head>
<body>

    <nav>
        <div>
            <a href="{{ url('/') }}">Home</a>
            @auth
                <a href="{{ route('admin.jogadores.index') }}">Jogadores</a>
                <a href="{{ route('admin.perfil') }}">Meu Perfil</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>

        @auth
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Sair</button>
            </form>
        @endauth
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>

</body>
</html>
