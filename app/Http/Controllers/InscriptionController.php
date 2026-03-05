<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class InscriptionController extends Controller {
    public function showLogin()
    {
        return view('pages.Inscription')->with('success', 'Inscription réussie');
    }

    public function sign_in(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6'
        ], [
                'username.unique'   => "Ce nom d'utilisateur est déjà pris.",
                'password.min'      => "Le mot de passe doit contenir au moins 6 caractères."
            ]

        );

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('accueil')
            ->with('success', 'Inscription effectuée');
    }
}
