@extends('layouts.app')

@section('title', 'Gerenciar Jogadores')

@section('content')
<div class="container">
    <h1>Lista de todos Jogadores</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table>
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
                    <a href="{{ route('admin.jogadores.edit', $jogador->id_jogador) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('admin.jogadores.destroy', $jogador->id_jogador) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Tem certeza?')">Apagar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
