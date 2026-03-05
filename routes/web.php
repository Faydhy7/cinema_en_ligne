<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ActeurController;
use App\Http\Controllers\RealisateurController;
use App\Http\Controllers\ScenaristeController;
use App\Http\Controllers\FilmAdminController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\DeconnexionController;

//Route::get('/', function () {
//    return view('pages.accueil');
//})->name('accueil');
//
//Route::get('/accueil', function () {
//    return view('pages.accueil');
//})->name('accueil');

//route de test
/*Route::get('/accueil', function () {
    return "Connexion effectuée";
})->name('accueil');*/

Route::get('/', [FilmController::class, 'filmsAccueil'])->name('accueil');

Route::get('/connexion', function () {
    return view('pages.connexion');
});
Route::post('/connexion', [ConnexionController::class, 'login'])->name('login');

Route::post('/deconnexion', [DeconnexionController::class, 'logout'])->name('logout');

Route::get('/inscription', function () {
    return view('pages.Inscription');
});
Route::post('/inscription', [InscriptionController::class, 'sign_in'])->name('sign-in');

Route::get('/seance', function () {
    return view('pages.seance');
});

Route::get('/connexion_reservation', function () {
    return view('pages.connexion_reservation');
});

Route::get('/gestion-acteur', function () {
    return view('pages.gestion-acteur');
});

Route::get('/gestion-realisateur', function () {
    return view('pages.gestion-realisateur');
});

Route::get('/gestion-scenariste', function () {
    return view('pages.gestion-scenariste');
});

Route::get('/gestion-cinema', function () {
    return view('pages.gestion-cinema');

});

Route::get('/gestion-programmation', function () {
    return view('pages.gestion-programmation');
});

Route::get('/inscription_reservation', function () {
    return view('pages.inscription_reservation');
});

  /*
Route::get('/ajout-cinema', function () {
    return view('pages.ajout-cinema');
});

Route::get('/reservation', function () {
    return view('pages.reservation');
});


Route::get('/tous-les-films', [FilmController::class, 'index'])->name('films.index');

Route::get('/actuellement-au-cinema', [FilmController::class, 'filmsAuCinema'])->name('films.cinema');

Route::get('/films/{film}', [FilmController::class, 'show'])->name('films.show');




//Admin

Route::get('/tous-les-films-admin', [FilmAdminController::class, 'tousFilm'])->name('films.admin.index');

Route::get('/actuellement-au-cinema-admin', [FilmAdminController::class, 'filmsAuCinemaAdmin'])->name('films.admin.cinema');

Route::get('/accueil-admin', [FilmAdminController::class, 'filmsAccueilAdmin'])->name('accueil.admin');

Route::get('/films-admin/{film}', [FilmAdminController::class, 'show'])->name('films.admin.show');

Route::get('/gestion-films', [FilmAdminController::class, 'index'])->name('films.admin.gestion');

Route::delete('/films/{film}', [FilmAdminController::class, 'destroy'])->name('films.destroy');

Route::get('/ajout-programme', [FilmAdminController::class, 'ajoutProgramme'])->name('ajout.programme');

Route::get('/ajout-film/ajouter', [FilmAdminController::class, 'create'])->name('film.create');

Route::post('/ajout-film/ajouter', [FilmAdminController::class, 'store'])->name('film.store');

Route::get('/admin/films/{id}/edit', [FilmAdminController::class, 'edit'])->name('film.edit');

Route::put('/admin/films/{id}', [FilmAdminController::class, 'update'])->name('film.update');
*/
Route::get('/ajout-acteur', function () {
    return view('pages.ajout-acteur');
});

Route::get('/ajout-realisateur', function () {
    return view('pages.ajout-realisateur');
});

Route::get('/ajout-scenariste', function () {
    return view('pages.ajout-scenariste');
});

Route::get('/ajout-cinema', function () {
    return view('pages.ajout-cinema');
});


