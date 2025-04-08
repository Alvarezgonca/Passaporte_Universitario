<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
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
    public function store(Request $request)
    {
        $document = preg_replace('/\D/', '', $request->input('document'));
        $request->merge(['document' => $document]);

        $request->validate([
            'document' => 'required|digits_between:11,14',
            'password' => 'required|string',
        ]);

        if (strlen($document) === 11 || strlen($document) === 14) {
            $credentials = [
                'document' => $document,
                'password' => $request->input('password'),
            ];
        } else {
            throw ValidationException::withMessages([
                'document' => 'Documento inválido. Informe um CPF ou CNPJ válido.'
            ]);
        }

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        throw ValidationException::withMessages([
            'document' => 'Documento ou senha inválidos.',
        ]);
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
