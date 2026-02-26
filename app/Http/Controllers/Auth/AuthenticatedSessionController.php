<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   


public function store(Request $request): \Illuminate\Http\RedirectResponse
{
    $request->validate([
        'email' => ['required', 'string', 'email'],
        'cpf' => ['required', 'string'],
    ]);

    $cpf = trim($request->cpf);

    $user = \App\Models\User::where('email', $request->email)
        ->where('cpf', $cpf)
        ->first();

    if (!$user) {
        return back()
            ->withErrors(['email' => 'Email ou CPF inválidos.'])
            ->onlyInput('email');
    }

    \Illuminate\Support\Facades\Auth::login($user, $request->boolean('remember'));

    $request->session()->regenerate();

    return redirect()->intended(route('dashboard', absolute: false));
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
