<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    public function reservation($IdSea)
    {
        if (!Auth::check()) {
            Session::put('reservation_seance', $IdSea);
            $seance = Seance::with(['film','salle','typeSeance'])
                ->find($IdSea);
            return view('pages.connexion_reservation', compact('seance'));
        }



        Reservation::firstOrCreate([
            'idUser' => Auth::id(),
            'idSea' => $IdSea
        ]);

        $cinema = \App\Models\Cinema::inRandomOrder()->first();
        return redirect()->route('seance.show', $cinema->idCin)->with('success', 'Réservation réussie');
    }
}
