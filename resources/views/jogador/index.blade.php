@extends('layouts.app')

@section('title', 'Lista de Jogadores')

@section('content')
<div class="container">
    <h1>Jogadores</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Apelido</th>
                <th>Nome</th>
                <th>Username</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jogadores as $jogador)
            <tr>
                <td>{{ $jogador->id_jogador }}</td>
                <td>{{ $jogador->apelido }}</td>
                <td>{{ $jogador->nome }}</td>
                <td>{{ $jogador->user->username }}</td>
                <td>{{ $jogador->user->email }}</td>
                <td>
                    <a href="{{ route('admin.jogadores.edit', $jogador->id_jogador) }}">Editar</a> |
                    <form action="{{ route('admin.jogadores.destroy', $jogador->id_jogador) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Tem certeza?')">Apagar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
