<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Inscription</title>
    <link rel="stylesheet" href="{{ asset('Connexion_style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>

<body>
<div class="container">

    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    <!-- GAUCHE : logo + récap séance -->

    <div class="logo-section booking-section">
        <a href="/" class="logo">
            <img src="{{ asset('images/logo_CineForAll.png') }}" alt="CineForAll">
        </a>

        @if($seance)
            <div class="booking-card">
                <div class="booking-poster">
                    <img src="{{asset('images/'.$seance->film->imgFil)}}">
                </div>

                <div class="booking-info">
                    <p><strong>Film :</strong> {{$seance->film->titreFil}} <span class="booking-badge"> {{$seance->typeSeance->libTypeSea}} </span></p>
                    <p><strong>Salle :</strong> {{$seance->salle->numSal}} </p>
                    <p><strong>Horaire :</strong> {{\Carbon\Carbon::parse($seance->dateHeurSea)->format('H\hi - d/m')}} </p>
                </div>
            </div>
        @endif
    </div>

    <!-- DROITE : formulaire -->
    @@ -65,7 +74,7 @@
    </form>

    <div class="login-link">
        Déjà inscrit ? <a href="{{ route('login_reservationPOST', ['seance' => $seance->idSea ?? null]) }}">Se connecter ici</a>
    </div>
</div>
</div>

</div>
</body>
</html>
