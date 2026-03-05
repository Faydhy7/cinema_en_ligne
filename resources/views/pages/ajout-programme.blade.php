<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Programmer une salle</title>

    <link rel="stylesheet" href="/styles.css" />
    <link rel="stylesheet" href="/programmes.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body class="add-actor-body">
@include('pages.header-admin')

<main class="add-actor-page add-program-page">
    <h1 class="add-actor-title">Programmer une salle</h1>

    <form class="add-actor-form" action="/programmes/generer" method="POST">
        @csrf

        <div class="add-actor-grid add-program-grid">

            {{-- CINÉMA --}}
            <div class="program-field">
                <label for="cinema_id" class="program-label">Cinéma</label>
                <select id="cinema_id" name="cinema_id" class="add-program-select" required>
                    <option value="">Choisir un cinéma</option>
                </select>
            </div>

            {{-- SALLE --}}
            <div class="program-field">
                <label for="salle_id" class="program-label">Salle</label>
                <select id="salle_id" name="salle_id" class="add-program-select" required>
                    <option value="">Choisir une salle</option>
                </select>
            </div>

            {{-- FILM --}}
            <div class="program-field">
                <label for="film_id" class="program-label">Film</label>
                <select id="film_id" name="film_id" class="add-program-select" required>
                    <option value="">Choisir un film</option>

                    @forelse($films as $film)
                        <option value="{{ $film->id }}">
                            {{ $film->titreFil }}
                            @if(!empty($film->dureFil))
                                ({{ intdiv($film->dureFil, 60) }}h{{ str_pad($film->dureFil % 60, 2, '0', STR_PAD_LEFT) }})
                            @endif
                        </option>
                    @empty
                        <option value="" disabled>Aucun film disponible</option>
                    @endforelse
                </select>
            </div>

            {{-- BATTEMENT --}}
            <div class="program-field">
                <label for="battement_minutes" class="program-label">Battement (min)</label>
                <input
                    type="number"
                    id="battement_minutes"
                    name="battement_minutes"
                    class="add-actor-input program-number-input"
                    min="0"
                    max="120"
                    step="5"
                    required
                    value="{{ old('battement_minutes', 15) }}"
                />
                <p class="program-help">
                    Temps entre deux séances.
                </p>
            </div>

            {{-- DATE DÉBUT --}}
            <div class="program-field">
                <label for="date_debut" class="program-label">Date début</label>
                <input
                    type="date"
                    id="date_debut"
                    name="date_debut"
                    class="add-actor-input program-date-input"
                    required
                    value="{{ old('date_debut') }}"
                />
            </div>

            {{-- DATE FIN --}}
            <div class="program-field">
                <label for="date_fin" class="program-label">Date fin (optionnel)</label>
                <input
                    type="date"
                    id="date_fin"
                    name="date_fin"
                    class="add-actor-input program-date-input"
                    value="{{ old('date_fin') }}"
                />
                <p class="program-help">
                    Laisser vide pour programmer un seul jour.
                </p>
            </div>

            {{-- PREMIÈRE SÉANCE --}}
            <div class="program-field">
                <label for="heure_premiere_seance" class="program-label">1re séance</label>
                <input
                    type="time"
                    id="heure_premiere_seance"
                    name="heure_premiere_seance"
                    class="add-actor-input program-time-input"
                    required
                    value="{{ old('heure_premiere_seance', '0:00') }}"
                />
            </div>

            {{-- DERNIÈRE SÉANCE AVANT --}}
            <div class="program-field">
                <label for="heure_limite" class="program-label">Dernière séance avant</label>
                <input
                    type="time"
                    id="heure_limite"
                    name="heure_limite"
                    class="add-actor-input program-time-input"
                    required
                    value="{{ old('heure_limite', '0:00') }}"
                />

            </div>

        </div>

        <div class="add-actor-actions">
            <button type="submit" class="add-actor-submit">Générer les séances</button>
        </div>
    </form>
</main>

</body>
</html>
