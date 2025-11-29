@extends('layouts.app')

@section('title', 'Editar Jogador')

@section('content')
<div class="container">
    <h1>Editar Jogador</h1>

    <form action="{{ route('admin.jogadores.update', $jogador->id_jogador) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Apelido:</label>
        <input type="text" name="apelido" value="{{ old('apelido', $jogador->apelido) }}" required>

        <label>Nome:</label>
        <input type="text" name="nome" value="{{ old('nome', $jogador->nome) }}" required>

        <label>Data de nascimento:</label>
        <input type="date" name="data_nascimento" value="{{ old('data_nascimento', $jogador->data_nascimento) }}" required>

        <label>Username:</label>
        <input type="text" name="username" value="{{ old('username', $jogador->user->username) }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $jogador->user->email) }}" required>

        <label>Senha (opcional):</label>
        <input type="password" name="senha">

        <label>Role:</label>
        <select name="role_id" required>
            <option value="1" {{ $jogador->user->role_id == 1 ? 'selected' : '' }}>Admin</option>
            <option value="2" {{ $jogador->user->role_id == 2 ? 'selected' : '' }}>Jogador</option>
        </select>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
