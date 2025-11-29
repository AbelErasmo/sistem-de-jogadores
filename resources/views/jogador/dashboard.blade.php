@extends('layouts.app')

@section('title', 'Meu Dashboard')

@section('content')
<div class="container">
    <h1>Meu Dashboard</h1>

    <p><strong>Apelido:</strong> {{ $jogador->apelido }}</p>
    <p><strong>Nome completo:</strong> {{ $jogador->nome }}</p>
    <p><strong>Data de nascimento:</strong> {{ $jogador->data_nascimento }}</p>
    <p><strong>Username:</strong> {{ $jogador->user->username }}</p>
    <p><strong>Email:</strong> {{ $jogador->user->email }}</p>

    <a href="{{ route('jogador.editar') }}">Editar meus dados</a>
</div>
@endsection