Route::get('/tous-les-films', [FilmController::class, 'index'])->name('films.index');

Route::get('/tous-les-films-admin', [FilmController::class, 'indexAdmin'])->name('films.admin.index');

Route::get('/actuellement-au-cinema', [FilmController::class, 'filmsAuCinema'])->name('films.cinema');

Route::get('/actuellement-au-cinema-admin', [FilmController::class, 'filmsAuCinemaAdmin'])->name('films.admin.cinema');

Route::get('/', [FilmController::class, 'filmsAccueil'])->name('accueil');

Route::get('/accueil-admin', [FilmController::class, 'filmsAccueilAdmin'])->name('accueil.admin');

Route::get('/films/{film}', [FilmController::class, 'show'])->name('films.show');

Route::get('/films-admin/{film}', [FilmController::class, 'showAdmin'])->name('films.admin.show');

Route::get('/gestion-films', [FilmController::class, 'index'])->name('films.admin.gestion');

Route::delete('/films/{film}', [FilmController::class, 'destroy'])->name('films.destroy');

Route::get('/ajout-programme', [FilmController::class, 'ajoutProgramme'])->name('ajout.programme');

Route::get('/ajout-film/ajouter', [FilmController::class, 'create'])->name('film.create');

Route::post('/ajout-film/ajouter', [FilmController::class, 'store'])->name('film.store');

Route::get('/admin/films/{id}/edit', [FilmController::class, 'edit'])->name('film.edit');

Route::put('/admin/films/{id}', [FilmController::class, 'update'])->name('film.update');

//Acteur

Route::get('/ajout-acteur/ajouter', [ActeurController::class, 'create'])->name('acteur.create');

Route::get('/gestion-acteur', [ActeurController::class, 'index'])->name('acteur.admin.gestion');

Route::post('/ajout-acteur/ajouter', [ActeurController::class, 'store'])->name('acteur.store');

Route::get('/admin/acteur/{id}/edit', [ActeurController::class, 'edit'])->name('acteur.edit');

Route::put('/admin/acteur/{id}', [ActeurController::class, 'update'])->name('acteur.update');

Route::delete('/acteur/{id}', [ActeurController::class, 'destroy'])->name('acteur.destroy');

//Réalisateur

Route::get('/gestion-realisateur', [RealisateurController::class, 'index'])->name('realisateur.admin.gestion');

Route::get('/ajout-realisateur/ajouter', [RealisateurController::class, 'create'])->name('realisateur.create');

Route::post('/ajout-realisateur/ajouter', [RealisateurController::class, 'store'])->name('realisateur.store');

Route::get('/admin/realisateur/{id}/edit', [RealisateurController::class, 'edit'])->name('realisateur.edit');

Route::put('/admin/realisateur/{id}', [RealisateurController::class, 'update'])->name('realisateur.update');

Route::delete('/realisateur/{id}', [RealisateurController::class, 'destroy'])->name('realisateur.destroy');

//Scénariste

Route::get('/gestion-scenariste', [ScenaristeController::class, 'index'])->name('scenariste.admin.gestion');

Route::get('/ajout-scenariste/ajouter', [ScenaristeController::class, 'create'])->name('scenariste.create');

Route::post('/ajout-scenariste/ajouter', [ScenaristeController::class, 'store'])->name('scenariste.store');

Route::get('/admin/scenariste/{id}/edit', [ScenaristeController::class, 'edit'])->name('scenariste.edit');

Route::put('/admin/scenariste/{id}', [ScenaristeController::class, 'update'])->name('scenariste.update');

Route::delete('/scenariste/{id}', [ScenaristeController::class, 'destroy'])->name('scenariste.destroy');

//page seance et redirection vers un film aleatoire
Route::get('/seance/{cinema}', [CinemaController::class, 'show'])->name('seance.show');
Route::get('/seance', function () {
    $cinema = \App\Models\Cinema::inRandomOrder()->first();
    return redirect()->route('seance.show', $cinema->idCin);
});

