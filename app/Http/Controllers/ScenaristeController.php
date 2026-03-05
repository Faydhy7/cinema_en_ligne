<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ScenaristeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scenaristes = Personne::where('idRolePer', 3)->get();
        return view('pages.gestion-scenariste', compact('scenaristes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.ajout-scenariste');
    }

    /**
     * Store a newly created resource in storage.
     */
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

        $scenariste = new Personne();
        $scenariste->nomPer = $validated['nomPer'];
        $scenariste->prenomPer = $validated['prenomPer'];
        $scenariste->bioPer = $validated['bioPer'];
        $scenariste->dateNaisPer = $validated['dateNaisPer'];
        $scenariste->lieuNaisPer = $validated['lieuNaisPer'];
        $scenariste->agePer = $ageCalcule;
        $scenariste->idRolePer = 3;

        $scenariste->save();
        return redirect()
            ->route('scenariste.admin.gestion')
            ->with('success', 'Scénariste ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $scenariste = Personne::where('idRolePer', 3)->find($id);

        return view('pages.personne-detail', [
            'personne' => $scenariste,
            'role' => 'acteur',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $scenaristes = Personne::where('idRolePer', 3)->find($id);
        return view('pages.edit-scenariste', compact('scenaristes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $personne = Personne::where('idRolePer', 3)->find($id);

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
        $personne->bioPer = $validated['bioPer'];
        $personne->dateNaisPer = $validated['dateNaisPer'];
        $personne->lieuNaisPer = $validated['lieuNaisPer'];
        $personne->idRolePer = 3;
        $personne->agePer = $ageCalcule;

        $personne->save();
        return redirect()
            ->route('scenariste.admin.gestion')
            ->with('success', 'Scénariste modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $scenariste = Personne::where('idRolePer', 3)->find($id);
        $scenariste->delete();

        return redirect ()
            ->route('scenariste.admin.gestion')->with('success', 'Scénariste supprimé');
    }
}
