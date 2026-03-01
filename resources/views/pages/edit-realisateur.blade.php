<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modifier un réalisateur</title>

    <link rel="stylesheet" href="/styles.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body class="add-actor-body">
@include('pages.header-admin')
<main class="add-actor-page">
    <h1 class="add-actor-title">Modifier un réalisateur</h1>

    <form class="add-actor-form" action="{{ route('realisateur.update', $realisateurs->idPer) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="add-actor-grid">
            <input
                type="text"
                name="nomPer"
                class="add-actor-input"
                placeholder="Nom"
                value="{{ $realisateurs->nomPer }}"
                required
            />

            <input
                type="text"
                name="prenomPer"
                class="add-actor-input"
                placeholder="Prénom"
                value="{{ $realisateurs->prenomPer }}"
                required
            />

            <input
                name="dateNaisPer"
                class="add-actor-input"
                placeholder="Date de naissance"
                value="{{ $realisateurs->dateNaisPer }}"
            />

            <input
                type="text"
                name="lieuNaisPer"
                class="add-actor-input"
                placeholder="Lieu de naissance"
                value="{{ $realisateurs->lieuNaisPer }}"
            />
        </div>

        <textarea
            name="bioPer"
            class="add-actor-textarea"
            placeholder="Biographie">{{ $realisateurs->bioPer }}
            </textarea>

        <div class="add-actor-actions">
            <button type="submit" class="add-actor-submit">Modifier</button>
        </div>
    </form>
</main>

</body>
</html>
