<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Film;
use App\Models\RolePersonne;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $acteur = RolePersonne::create(['libRolePer' => 'Acteur']);
        $realisateur = RolePersonne::create(['libRolePer' => 'Realisateur']);
        $scenariste = RolePersonne::create(['libRolePer' => 'Scenariste']);

        // 1. CRÉATION DES GENRES
        $action = Genre::create(['libGenre' => 'Action']);
        $scifi = Genre::create(['libGenre' => 'Science-Fiction']);
        $comedie = Genre::create(['libGenre' => 'Comedie']);
        $drame = Genre::create(['libGenre' => 'Drame']);
        $animation = Genre::create(['libGenre' => 'Animation']);
        $fantastique = Genre::create(['libGenre' => 'Fantastique']);
        $thriller = Genre::create(['libGenre' => 'Thriller']);

        // 2. CRÉATION DES FILMS (Un par genre)

        // Film d'Action (Passé)
        Film::create([
            'titreFil' => 'John Wick',
            'descFil' => 'Un ancien tueur a gages reprend du service.',
            'imgFil' => 'johnwick.jpg',
            'dureFil' => 101,
            'dateSortie' => '2014-10-24',
            'idGenre' => $action->idGenre
        ]);

        // Film de Science-Fiction (Passé)
        Film::create([
            'titreFil' => 'Avatar',
            'descFil' => 'Un marine paraplegique infiltre une planete extraterrestre.',
            'imgFil' => 'avatar.jpg',
            'dureFil' => 162,
            'dateSortie' => '2009-12-16',
            'idGenre' => $scifi->idGenre
        ]);

        // Film de Comédie (Passé)
        Film::create([
            'titreFil' => 'La Grande Vadrouille',
            'descFil' => 'Deux francais aident des aviateurs anglais.',
            'imgFil' => 'vadrouille.jpg',
            'dureFil' => 132,
            'dateSortie' => '1966-12-08',
            'idGenre' => $comedie->idGenre
        ]);

        // Film Dramatique (Passé)
        Film::create([
            'titreFil' => 'Titanic',
            'descFil' => 'Une romance historique sur le paquebot insubmersible.',
            'imgFil' => 'titanic.jpg',
            'dureFil' => 195,
            'dateSortie' => '1997-12-19',
            'idGenre' => $drame->idGenre
        ]);

        // Film d'Animation (Futur -> Prochainement)
        Film::create([
            'titreFil' => 'Le Roi Lion',
            'descFil' => 'Un jeune lion doit reprendre sa place legitime de roi.',
            'imgFil' => 'roilion.jpg',
            'dureFil' => 88,
            'dateSortie' => '2026-12-20',
            'idGenre' => $animation->idGenre
        ]);

        // Film Fantastique (Futur -> Prochainement)
        Film::create([
            'titreFil' => 'Harry Potter a l ecole des sorciers',
            'descFil' => 'Un orphelin decouvre qu il est un sorcier celebre.',
            'imgFil' => 'harrypotter.jpg',
            'dureFil' => 152,
            'dateSortie' => '2027-07-15',
            'idGenre' => $fantastique->idGenre
        ]);

        // Film Thriller (Futur -> Prochainement)
        Film::create([
            'titreFil' => 'Joker',
            'descFil' => 'La descente aux enfers d un comique rate a Gotham.',
            'imgFil' => 'joker.jpg',
            'dureFil' => 122,
            'dateSortie' => '2026-10-04',
            'idGenre' => $thriller->idGenre
        ]);
        Film::create([
            'titreFil' => 'Oppenheimer',
            'descFil' => 'L histoire de J. Robert Oppenheimer et la création de la bombe atomique.',
            'imgFil' => 'oppenheimer.jpg',
            'dureFil' => 180,
            'dateSortie' => '2023-07-19',
            'idGenre' => $drame->idGenre
        ]);

        Film::create([
            'titreFil' => 'Barbie',
            'descFil' => 'Barbie quitte Barbie Land pour découvrir le monde réel.',
            'imgFil' => 'barbie.jpg',
            'dureFil' => 114,
            'dateSortie' => '2023-07-19',
            'idGenre' => $comedie->idGenre
        ]);

        Film::create([
            'titreFil' => 'Dune : Deuxième Partie',
            'descFil' => 'Paul Atreides s unit aux Fremen pour se venger des conspirateurs.',
            'imgFil' => 'dune2.jpg',
            'dureFil' => 166,
            'dateSortie' => '2024-02-28',
            'idGenre' => $scifi->idGenre
        ]);

        Film::create([
            'titreFil' => 'Super Mario Bros. le film',
            'descFil' => 'Le plombier Mario voyage à travers le Royaume Champignon.',
            'imgFil' => 'mario.jpg',
            'dureFil' => 92,
            'dateSortie' => '2023-04-05',
            'idGenre' => $animation->idGenre
        ]);

        Film::create([
            'titreFil' => 'Spider-Man : Across the Spider-Verse',
            'descFil' => 'Miles Morales est catapulté à travers le Multivers.',
            'imgFil' => 'spiderverse2.jpg',
            'dureFil' => 140,
            'dateSortie' => '2023-05-31',
            'idGenre' => $animation->idGenre
        ]);

        Film::create([
            'titreFil' => 'Wonka',
            'descFil' => 'La jeunesse de Willy Wonka avant sa chocolaterie.',
            'imgFil' => 'wonka.jpg',
            'dureFil' => 116,
            'dateSortie' => '2023-12-13',
            'idGenre' => $comedie->idGenre
        ]);

        Film::create([
            'titreFil' => 'Napoléon',
            'descFil' => 'L ascension rapide et impitoyable de l empereur Napoléon Bonaparte.',
            'imgFil' => 'napoleon.jpg',
            'dureFil' => 158,
            'dateSortie' => '2023-11-22',
            'idGenre' => $drame->idGenre
        ]);

        Film::create([
            'titreFil' => 'Rebel Moon - Partie 1',
            'descFil' => 'Une colonie pacifique est menacée par les armées d un tyran.',
            'imgFil' => 'rebelmoon.jpg',
            'dureFil' => 133,
            'dateSortie' => '2023-12-22',
            'idGenre' => $scifi->idGenre
        ]);

        Film::create([
            'titreFil' => 'The Killer',
            'descFil' => 'Un tueur se bat contre ses employeurs et lui-même.',
            'imgFil' => 'thekiller.jpg',
            'dureFil' => 118,
            'dateSortie' => '2023-11-10',
            'idGenre' => $action->idGenre
        ]);

        Film::create([
            'titreFil' => 'Aquaman et le Royaume perdu',
            'descFil' => 'Black Manta revient pour se venger d Aquaman.',
            'imgFil' => 'aquaman2.jpg',
            'dureFil' => 124,
            'dateSortie' => '2023-12-20',
            'idGenre' => $action->idGenre
        ]);

        Film::create([
            'titreFil' => 'Hunger Games : La Ballade',
            'descFil' => 'L histoire de Coriolanus Snow avant qu il ne devienne président.',
            'imgFil' => 'hungergames.jpg',
            'dureFil' => 157,
            'dateSortie' => '2023-11-15',
            'idGenre' => $action->idGenre
        ]);

        Film::create([
            'titreFil' => 'Gran Turismo',
            'descFil' => 'Un joueur adolescent de Gran Turismo devient un vrai pilote de course.',
            'imgFil' => 'granturismo.jpg',
            'dureFil' => 134,
            'dateSortie' => '2023-08-09',
            'idGenre' => $action->idGenre
        ]);

        Film::create([
            'titreFil' => 'Indiana Jones et le Cadran',
            'descFil' => 'L archéologue légendaire revient pour une dernière aventure.',
            'imgFil' => 'indianajones5.jpg',
            'dureFil' => 154,
            'dateSortie' => '2023-06-28',
            'idGenre' => $action->idGenre
        ]);

        Film::create([
            'titreFil' => 'Mission : Impossible 7',
            'descFil' => 'Ethan Hunt doit traquer une nouvelle arme terrifiante.',
            'imgFil' => 'mi7.jpg',
            'dureFil' => 163,
            'dateSortie' => '2023-07-12',
            'idGenre' => $action->idGenre
        ]);

        Film::create([
            'titreFil' => 'Le Garçon et le Héron',
            'descFil' => 'Mahito entre dans un monde magique avec un héron cendré.',
            'imgFil' => 'boyheron.jpg',
            'dureFil' => 124,
            'dateSortie' => '2023-11-01',
            'idGenre' => $animation->idGenre
        ]);

        Film::create([
            'titreFil' => 'Wish : Asha et la bonne étoile',
            'descFil' => 'Asha fait un vœu si puissant qu il est exaucé par une force cosmique.',
            'imgFil' => 'wish.jpg',
            'dureFil' => 95,
            'dateSortie' => '2023-11-29',
            'idGenre' => $animation->idGenre
        ]);

        Film::create([
            'titreFil' => 'Superman',
            'descFil' => 'Le début d une nouvelle ère pour l homme d acier.',
            'imgFil' => 'supermanlegacy.jpg',
            'dureFil' => 140,
            'dateSortie' => '2025-07-11',
            'idGenre' => $action->idGenre
        ]);

        Film::create([
            'titreFil' => 'Un film Minecraft',
            'descFil' => 'L adaptation du célèbre jeu vidéo de construction.',
            'imgFil' => 'minecraft.jpg',
            'dureFil' => 100,
            'dateSortie' => '2025-04-02',
            'idGenre' => $animation->idGenre
        ]);

        Film::create([
            'titreFil' => 'Mickey 17',
            'descFil' => 'Un employé "jetable" envoyé coloniser une planète de glace.',
            'imgFil' => 'mickey17.jpg',
            'dureFil' => 139,
            'dateSortie' => '2025-01-29',
            'idGenre' => $scifi->idGenre
        ]);

        Film::create([
            'titreFil' => 'Tron: Ares',
            'descFil' => 'Une nouvelle aventure dans la Grille numérique.',
            'imgFil' => 'tronares.jpg',
            'dureFil' => 130,
            'dateSortie' => '2025-10-10',
            'idGenre' => $scifi->idGenre
        ]);
    }
}
