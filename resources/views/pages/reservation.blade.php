<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Sélection des tarifs</title>

    <link rel="stylesheet" href="{{ asset('styles.css') }}">

    <!-- Font (si pas déjà incluse ailleurs) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>

<body class="reservation-body">
<!-- Header simple (logo en haut à gauche comme sur ta capture) -->
<header class="reservation-header">
    <a class="reservation-logo" href="/" aria-label="Retour accueil">
        <!-- Remplace par ton logo -->
        <img src="{{ asset('images/logo_CineForAll.png') }}"
             width="80"
             height="71">
    </a>
</header>

<main>
    <h1 class="page-title">Sélectionnez vos tarifs</h1>

    <!-- On réutilise ton layout “film-detail” pour obtenir 2 colonnes centrées -->
    <div class="film-detail-wrap">
        <div class="film-detail-card reservation-card">
            <!-- Colonne gauche : affiche -->
            <aside class="film-detail-left">
                <div class="film-detail-poster">
                    <img
                        src="/images/posters/running-man.jpg"
                        alt="Affiche du film Running Man"
                    />
                </div>
            </aside>

            <!-- Colonne droite : tarifs + récap -->
            <section class="film-detail-right">
                <!-- Tarifs -->
                <div class="reservation-tariffs" aria-label="Sélection des tarifs">

                    <div class="reservation-tariff-row" data-price="1390">
                        <div class="reservation-tariff-name">Plein tarif</div>
                        <div class="reservation-tariff-controls">
                            <div class="reservation-price">13.90€</div>

                            <button type="button" class="reservation-qty-btn reservation-qty-btn--minus" data-action="minus">−</button>
                            <span class="reservation-qty" data-qty aria-live="polite">1</span>
                            <button type="button" class="reservation-qty-btn reservation-qty-btn--plus" data-action="plus">+</button>

                            <input type="hidden" name="qty_full" value="1" />
                        </div>
                    </div>

                    <div class="reservation-tariff-row" data-price="720">
                        <div class="reservation-tariff-name">Etudiant</div>
                        <div class="reservation-tariff-controls">
                            <div class="reservation-price">7.20€</div>

                            <button type="button" class="reservation-qty-btn reservation-qty-btn--minus" data-action="minus">−</button>
                            <span class="reservation-qty" data-qty aria-live="polite">1</span>
                            <button type="button" class="reservation-qty-btn reservation-qty-btn--plus" data-action="plus">+</button>

                            <input type="hidden" name="qty_student" value="1" />
                        </div>
                    </div>

                    <div class="reservation-tariff-row" data-price="450">
                        <div class="reservation-tariff-name">Moins de 14 ans</div>
                        <div class="reservation-tariff-controls">
                            <div class="reservation-price">4.50€</div>

                            <button type="button" class="reservation-qty-btn reservation-qty-btn--minus" data-action="minus">−</button>
                            <span class="reservation-qty" data-qty aria-live="polite">0</span>
                            <button type="button" class="reservation-qty-btn reservation-qty-btn--plus" data-action="plus">+</button>

                            <input type="hidden" name="qty_child" value="0" />
                        </div>
                    </div>

                </div>

                <!-- Récap -->
                <div class="film-detail-meta reservation-summary">
                    <p><span class="meta-label">Film :</span> Running man <span class="meta-label">VF</span></p>
                    <p><span class="meta-label">Salle :</span> 10</p>
                    <p><span class="meta-label">Horaire :</span> 14h10 – 30/11</p>

                    <p>
                        <span class="meta-label">Nombres de places :</span>
                        <span id="placesLines"></span>
                    </p>
                </div>

                <p class="cinema-city reservation-total">
                    <strong>Total a régler :</strong> <span id="totalValue"></span>
                </p>
            </section>
        </div>
    </div>
</main>

<!-- Footer CTA (barre rouge comme sur ta capture) -->
<footer class="reservation-footer">
    <form action="/reservation/valider" method="post" class="reservation-footer-form">
        @csrf
        <button type="submit" class="filters-apply reservation-submit">
            Validez la réservation ›
        </button>
    </form>
</footer>
@vite('resources/js/reservation.js')
</body>
</html>
