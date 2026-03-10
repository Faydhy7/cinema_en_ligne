<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;
use App\Models\Film;
use App\Models\Tarif;

class CinemaController extends Controller
{
    public function show(Cinema $cinema)
    {
        // Tous les autres cinémas pour les chips
        $tousCinemas = Cinema::where('idCin', '!=', $cinema->idCin)->get();

        // Films qui ont des séances dans CE cinéma, avec leurs séances filtrées
        $films = Film::with([
            'genre',
            'seances' => function ($q) use ($cinema) {
                $q->whereHas('salle', function ($q2) use ($cinema) {
                    $q2->where('idCin', $cinema->idCin);
                })
                    ->with(['salle.typeSalle', 'typeSeance', 'langue'])
                    ->orderBy('dateHeurSea');
            }
        ])
            ->whereHas('seances.salle', function ($q) use ($cinema) {
                $q->where('idCin', $cinema->idCin);
            })
            ->get();

        // Tarifs pour le popup
        $tarifs = Tarif::all();

        // Types de salles uniques de ce cinéma pour le popup
        $cinema->load('salles.typeSalle');
        $typesSalles = $cinema->salles->map(fn($s) => $s->typeSalle->libTypSal ?? null)
            ->filter()
            ->unique()
            ->values();

        return view('pages.seance', compact('cinema', 'tousCinemas', 'films', 'tarifs', 'typesSalles'));
    }

    public function create()
    {
        return view('pages.ajout-cinema');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomCin' => 'required|unique:cinema,nomCin',
            'adresse' => 'required',
            'ville' => 'required',
            'codePostal' => 'required|numeric',

        ]);
    }
}
