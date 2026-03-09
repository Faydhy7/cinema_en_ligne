<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function reservation($IdSea)
    {
        Reservation::firstOrCreate([
            'idUser' => Auth::id(),
            'idSea' => $IdSea
        ]);

        return back()->with('success', 'Réservation réussie');
    }
}
