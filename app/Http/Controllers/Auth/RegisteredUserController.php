<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
  public function store(Request $request): \Illuminate\Http\RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
        'cpf' => ['required', 'string', 'max:14', 'unique:users,cpf'],
    ]);

    \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'cpf' => $request->cpf,
        // como você não quer senha, geramos uma aleatória só pra cumprir o model
        'password' => \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::random(32)),
    ]);

    // ✅ volta pro login com mensagem
    return redirect()->route('login')->with('status', 'Usuário cadastrado com sucesso! Faça login.');
}
}
