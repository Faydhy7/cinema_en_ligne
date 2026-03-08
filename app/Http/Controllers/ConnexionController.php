<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller {
    public function showLogin()
    {
        return view('pages.Connexion');
    }

    public function login(Request $request)
    {
        //dd("Connexion OK");

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');
        $remember = $request->has('remember');

        //dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('accueil')
                ->with('success', 'Connexion effectuée');
        }

        return back()->withErrors([
            'username' => 'Identifiants incorrects'
        ]);

    }

    public function login_reservation(Request $request)
    {
        //dd("Connexion OK");

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');
        $remember = $request->has('remember');

        //dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            //ajouter prise en charge reservation  ici
            return redirect()->route('seance')
                ->with('success', 'Connexion effectuée');
        }

        return back()->withErrors([
            'username' => 'Identifiants incorrects'
        ]);

    }
}
