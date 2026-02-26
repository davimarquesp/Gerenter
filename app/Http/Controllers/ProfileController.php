<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'cpf'   => ['required', 'string', 'max:14', 'unique:users,cpf,' . $user->id],
        ]);

        $user->update($data);

        return back()->with('success', 'Perfil atualizado com sucesso!');
    }
}