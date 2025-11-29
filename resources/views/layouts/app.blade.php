<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Jogadores')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        a { text-decoration: none; color: blue; }
        a:hover { text-decoration: underline; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 8px; text-align: left; }
        input[type=text], input[type=email], input[type=password], input[type=date], input[type=number] {
            padding: 5px; margin: 5px 0; width: 100%;
        }
        button { padding: 5px 10px; margin-top: 10px; cursor: pointer; }
        .container { max-width: 800px; margin: auto; }
        nav { margin-bottom: 20px; }
        nav a { margin-right: 15px; }
        .alert { padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; }
        .alert-success { background-color: #d4edda; color: #155724; }
        .alert-error { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>

    <nav>
        <a href="{{ url('/') }}">Home</a>

        @auth
            <a href="{{ route('admin.jogadores.index') }}">Jogadores</a>
            <a href="{{ route('admin.perfil') }}">Meu Perfil</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
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
