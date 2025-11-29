<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException; 
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role_id == 1) {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Bem-vindo, Admin!');
            } else {
                return redirect()->route('jogador.dashboard')
                    ->with('success', 'Bem-vindo, Jogador!');
            }
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ])->withInput();
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout realizado com sucesso.');
    }



    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $user = User::where('email', $request->email)->first();

    //     if (!$user || !Hash::check($request->password, $user->password)) {
    //         throw ValidationException::withMessages([
    //             'email' => ['As credenciais fornecidas estão incorretas.'],
    //         ]);
    //     }
        
    //     $tokenName = $request->device_name ?: 'auth_token';
        
    //     $abilities = ['role_user'];

    //     if ($user->role_id == 1) {
    //         $abilities[] = 'role_admin';
    //     }

    //     $token = $user->createToken($tokenName, $abilities)->plainTextToken;

    //     return response()->json([
    //         'token' => $token,
    //         'user' => $user->only(['id_user', 'username', 'email', 'role_id']),
    //         'message' => 'Login realizado com sucesso.'
    //     ]);
    // }

}