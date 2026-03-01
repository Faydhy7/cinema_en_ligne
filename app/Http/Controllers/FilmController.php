<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
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

        return view('pages.Tous_films', compact('films', 'genres', 'selectedGenres'));
    }

    public function indexAdmin(Request $request)
    {
        $genres = Genre::orderBy('libGenre')->get();
        $selectedGenres = array_map('intval', $request->input('genres', []));
        $recherche = $request->input('recherche');
        $query = Film::query();
        if (!empty($selectedGenres)) {
            $query->whereIn('idGenre', $selectedGenres);
        }
        if (!empty($recherche)) {
            $query->where('titreFil', 'LIKE', '%' . $recherche . '%');
        }

        $films = $query->get();

        return view('pages.tous_films-admin', compact('films', 'genres', 'selectedGenres'));
    }

    //Contrôle les films qui s'affiche dans la page d'accueil
    public function filmsAccueil(){
        $filmsAuCinema = Film::where('dateSortie', '<=', now())
            ->orderBy('dateSortie', 'desc') // Les plus récents en premier
            ->take(6)
            ->get();
        $filmsProchainement = Film::where('dateSortie', '>', now())
            ->orderBy('dateSortie', 'asc')
            ->take(6)
            ->get();
        return view('pages.accueil', compact('filmsAuCinema', 'filmsProchainement'));
    }

    public function filmsAccueilAdmin()
    {
        $filmsAuCinema = Film::where('dateSortie', '<=', now())
            ->orderBy('dateSortie', 'desc')
            ->take(6)
            ->get();

        $filmsProchainement = Film::where('dateSortie', '>', now())
            ->orderBy('dateSortie', 'asc')
            ->take(6)
            ->get();

        return view('pages.accueil-admin', compact('filmsAuCinema', 'filmsProchainement'));
    }

    public function filmsAuCinema(Request $request)
    {

        $genres = Genre::orderBy('libGenre')->get();

        $selectedGenres = array_map('intval', $request->input('genres', []));

        $query = Film::query();

        if (!empty($selectedGenres)) {
            $query->whereIn('idGenre', $selectedGenres);
        }

        $films = $query->get();

        return view('pages.actuellement-au-cinema', compact('films', 'genres', 'selectedGenres'));
    }

    public function filmsAuCinemaAdmin(Request $request)
    {

        $genres = Genre::orderBy('libGenre')->get();

        $selectedGenres = array_map('intval', $request->input('genres', []));

        $query = Film::query();

        if (!empty($selectedGenres)) {
            $query->whereIn('idGenre', $selectedGenres);
        }

        $films = $query->get();

        return view('pages.actuellement-au-cinema-admin', compact('films', 'genres', 'selectedGenres'));
    }

    public function show(Film $film)
    {
        $film->load('genre');

        return view('pages.film', compact('film'));
    }

    public function showAdmin(Film $film)
    {
        $film->load('genre');

        return view('pages.film-admin', compact('film'));
    }

    public function destroy($id)
    {
        $film = \App\Models\Film::find($id);
        $film->delete();

        return redirect()->route('films.admin.gestion')->with('success', 'Film supprimé');
    }

    public function ajoutProgramme(Request $request)
    {
        $genres = Genre::orderBy('libGenre')->get();
        $selectedGenres = array_map('intval', $request->input('genres', []));

        $query = Film::with('genre');

        if (!empty($selectedGenres)) {
            $query->whereIn('idGenre', $selectedGenres);
        }

        $films = $query->get();

        return view('pages.ajout-programme', compact('films', 'genres', 'selectedGenres'));
    }

    public function create()
    {
        $genres = Genre::orderBy('libGenre')->get();

        return view('pages.ajout-film', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre'       => ['required', 'string', 'max:255'],
            'duree'       => ['required', 'string', 'max:50'],
            'synopsis'    => ['required', 'string'],
            'date_sortie' => ['required', 'date'],
//            'date_sortie' => ['required', 'date_format:d/m/Y'],

            'genres'      => ['required', 'array', 'min:1'],
            'genres.*'    => ['integer', 'exists:genre,idGenre'],

            'affiche'     => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ], [
            'titre.required' => 'Le titre est obligatoire.',
            'date_sortie.required' => 'La date de sortie est obligatoire.',
            'genres.required' => 'Veuillez sélectionner au moins un genre.',
            'genres.*.exists' => 'Un genre sélectionné est invalide.',
            'affiche.image' => 'Le fichier doit être une image.',
        ]);

        $genreId = (int) $validated['genres'][0];

        $imagePath = null;

        if ($request->hasFile('affiche')) {
            $file = $request->file('affiche');

            $filename = uniqid('film_', true) . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images/'), $filename);

            $imagePath =  $filename;
        }

        $film = new Film();

        $film->titreFil = $validated['titre'];
        $film->dureFil = $validated['duree'] ?? null;
        $film->descFil = $validated['synopsis'] ?? null;
        $film->dateSortie = $validated['date_sortie'];
        $film->idGenre = $genreId;

        $film->imgFil = $imagePath;

        $film->save();

        return redirect()
            ->route('films.admin.gestion')
            ->with('success', 'Film ajouté avec succès.');
    }

    public function edit($id)
    {
        $film = Film::findOrFail($id);
        $genres = Genre::all();

        return view('pages.edit-film', compact('film', 'genres'));
    }



    public function update(Request $request, $id)
    {
        $film = Film::find($id);

        $validated = $request->validate([
            'titre'       => ['required', 'string', 'max:255'],
            'duree'       => ['nullable', 'string', 'max:50'],
            'synopsis'    => ['nullable', 'string'],
            'date_sortie' => ['required', 'date'],

            'genres'      => ['required', 'array', 'min:1'],
            'genres.*'    => ['integer', 'exists:genre,idGenre'],

            'affiche'     => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        $film->titreFil = $validated['titre'];
        $film->dureFil  = $validated['duree'] ?? null;
        $film->descFil  = $validated['synopsis'] ?? null;

        $film->dateSortie = Carbon::createFromFormat('d/m/Y', $validated['date_sortie'])->format('Y-m-d');

        $film->idGenre = (int) $validated['genres'][0];

        // Affiche (optionnelle)
        if ($request->hasFile('affiche')) {
            $file = $request->file('affiche');
            $filename = uniqid('film_', true) . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images'), $filename);
            $film->imgFil = $filename;
        }

        $film->save();

        return redirect()
            ->route('films.admin.gestion')
            ->with('success', 'Film modifié avec succès.');
    }

}
