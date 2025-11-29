@extends('layouts.app')

@section('title', 'Editar Meus Dados')

@section('content')
<div class="container">
    <h1>Editar Meus Dados</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jogador.update') }}" method="POST">
        @csrf
        @method('PUT')

        <label>Apelido:</label>
        <input type="text" name="apelido" value="{{ old('apelido', $jogador->apelido) }}" required>

        <label>Nome completo:</label>
        <input type="text" name="nome" value="{{ old('nome', $jogador->nome) }}" required>

        <label>Data de nascimento:</label>
        <input type="date" name="data_nascimento" value="{{ old('data_nascimento', $jogador->data_nascimento) }}" required>

        <label>Username:</label>
        <input type="text" name="username" value="{{ old('username', $jogador->user->username) }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $jogador->user->email) }}" required>

        <label>Senha (deixe em branco para manter):</label>
        <input type="password" name="senha">

        <button type="submit">Atualizar</button>
    </form>
</div>
@endsection
