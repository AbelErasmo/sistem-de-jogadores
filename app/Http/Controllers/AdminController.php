<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jogador;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {
        $jogadores = Jogador::with('user')->get();
        return view('admin.dashboard', compact('jogadores'));
    }

    public function index()
    {
        $admin = auth()->user();
        $jogadores = Jogador::with('user')->get();
        return view('admin.jogadores.index', compact('jogadores'));
    }

    public function edit($id)
    {
        $admin = auth()->user();
        $jogador = Jogador::with('user')->findOrFail($id);
        return view('admin.jogadores.edit', compact('jogador'));
    }

    public function update(Request $request, $id)
    {
        $jogador = Jogador::findOrFail($id);
        $user = $jogador->user;

        $validacao = $request->validate([
            'apelido' => 'required|string|max:255',
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'username' => 'required|string|max:45|unique:users,username,' . $user->id_user . ',id_user',
            'email' => 'required|email|max:45|unique:users,email,' . $user->id_user . ',id_user',
            'senha' => 'nullable|string|min:8',
            'role_id' => 'required|exists:roles,id_role'
        ]);

        $jogador->update([
            'apelido' => $validacao['apelido'],
            'nome' => $validacao['nome'],
            'data_nascimento' => $validacao['data_nascimento'],
        ]);

        $userData = [
            'username' => $validacao['username'],
            'email' => $validacao['email'],
            'role_id' => $validacao['role_id'],
        ];

        if (!empty($validacao['senha'])) {
            $userData['password'] = $validacao['senha'];
        }

        $user->update($userData);

        return redirect()->route('admin.jogadores.index')->with('success', 'Jogador atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $jogador = Jogador::findOrFail($id);
        $user = $jogador->user;

        $jogador->delete();
        if ($user) {
            $user->delete();
        }

        return redirect()->route('admin.jogadores.index')->with('success', 'Jogador apagado com sucesso!');
    }

    public function perfil()
    {
        $admin = auth()->user();
        return view('admin.perfil', compact('admin'));
    }

    public function perfilUpdate(Request $request)
    {
        $admin = auth()->user();

        $validacao = $request->validate([
            'username' => 'required|string|max:45|unique:users,username,' . $admin->id_user . ',id_user',
            'email' => 'required|email|max:45|unique:users,email,' . $admin->id_user . ',id_user',
            'senha' => 'nullable|string|min:8',
        ]);

        $userData = [
            'username' => $validacao['username'],
            'email' => $validacao['email'],
        ];

        if (!empty($validacao['senha'])) {
            $userData['password'] = $validacao['senha'];
        }

        $admin->update($userData);

        return redirect()->route('admin.perfil')->with('success', 'Perfil atualizado com sucesso!');
    }
}
