@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container">
    <h1>Login</h1>

    @if($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" >

        <label>Senha:</label>
        <input type="password" name="password" >

        <button type="submit">Entrar</button>
    </form>

    <p>Jogador não inscrito? <a href="{{ route('jogador.create') }}">Inscreva-se</a></p>
</div>
@endsection
