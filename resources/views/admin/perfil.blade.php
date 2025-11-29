@extends('layouts.app')

@section('title', 'Meu Perfil')

@section('content')
<div class="container">
    <h1>Meu Perfil</h1>

    <form action="{{ route('admin.perfil.update') }}" method="POST">
        @csrf
        @method('PUT')

        <label>Username:</label>
        <input type="text" name="username" value="{{ old('username', $admin->username) }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $admin->email) }}" required>

        <label>Senha (opcional):</label>
        <input type="password" name="senha">

        <button type="submit" class="btn btn-primary">Atualizar Perfil</button>
    </form>
</div>
@endsection