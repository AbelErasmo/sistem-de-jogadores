@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<h1>Dashboard do Administrador</h1>

<table border="1">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jogadores as $jogador)
        <tr>
            <td>{{ $jogador->nome }}</td>
            <td>{{ $jogador->user->username }}</td>
            <td>{{ $jogador->user->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
