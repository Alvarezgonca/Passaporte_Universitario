<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

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
    public function store(Request $request)
    {
        // Limpa o documento antes da validação (remove pontos, traços, barras etc)
        $cleanDocument = preg_replace('/\D/', '', $request->document);

        // Substitui o valor original do request para garantir que o validate funcione corretamente
        $request->merge(['document' => $cleanDocument]);

        // Validação dos dados enviados
        $request->validate([
            'name'     => 'required|string|max:255',
            'document' => [
                'required',
                'string',
                'regex:/^(\d{11}|\d{14})$/', // 11 dígitos (CPF) ou 14 (CNPJ)
                'unique:users,document',
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'document.regex' => 'O documento deve conter 11 dígitos (CPF) ou 14 dígitos (CNPJ), apenas números.',
        ]);

        // Cria o usuário com os dados informados
        $user = User::create([
            'name'     => Str::title($request->name),
            'document' => $cleanDocument,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);
        $request->session()->regenerate();


        return redirect()->route('home')->with('success', 'Cadastro realizado com sucesso! Você está logado.');
    }

}
