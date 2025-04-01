<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function toggleTheme(Request $request)
    {
        // Verifique o tema atual e troque
        if ($request->session()->has('theme') && $request->session()->get('theme') === 'dark') {
            // Se já estiver em dark mode, mude para light mode
            $request->session()->put('theme', 'light');
        } else {
            // Caso contrário, defina para dark mode
            $request->session()->put('theme', 'dark');
        }

        return response()->json(['theme' => $request->session()->get('theme')]);
    }
}

