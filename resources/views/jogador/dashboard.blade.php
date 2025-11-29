@extends('layouts.app')

@section('title', 'Meu Dashboard')

@section('content')
<div class="dashboard">
    <h1>Meu Dashboard</h1>

    <div class="card">
        <h2>Informações do Jogador</h2>
        <ul>
            <li><strong>Apelido:</strong> {{ $jogador->apelido }}</li>
            <li><strong>Nome completo:</strong> {{ $jogador->nome }}</li>
            <li><strong>Data de nascimento:</strong> {{ \Carbon\Carbon::parse($jogador->data_nascimento)->format('d/m/Y') }}</li>
            <li><strong>Username:</strong> {{ $jogador->user->username }}</li>
            <li><strong>Email:</strong> {{ $jogador->user->email }}</li>
        </ul>
    </div>

    <div class="actions">
        <a href="{{ route('jogador.editar') }}" class="btn btn-primary">Editar meus dados</a>
    </div>
</div>

<style>
    .dashboard h1 {
        margin-bottom: 20px;
        color: #004085;
    }
    .card {
        background: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
    .card h2 {
        margin-bottom: 15px;
        color: #333;
    }
    .card ul {
        list-style: none;
        padding: 0;
    }
    .card li {
        margin-bottom: 10px;
    }
    .actions {
        text-align: right;
    }
    .btn {
        display: inline-block;
        padding: 10px 15px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
    }
    .btn-primary {
        background: #004085;
        color: #fff;
    }
    .btn-primary:hover {
        background: #002752;
    }
</style>
@endsection
