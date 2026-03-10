<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Langue;
use App\Models\TypeSalle;
use App\Models\TypeSeance;
use App\Models\Personne;
use Carbon\Carbon;

class FilmController extends Controller
{
    //Contrôle pour afficher tous les films dans la page tous les films
    public function index(Request $request)
    {
        // Genres (pour afficher les boutons)
        $genres = Genre::orderBy('libGenre')->get();

        // Genres sélectionnés via l'URL: /films?genres[]=1&genres[]=3
        $selectedGenres = array_map('intval', $request->input('genres', []));
        // on récupère la saisie de l'utilisateur
        $recherche = $request->input('recherche');
        // Requête films
        $query = Film::query();
        // Appliquer le filtre genre si nécessaire
        if (!empty($selectedGenres)) {
            $query->whereIn('idGenre', $selectedGenres);
        }
        // Si la variable $recherche n'est pas vide (l'utilisateur a tapé un mot)
        if (!empty($recherche)) {
            // On cherche les films dont le titre ressemble au mot tapé
            // Le '%' de chaque côté permet de trouver le nom du film même si on tape juste quelque lettre
            $query->where('titreFil', 'LIKE', '%' . $recherche . '%');
        }

        $films = $query->get();

        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('pages.Tous_films-admin', compact('films', 'genres', 'selectedGenres'));
        }

        return view('pages.Tous_films', compact('films', 'genres', 'selectedGenres'));
    }


    //Contrôle les films qui s'affiche dans la page d'accueil
    public function filmsAccueil(Request $request)
    {
        $recherche = $request->input('recherche');
        $filmsRecherche = null;

        if (!empty($recherche)) {
            $filmsRecherche = Film::where('titreFil', 'LIKE', '%' . $recherche . '%')->get();
        }

        $filmsAuCinema = Film::where('dateSortie', '<=', now())
            ->orderBy('dateSortie', 'desc')
            ->take(6)
            ->get();

        $filmsProchainement = Film::where('dateSortie', '>', now())
            ->orderBy('dateSortie', 'asc')
            ->take(6)
            ->get();

        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('pages.accueil-admin', compact('filmsAuCinema', 'filmsProchainement', 'filmsRecherche', 'recherche'));
        }

        return view('pages.accueil', compact('filmsAuCinema', 'filmsProchainement', 'filmsRecherche', 'recherche'));
    }


    public function filmsAuCinema(Request $request)
    {
        $genres = Genre::orderBy('libGenre')->get();
        $type_salles = TypeSalle::all();
        $langues = Langue::all();

        $selectedGenres = array_map('intval', $request->input('genres', []));
        $recherche  = $request->input('rechercheCine');

        $query = Film::has('seances');

        if (!empty($selectedGenres)) {
            $query->whereIn('idGenre', $selectedGenres);
        }
        if (!empty($recherche)) {
            $query->where('titreFil', 'LIKE', '%' . $recherche . '%');
        }

        $films = $query->get();

        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('pages.actuellement-au-cinema-admin', compact('films', 'genres', 'selectedGenres', 'type_salles', 'langues'));
        }
        return view('pages.actuellement-au-cinema', compact('films', 'genres', 'selectedGenres', 'type_salles', 'langues'));
    }

    public function show(Film $film)
    {
        $film->load('genre');

        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('pages.film', compact('film'));
        }
        return view('pages.film', compact('film'));
    }

    public function acteurdetail($id)
    {
        $acteur = Personne::whereHas('rolepersonne', function ($q) {
            $q->where('libRolePer', 'Acteur principal');
        })->findOrFail($id);

        return view('pages.personne-detail', [
            'personne' => $acteur,
            'role'     => 'acteur',
        ]);
    }

    public function realisateurdetail($id)
    {
        $realisateur = Personne::whereHas('rolepersonne', function ($q) {
            $q->where('libRolePer', 'Realisateur');
        })->findOrFail($id);

        return view('pages.personne-detail', [
            'personne' => $realisateur,
            'role'     => 'realisateur',
        ]);
    }

}
