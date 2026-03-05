<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RealisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $realisateurs = Personne::where('idRolePer', 2)->get();
        return view('pages.gestion-realisateur', compact('realisateurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.ajout-realisateur');
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

        $realisateur = new Personne();
        $realisateur->nomPer = $validated['nomPer'];
        $realisateur->prenomPer = $validated['prenomPer'];
        $realisateur->bioPer = $validated['bioPer'];
        $realisateur->dateNaisPer = $validated['dateNaisPer'];
        $realisateur->lieuNaisPer = $validated['lieuNaisPer'];
        $realisateur->agePer = $ageCalcule;
        $realisateur->idRolePer = 2;

        $realisateur->save();
        return redirect()
            ->route('realisateur.admin.gestion')
            ->with('success', 'Réalisateur ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $realisateur = Personne::where('idRolePer', 2)->find($id);

        return view('pages.personne-detail', [
            'personne' => $realisateur,
            'role' => 'acteur',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $realisateurs = Personne::where('idRolePer', 2)->find($id);
        return view('pages.edit-realisateur', compact('realisateurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $personne = Personne::where('idRolePer', 2)->find($id);

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
        $personne->agePer = $ageCalcule;
        $personne->idRolePer = 2;

        $personne->save();
        return redirect()
            ->route('realisateur.admin.gestion')
            ->with('success', 'Réalisateur modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $realisateurs = Personne::where('idRolePer', 2)->find($id);
        $realisateurs->delete();
        return redirect()->route('realisateur.admin.gestion')->with('success', 'Réalisateur supprimé');

    }
}
