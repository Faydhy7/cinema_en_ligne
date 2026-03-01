<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ActeurController extends Controller
{
    public function index()
    {
        $acteurs = Personne::where('idRolePer', 1)->get();
        return view('pages.gestion-acteur', compact('acteurs'));
    }

    public function create()
    {
        return view('pages.ajout-acteur');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomPer' => 'required|string|max:255',
            'prenomPer' => 'required|string|max:255',
            'bioPer' => 'nullable|string',
            'dateNaisPer' => 'required|date',
            'lieuNaisPer' => 'required|string|max:255',
        ]);

        $dateNaissance = Carbon::parse($validated['dateNaisPer']);
        $ageCalcule = $dateNaissance->age;

        $acteur = new Personne();
        $acteur->nomPer = $validated['nomPer'];
        $acteur->prenomPer = $validated['prenomPer'];
        $acteur->bioPer = $validated['bioPer'] ?? null;
        $acteur->dateNaisPer = $validated['dateNaisPer'];
        $acteur->lieuNaisPer = $validated['lieuNaisPer'];
        $acteur->agePer = $ageCalcule;
        $acteur->idRolePer = 1;
        $acteur->save();

        return redirect()
            ->route('acteur.admin.gestion')
            ->with('success', 'Acteur ajouté');
    }

    public function show(Personne $personne)
    {
        //
    }

    public function edit($id)
    {
        $acteurs = Personne::where('idRolePer', 1)->find($id);
        return view('pages.edit-acteur', compact('acteurs'));
    }

    public function update(Request $request, $id)
    {
        $personne = Personne::where('idRolePer', 1)->find($id);

        $validated = $request->validate([
            'nomPer' => 'required|string|max:255',
            'prenomPer' => 'required|string|max:255',
            'bioPer' => 'nullable|string',
            'dateNaisPer' => 'required|date',
            'lieuNaisPer' => 'required|string|max:255',
        ]);

        $dateNaissance = Carbon::parse($validated['dateNaisPer']);
        $ageCalcule = $dateNaissance->age;

        $personne->nomPer = $validated['nomPer'];
        $personne->prenomPer = $validated['prenomPer'];
        $personne->bioPer = $validated['bioPer'] ?? null;
        $personne->dateNaisPer = $validated['dateNaisPer'];
        $personne->lieuNaisPer = $validated['lieuNaisPer'];
        $personne->agePer = $ageCalcule;
        $personne->idRolePer = 1;
        $personne->save();

        return redirect()->route('acteur.admin.gestion')->with('success', 'Acteur mis à jour');
    }

    public function destroy($id)
    {
        $acteur = Personne::where('idRolePer', 1)->find($id);
        $acteur->delete();

        return redirect()->route('acteur.admin.gestion')->with('success', 'Acteur supprimé');
    }
}
