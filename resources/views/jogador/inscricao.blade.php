@extends('layouts.app')

@section('title', 'Inscrição de Jogador')

@section('content')
    <h1>Inscrição de Jogador</h1>

    <!-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif -->

    @if($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach($errors->all() as $erro)
                    <p>{{ $erro }}</p>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('jogador.store') }}" method="POST">
        @csrf

        <label>Apelido:</label>
        <input type="text" name="apelido" value="{{ old('apelido') }}">

        <label>Outros nomes:</label>
        <input type="text" name="nome" value="{{ old('nome') }}" >

        <label>Data de nascimento:</label>
        <input type="date" name="data_nascimento" value="{{ old('data_nascimento') }}">

        <label>Nome de usuário (username):</label>
        <input type="text" name="username" value="{{ old('username') }}" >

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" >

        <label>Senha:</label>
        <input type="password" name="senha" >

        <button type="submit">Se inscrever</button>
    </form>
@endsection
