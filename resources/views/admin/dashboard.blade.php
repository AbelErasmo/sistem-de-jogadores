@extends('layouts.app')

@section('title', 'Painel do Administrador')

@section('content')
<div class="dashboard">
    <h1>Painel do Administrador</h1>

    <div class="card">
        <h2>Lista de Jogadores</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Apelido</th>
                    <th>Nome</th>
                    <th>Username</th>
                    <th>Email</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
