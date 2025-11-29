@extends('layouts.app')

@section('title', 'Meu Perfil')

@section('content')
<div class="container">
    <h1>Meu Perfil</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.perfil.update') }}" method="POST">
        @csrf
        @method('POST')

        <label>Username:</label>
        <input type="text" name="username" value="{{ old('username', $admin->username) }}" required>
        <br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $admin->email) }}" required>
        <br>

        <label>Senha (deixe em branco para manter):</label>
        <input type="password" name="senha">
        <br><br>

        <button type="submit">Atualizar Perfil</button>
    </form>
</div>
@endsection
