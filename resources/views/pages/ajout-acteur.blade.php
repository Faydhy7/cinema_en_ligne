<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajouter un acteur</title>

    <link rel="stylesheet" href="/styles.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body class="add-actor-body">
@include('pages.header-admin')
<main class="add-actor-page">
    <h1 class="add-actor-title">Ajouter un acteur</h1>

    <form class="add-actor-form" action="{{ route('acteur.store') }}" method="POST">
        @csrf
        <div class="add-actor-grid">
            <input
                type="text"
                name="nomPer"
                class="add-actor-input"
                placeholder="Nom"
                required
            />

            <input
                type="text"
                name="prenomPer"
                class="add-actor-input"
                placeholder="Prénom"
                required
            />

            <input
                name="dateNaisPer"
                class="add-actor-input"
                placeholder="Date de naissance"
            />

            <input
                type="text"
                name="lieuNaisPer"
                class="add-actor-input"
                placeholder="Lieu de naissance"
            />
        </div>

        <textarea
            name="bioPer"
            class="add-actor-textarea"
            placeholder="Biographie"
        ></textarea>

        <div class="add-actor-actions">
            <button type="submit" class="add-actor-submit">Ajouter</button>
        </div>
    </form>
</main>

</body>
</html>
