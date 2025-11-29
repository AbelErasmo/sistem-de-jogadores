<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class JogadorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['dashboard', 'edit', 'update']);
    }

    public function create()
    {
        return view('jogador.inscricao');
    }

 
    public function store(Request $request)
    {
        $validacao = $request->validate([
            'apelido' => 'required|string|max:255',
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'username' => 'required|string|max:45|unique:users,username',
            'email' => 'required|email|max:45|unique:users,email',
            'senha' => 'required|string|min:8',
        ]);

        $user = User::create([
            'username' => $validacao['username'],
            'email' => $validacao['email'],
            'password' => bcrypt($validacao['senha']),
            'role_id' => 2,
        ]);

        $jogador = Jogador::create([
            'apelido' => $validacao['apelido'],
            'nome' => $validacao['nome'],
            'data_nascimento' => $validacao['data_nascimento'],
            'user_id' => $user->id_user,
        ]);

        return redirect()->route('jogador.create')
            ->with('success', 'Você foi cadastrado com sucesso!');
    }

    public function dashboard()
    {
        $user = auth()->user();

        $jogador = $user->jogador;

        return view('jogador.dashboard', compact('jogador'));
    }

    public function edit()
    {
        $user = auth()->user();

        $jogador = $user->jogador;

        return view('jogador.editar', compact('jogador'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $jogador = $user->jogador;

        $validacao = $request->validate([
            'apelido' => 'required|string|max:255',
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'username' => 'required|string|max:45|unique:users,username,' . $user->id_user . ',id_user',
            'email' => 'required|email|max:45|unique:users,email,' . $user->id_user . ',id_user',
            'senha' => 'nullable|string|min:8',
        ]);

        $jogador->update([
            'apelido' => $validacao['apelido'],
            'nome' => $validacao['nome'],
            'data_nascimento' => $validacao['data_nascimento'],
        ]);

        $userData = [
            'username' => $validacao['username'],
            'email' => $validacao['email'],
        ];

        if (!empty($validacao['senha'])) {
            $userData['password'] = bcrypt($validacao['senha']);
        }

        $user->update($userData);

        return redirect()->route('jogador.dashboard')
            ->with('success', 'Seus dados foram atualizados com sucesso!');
    }
}
