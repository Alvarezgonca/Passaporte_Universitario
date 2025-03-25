<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function toggleDarkMode(Request $request)
    {
        // Armazenar a preferencia de tema do usuário
        session(['dark-mode' => $request->darkMode]);

        return response()->json(['success' => true]);
    }
}
