<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Connexion</title>
    <link rel="stylesheet" href="{{ asset('Connexion_style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>

<body>
<div class="container">

    <!-- GAUCHE : logo + récap séance -->
    <div class="logo-section booking-section">
        <a href="/" class="logo">
            <img src="{{ asset('images/logo_CineForAll.png') }}" alt="CineForAll">
        </a>

        <div class="booking-card">
            <div class="booking-poster">
                <img src="https://www.themoviedb.org/t/p/w1280/3tbnGsJpxtndRkxHeq3uq7VymzI.jpg" alt="Running man">
            </div>

            <div class="booking-info">
                <p><strong>Film :</strong> Running man <span class="booking-badge">VF</span></p>
                <p><strong>Salle :</strong> 10</p>
                <p><strong>Horaire :</strong> 14H10 – 30/11</p>
            </div>
        </div>
    </div>

    <!-- DROITE : formulaire -->
    <div class="form-section">
        <div class="form-card">
            <h1>Connexion</h1>

            <form method="POST" action="{{ route('login_reservation') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Nom d'utilisateur:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div>
                    <input type="checkbox" name="remember"> Se souvenir de moi
                </div>

                <button type="submit" class="submit-btn">Se connecter</button>
            </form>

            <div class="login-link">
                Déjà inscrit ? <a href="/inscription_reservation">S'inscrire ici</a>
            </div>
        </div>
    </div>

</div>
</body>
</html>
