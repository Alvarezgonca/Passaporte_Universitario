<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        return view('perfil.index');
    }

    public function edit()
    {
        return view('perfil.edit');
    }

    public function update(Request $request)
    {
        // Lógica para atualizar o perfil do usuário
        // ...

        return redirect()->route('perfil.index')->with('success', 'Perfil atualizado com sucesso!');
    }
    public function destroy(Request $request)
    {
        // Lógica para deletar o perfil do usuário
        // ...

        return redirect()->route('home')->with('success', 'Perfil deletado com sucesso!');
    }
}
