<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Genre;
use App\Models\Film;
use App\Models\Cinema;
use App\Models\TypeSalle;
use App\Models\Salle;
use App\Models\TypeSeance;
use App\Models\Langue;
use App\Models\Seance;
use App\Models\Tarif;
use App\Models\RoleUtilisateur;
use App\Models\Personne;
use App\Models\RolePersonne;
use App\Models\Participe;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
/*
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
        ]); */

      // =============================================
        // 1. RÔLES UTILISATEURS
        // =============================================
        $adminRole = RoleUtilisateur::create(['libRoleUti' => 'admin']);
        $userRole  = RoleUtilisateur::create(['libRoleUti' => 'utilisateur']);

        // =============================================
        // 2. GENRES
        // =============================================
        $g1 = Genre::create(['libGenre' => 'Action']);
        $g2 = Genre::create(['libGenre' => 'Science-Fiction']);
        $g3 = Genre::create(['libGenre' => 'Comedie']);
        $g4 = Genre::create(['libGenre' => 'Drame']);
        $g5 = Genre::create(['libGenre' => 'Animation']);
        $g6 = Genre::create(['libGenre' => 'Fantastique']);
        $g7 = Genre::create(['libGenre' => 'Thriller']);

        // =============================================
        // 3. FILMS (images inchangées)
        // =============================================
        $f1  = Film::create(['titreFil' => 'John Wick',                          'descFil' => 'Un ancien tueur à gages reprend du service après la mort de son chien.',                'imgFil' => 'johnwick.jpg',        'dureFil' => 101, 'dateSortie' => '2014-10-24', 'idGenre' => $g1->idGenre]);
        $f2  = Film::create(['titreFil' => 'Avatar',                              'descFil' => 'Un marine infiltre une planète extraterrestre aux ressources convoitées.',               'imgFil' => 'avatar.jpg',          'dureFil' => 162, 'dateSortie' => '2009-12-16', 'idGenre' => $g2->idGenre]);
        $f3  = Film::create(['titreFil' => 'La Grande Vadrouille',                'descFil' => 'Deux Français aident des aviateurs anglais à traverser la France occupée.',              'imgFil' => 'vadrouille.jpg',      'dureFil' => 132, 'dateSortie' => '1966-12-08', 'idGenre' => $g3->idGenre]);
        $f4  = Film::create(['titreFil' => 'Titanic',                             'descFil' => 'Une romance tragique à bord du célèbre paquebot.',                                       'imgFil' => 'titanic.jpg',         'dureFil' => 195, 'dateSortie' => '1997-12-19', 'idGenre' => $g4->idGenre]);
        $f5  = Film::create(['titreFil' => 'Le Roi Lion',                         'descFil' => 'Un lionceau doit reprendre sa place de roi après la mort de son père.',                  'imgFil' => 'roilion.jpg',         'dureFil' => 88,  'dateSortie' => '1994-06-15', 'idGenre' => $g5->idGenre]);
        $f6  = Film::create(['titreFil' => 'Harry Potter a l ecole des sorciers', 'descFil' => 'Un orphelin découvre qu il est sorcier et intègre l école de magie Poudlard.',           'imgFil' => 'harrypotter.jpg',     'dureFil' => 152, 'dateSortie' => '2001-11-14', 'idGenre' => $g6->idGenre]);
        $f7  = Film::create(['titreFil' => 'Joker',                               'descFil' => 'La descente aux enfers d un homme marginalisé qui devient le Joker à Gotham City.',      'imgFil' => 'joker.jpg',           'dureFil' => 122, 'dateSortie' => '2019-10-04', 'idGenre' => $g7->idGenre]);
        $f8  = Film::create(['titreFil' => 'Oppenheimer',                         'descFil' => 'L histoire du physicien J. Robert Oppenheimer et de la création de la bombe atomique.',  'imgFil' => 'oppenheimer.jpg',     'dureFil' => 180, 'dateSortie' => '2023-07-19', 'idGenre' => $g4->idGenre]);
        $f9  = Film::create(['titreFil' => 'Barbie',                              'descFil' => 'Barbie quitte Barbieland pour découvrir le monde réel.',                                  'imgFil' => 'barbie.jpg',          'dureFil' => 114, 'dateSortie' => '2023-07-19', 'idGenre' => $g3->idGenre]);
        $f10 = Film::create(['titreFil' => 'Dune : Deuxième Partie',              'descFil' => 'Paul Atréides mène une guerre sainte sur la planète Arrakis.',                            'imgFil' => 'dune2.jpg',           'dureFil' => 166, 'dateSortie' => '2024-02-28', 'idGenre' => $g2->idGenre]);
        $f11 = Film::create(['titreFil' => 'Super Mario Bros. le film',           'descFil' => 'Mario et Luigi traversent le Royaume Champignon pour sauver la princesse.',               'imgFil' => 'mario.jpg',           'dureFil' => 92,  'dateSortie' => '2023-04-05', 'idGenre' => $g5->idGenre]);
        $f12 = Film::create(['titreFil' => 'Spider-Man : Across the Spider-Verse','descFil' => 'Miles Morales traverse le multivers des Spider-Man.',                                     'imgFil' => 'spiderverse2.jpg',    'dureFil' => 140, 'dateSortie' => '2023-05-31', 'idGenre' => $g5->idGenre]);
        $f13 = Film::create(['titreFil' => 'Wonka',                               'descFil' => 'La jeunesse du célèbre chocolatier Willy Wonka et ses premières créations.',               'imgFil' => 'wonka.jpg',           'dureFil' => 116, 'dateSortie' => '2023-12-13', 'idGenre' => $g3->idGenre]);
        $f14 = Film::create(['titreFil' => 'Napoléon',                            'descFil' => 'L ascension militaire et politique de Napoléon Bonaparte.',                               'imgFil' => 'napoleon.jpg',        'dureFil' => 158, 'dateSortie' => '2023-11-22', 'idGenre' => $g4->idGenre]);
        $f15 = Film::create(['titreFil' => 'Rebel Moon - Partie 1',               'descFil' => 'Une colonie paisible est menacée par un empire galactique tyrannique.',                   'imgFil' => 'rebelmoon.jpg',       'dureFil' => 133, 'dateSortie' => '2023-12-22', 'idGenre' => $g2->idGenre]);
        $f16 = Film::create(['titreFil' => 'The Killer',                          'descFil' => 'Un tueur à gages méthodique se retourne contre ses propres employeurs.',                  'imgFil' => 'thekiller.jpg',       'dureFil' => 118, 'dateSortie' => '2023-11-10', 'idGenre' => $g1->idGenre]);
        $f17 = Film::create(['titreFil' => 'Aquaman et le Royaume perdu',         'descFil' => 'Aquaman affronte Black Manta qui cherche à se venger.',                                   'imgFil' => 'aquaman2.jpg',        'dureFil' => 124, 'dateSortie' => '2023-12-20', 'idGenre' => $g1->idGenre]);
        $f18 = Film::create(['titreFil' => 'Hunger Games : La Ballade',           'descFil' => 'Les origines de Coriolanus Snow, futur président tyrannique de Panem.',                   'imgFil' => 'hungergames.jpg',     'dureFil' => 157, 'dateSortie' => '2023-11-15', 'idGenre' => $g1->idGenre]);
        $f19 = Film::create(['titreFil' => 'Gran Turismo',                        'descFil' => 'Un joueur de Gran Turismo réalise son rêve de devenir pilote de course.',                  'imgFil' => 'granturismo.jpg',     'dureFil' => 134, 'dateSortie' => '2023-08-09', 'idGenre' => $g1->idGenre]);
        $f20 = Film::create(['titreFil' => 'Indiana Jones et le Cadran',          'descFil' => 'La dernière aventure d Indiana Jones à la recherche d un artefact légendaire.',            'imgFil' => 'indianajones5.jpg',   'dureFil' => 154, 'dateSortie' => '2023-06-28', 'idGenre' => $g1->idGenre]);
        $f21 = Film::create(['titreFil' => 'Mission : Impossible 7',              'descFil' => 'Ethan Hunt traque une arme terrifiante à travers le monde.',                               'imgFil' => 'mi7.jpg',             'dureFil' => 163, 'dateSortie' => '2023-07-12', 'idGenre' => $g1->idGenre]);
        $f22 = Film::create(['titreFil' => 'Le Garçon et le Héron',               'descFil' => 'Chef d oeuvre Ghibli : un garçon plonge dans un monde fantastique guidé par un héron.',   'imgFil' => 'boyheron.jpg',        'dureFil' => 124, 'dateSortie' => '2023-11-01', 'idGenre' => $g5->idGenre]);
        $f23 = Film::create(['titreFil' => 'Wish : Asha et la bonne étoile',      'descFil' => 'Asha invoque une force cosmique pour sauver les vœux de son royaume.',                    'imgFil' => 'wish.jpg',            'dureFil' => 95,  'dateSortie' => '2023-11-29', 'idGenre' => $g5->idGenre]);
        $f24 = Film::create(['titreFil' => 'Superman',                            'descFil' => 'Une nouvelle ère pour le Man of Steel dans l univers DC de James Gunn.',                  'imgFil' => 'supermanlegacy.jpg',  'dureFil' => 140, 'dateSortie' => '2025-07-11', 'idGenre' => $g1->idGenre]);
        $f25 = Film::create(['titreFil' => 'Un film Minecraft',                   'descFil' => 'Une adaptation cinématographique du célèbre jeu vidéo de construction.',                   'imgFil' => 'minecraft.jpg',       'dureFil' => 100, 'dateSortie' => '2025-04-02', 'idGenre' => $g5->idGenre]);
        $f26 = Film::create(['titreFil' => 'Mickey 17',                           'descFil' => 'Un homme jetable chargé de missions suicides lors d une colonisation spatiale.',           'imgFil' => 'mickey17.jpg',        'dureFil' => 139, 'dateSortie' => '2025-01-29', 'idGenre' => $g2->idGenre]);
        $f27 = Film::create(['titreFil' => 'Tron: Ares',                          'descFil' => 'Un programme issu de la Grille numérique s infiltre dans le monde réel.',                 'imgFil' => 'tronares.jpg',        'dureFil' => 130, 'dateSortie' => '2025-10-10', 'idGenre' => $g2->idGenre]);

        // =============================================
        // 4. CINÉMAS
        // =============================================
        $c1 = Cinema::create(['nomCin' => 'Cinéma Centre Ville', 'adrCin' => '10 rue de la République', 'cpCin' => '75001', 'vilCin' => 'Paris']);
        $c2 = Cinema::create(['nomCin' => 'Mega CGR Lyon',        'adrCin' => '25 avenue Lumière',       'cpCin' => '69008', 'vilCin' => 'Lyon']);
        $c3 = Cinema::create(['nomCin' => 'Pathé Marseille',      'adrCin' => '3 boulevard Dugommier',   'cpCin' => '13001', 'vilCin' => 'Marseille']);

        // =============================================
        // 5. TYPES DE SALLE
        // =============================================
        $ts1 = TypeSalle::create(['libTypSal' => 'Classique']);
        $ts2 = TypeSalle::create(['libTypSal' => 'IMAX']);
        $ts3 = TypeSalle::create(['libTypSal' => '4DX']);
        $ts4 = TypeSalle::create(['libTypSal' => 'Dolby Cinéma']);

        // =============================================
        // 6. SALLES
        // =============================================
        $sal1 = Salle::create(['numSal' => 1, 'nbPlace' => 120, 'idCin' => $c1->idCin, 'idTyp' => $ts1->idTyp]);
        $sal2 = Salle::create(['numSal' => 2, 'nbPlace' => 200, 'idCin' => $c1->idCin, 'idTyp' => $ts2->idTyp]);
        $sal3 = Salle::create(['numSal' => 1, 'nbPlace' => 150, 'idCin' => $c2->idCin, 'idTyp' => $ts1->idTyp]);
        $sal4 = Salle::create(['numSal' => 2, 'nbPlace' => 80,  'idCin' => $c2->idCin, 'idTyp' => $ts3->idTyp]);
        $sal5 = Salle::create(['numSal' => 1, 'nbPlace' => 180, 'idCin' => $c3->idCin, 'idTyp' => $ts4->idTyp]);
        $sal6 = Salle::create(['numSal' => 2, 'nbPlace' => 100, 'idCin' => $c3->idCin, 'idTyp' => $ts1->idTyp]);

        // =============================================
        // 7. TYPES DE SÉANCE
        // =============================================
        $tsea1 = TypeSeance::create(['libTypeSea' => 'VF']);
        $tsea2 = TypeSeance::create(['libTypeSea' => 'VOSTFR']);
        $tsea3 = TypeSeance::create(['libTypeSea' => 'VO']);

        // =============================================
        // 8. LANGUES
        // =============================================
        $lFr = Langue::create(['LangueSea' => 'Français']);
        $lEn = Langue::create(['LangueSea' => 'Anglais']);
        $lEs = Langue::create(['LangueSea' => 'Espagnol']);
        $lJa = Langue::create(['LangueSea' => 'Japonais']);

        // =============================================
        // 9. TARIFS (liés aux types de séance)
        // =============================================
        // Tarifs VF (idTypeSea 1)
        Tarif::create(['libTar' => 'Plein tarif',    'prixTar' => 12.50, 'idTypeSea' => $tsea1->idTypeSea]);
        Tarif::create(['libTar' => 'Étudiant',        'prixTar' => 8.00,  'idTypeSea' => $tsea1->idTypeSea]);
        Tarif::create(['libTar' => 'Moins de 14 ans', 'prixTar' => 6.50,  'idTypeSea' => $tsea1->idTypeSea]);
        Tarif::create(['libTar' => 'Senior',          'prixTar' => 9.00,  'idTypeSea' => $tsea1->idTypeSea]);
        // Tarifs VOSTFR (idTypeSea 2)
        Tarif::create(['libTar' => 'Plein tarif',    'prixTar' => 13.00, 'idTypeSea' => $tsea2->idTypeSea]);
        Tarif::create(['libTar' => 'Étudiant',        'prixTar' => 9.00,  'idTypeSea' => $tsea2->idTypeSea]);
        // Tarifs VO (idTypeSea 3)
        Tarif::create(['libTar' => 'Plein tarif',    'prixTar' => 11.50, 'idTypeSea' => $tsea3->idTypeSea]);
        Tarif::create(['libTar' => 'Étudiant',        'prixTar' => 8.50,  'idTypeSea' => $tsea3->idTypeSea]);

        // =============================================
        // 10. SÉANCES
        // CORRECTION : le champ s'appelle idLangue, pas langSea
        // =============================================
        Seance::create(['dateHeurSea' => '2026-03-10 10:00:00', 'idFil' => $f1->idFil,  'idSal' => $sal1->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-10 14:00:00', 'idFil' => $f1->idFil,  'idSal' => $sal1->idSal, 'idTypeSea' => $tsea2->idTypeSea, 'idLangue' => $lEn->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-10 18:00:00', 'idFil' => $f1->idFil,  'idSal' => $sal2->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);

        Seance::create(['dateHeurSea' => '2026-03-10 11:00:00', 'idFil' => $f2->idFil,  'idSal' => $sal2->idSal, 'idTypeSea' => $tsea2->idTypeSea, 'idLangue' => $lEn->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-11 21:00:00', 'idFil' => $f2->idFil,  'idSal' => $sal3->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);

        Seance::create(['dateHeurSea' => '2026-03-11 14:00:00', 'idFil' => $f3->idFil,  'idSal' => $sal1->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-12 17:00:00', 'idFil' => $f3->idFil,  'idSal' => $sal6->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);

        Seance::create(['dateHeurSea' => '2026-03-11 20:00:00', 'idFil' => $f4->idFil,  'idSal' => $sal1->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-13 20:30:00', 'idFil' => $f4->idFil,  'idSal' => $sal3->idSal, 'idTypeSea' => $tsea2->idTypeSea, 'idLangue' => $lEn->idLangue]);

        Seance::create(['dateHeurSea' => '2026-03-12 16:30:00', 'idFil' => $f5->idFil,  'idSal' => $sal2->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-14 10:00:00', 'idFil' => $f5->idFil,  'idSal' => $sal4->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);

        Seance::create(['dateHeurSea' => '2026-03-12 14:00:00', 'idFil' => $f6->idFil,  'idSal' => $sal1->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-12 19:00:00', 'idFil' => $f7->idFil,  'idSal' => $sal3->idSal, 'idTypeSea' => $tsea2->idTypeSea, 'idLangue' => $lEn->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-13 15:00:00', 'idFil' => $f8->idFil,  'idSal' => $sal5->idSal, 'idTypeSea' => $tsea2->idTypeSea, 'idLangue' => $lEn->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-13 18:30:00', 'idFil' => $f9->idFil,  'idSal' => $sal1->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-14 20:00:00', 'idFil' => $f10->idFil, 'idSal' => $sal2->idSal, 'idTypeSea' => $tsea2->idTypeSea, 'idLangue' => $lEn->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-14 14:00:00', 'idFil' => $f11->idFil, 'idSal' => $sal3->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-15 11:00:00', 'idFil' => $f12->idFil, 'idSal' => $sal4->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-15 16:00:00', 'idFil' => $f13->idFil, 'idSal' => $sal6->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-15 21:00:00', 'idFil' => $f14->idFil, 'idSal' => $sal5->idSal, 'idTypeSea' => $tsea2->idTypeSea, 'idLangue' => $lEn->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-16 19:00:00', 'idFil' => $f15->idFil, 'idSal' => $sal2->idSal, 'idTypeSea' => $tsea2->idTypeSea, 'idLangue' => $lEn->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-16 21:30:00', 'idFil' => $f16->idFil, 'idSal' => $sal1->idSal, 'idTypeSea' => $tsea2->idTypeSea, 'idLangue' => $lEn->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-17 18:00:00', 'idFil' => $f17->idFil, 'idSal' => $sal3->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-17 20:30:00', 'idFil' => $f18->idFil, 'idSal' => $sal5->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-18 15:30:00', 'idFil' => $f19->idFil, 'idSal' => $sal4->idSal, 'idTypeSea' => $tsea2->idTypeSea, 'idLangue' => $lEn->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-18 18:00:00', 'idFil' => $f20->idFil, 'idSal' => $sal6->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-19 21:00:00', 'idFil' => $f21->idFil, 'idSal' => $sal2->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-19 14:30:00', 'idFil' => $f22->idFil, 'idSal' => $sal1->idSal, 'idTypeSea' => $tsea3->idTypeSea, 'idLangue' => $lJa->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-20 10:30:00', 'idFil' => $f23->idFil, 'idSal' => $sal3->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-20 19:00:00', 'idFil' => $f24->idFil, 'idSal' => $sal5->idSal, 'idTypeSea' => $tsea2->idTypeSea, 'idLangue' => $lEn->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-21 14:00:00', 'idFil' => $f25->idFil, 'idSal' => $sal4->idSal, 'idTypeSea' => $tsea1->idTypeSea, 'idLangue' => $lFr->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-21 21:00:00', 'idFil' => $f26->idFil, 'idSal' => $sal2->idSal, 'idTypeSea' => $tsea2->idTypeSea, 'idLangue' => $lEn->idLangue]);
        Seance::create(['dateHeurSea' => '2026-03-22 18:30:00', 'idFil' => $f27->idFil, 'idSal' => $sal6->idSal, 'idTypeSea' => $tsea2->idTypeSea, 'idLangue' => $lEn->idLangue]);

        // =============================================
        // 11. RÔLES DES PERSONNES (acteur, réalisateur…)
        // =============================================
        $rReal  = RolePersonne::create(['libRolePer' => 'Réalisateur']);
        $rActe  = RolePersonne::create(['libRolePer' => 'Acteur principal']);
        $rActe2 = RolePersonne::create(['libRolePer' => 'Acteur secondaire']);
        $rProd  = RolePersonne::create(['libRolePer' => 'Producteur']);

        // =============================================
        // 12. PERSONNES
        // =============================================
        $pStahelski  = Personne::create(['nomPer' => 'Stahelski',  'prenomPer' => 'Chad',       'dateNaisPer' => '1968-09-20', 'bioPer' => 'Réalisateur américain, ex-cascadeur.',     'lieuNaisPer' => 'Kirkland, USA']);
        $pReeves     = Personne::create(['nomPer' => 'Reeves',     'prenomPer' => 'Keanu',      'dateNaisPer' => '1964-09-02', 'bioPer' => 'Acteur américano-canadien polyvalent.',    'lieuNaisPer' => 'Beyrouth, Liban']);
        $pCameron    = Personne::create(['nomPer' => 'Cameron',    'prenomPer' => 'James',      'dateNaisPer' => '1954-08-16', 'bioPer' => 'Réalisateur de blockbusters légendaires.', 'lieuNaisPer' => 'Kapuskasing, Canada']);
        $pWorthington= Personne::create(['nomPer' => 'Worthington','prenomPer' => 'Sam',        'dateNaisPer' => '1976-08-02', 'bioPer' => 'Acteur australien.',                       'lieuNaisPer' => 'Godalming, Angleterre']);
        $pOury       = Personne::create(['nomPer' => 'Oury',       'prenomPer' => 'Gérard',     'dateNaisPer' => '1919-04-29', 'bioPer' => 'Réalisateur comique français.',             'lieuNaisPer' => 'Paris, France']);
        $pDeFunes    = Personne::create(['nomPer' => 'De Funès',   'prenomPer' => 'Louis',      'dateNaisPer' => '1914-07-31', 'bioPer' => 'Icône de la comédie française.',           'lieuNaisPer' => 'Courbevoie, France']);
        $pBourvil    = Personne::create(['nomPer' => 'Bourvil',    'prenomPer' => 'André',      'dateNaisPer' => '1917-07-27', 'bioPer' => 'Acteur et chanteur comique français.',     'lieuNaisPer' => 'Prétot-Vicquemare, France']);
        $pNolan      = Personne::create(['nomPer' => 'Nolan',      'prenomPer' => 'Christopher','dateNaisPer' => '1970-07-30', 'bioPer' => 'Réalisateur britannique visionnaire.',     'lieuNaisPer' => 'Londres, Angleterre']);
        $pMurphy     = Personne::create(['nomPer' => 'Murphy',     'prenomPer' => 'Cillian',    'dateNaisPer' => '1976-05-25', 'bioPer' => 'Acteur irlandais reconnu.',                'lieuNaisPer' => 'Douglas, Irlande']);
        $pPhillips   = Personne::create(['nomPer' => 'Phillips',   'prenomPer' => 'Todd',       'dateNaisPer' => '1970-12-20', 'bioPer' => 'Réalisateur américain.',                   'lieuNaisPer' => 'New York, USA']);
        $pPhoenix    = Personne::create(['nomPer' => 'Phoenix',    'prenomPer' => 'Joaquin',    'dateNaisPer' => '1974-10-28', 'bioPer' => 'Acteur américain oscarisé.',               'lieuNaisPer' => 'San Juan, Porto Rico']);
        $pVilleneuve = Personne::create(['nomPer' => 'Villeneuve', 'prenomPer' => 'Denis',      'dateNaisPer' => '1967-10-03', 'bioPer' => 'Réalisateur québécois.',                   'lieuNaisPer' => 'Gentilly, Canada']);
        $pChalamet   = Personne::create(['nomPer' => 'Chalamet',   'prenomPer' => 'Timothée',   'dateNaisPer' => '1995-12-27', 'bioPer' => 'Acteur franco-américain.',                 'lieuNaisPer' => 'New York, USA']);
        $pMiyazaki   = Personne::create(['nomPer' => 'Miyazaki',   'prenomPer' => 'Hayao',      'dateNaisPer' => '1941-01-05', 'bioPer' => 'Maître de l animation japonaise.',        'lieuNaisPer' => 'Tokyo, Japon']);
        $pPattinson  = Personne::create(['nomPer' => 'Pattinson',  'prenomPer' => 'Robert',     'dateNaisPer' => '1986-05-13', 'bioPer' => 'Acteur britannique polyvalent.',           'lieuNaisPer' => 'Londres, Angleterre']);
        $pBongJoonho = Personne::create(['nomPer' => 'Bong',       'prenomPer' => 'Joon-ho',    'dateNaisPer' => '1969-09-14', 'bioPer' => 'Réalisateur sud-coréen oscarisé.',        'lieuNaisPer' => 'Daegu, Corée du Sud']);

        // =============================================
        // 13. PARTICIPE (personnes ↔ films ↔ rôles)
        // =============================================
        // John Wick
        Participe::create(['idPer' => $pStahelski->idPer,  'idFil' => $f1->idFil, 'idRolePer' => $rReal->idRolePer]);
        Participe::create(['idPer' => $pReeves->idPer,     'idFil' => $f1->idFil, 'idRolePer' => $rActe->idRolePer]);
        // Avatar
        Participe::create(['idPer' => $pCameron->idPer,    'idFil' => $f2->idFil, 'idRolePer' => $rReal->idRolePer]);
        Participe::create(['idPer' => $pWorthington->idPer,'idFil' => $f2->idFil, 'idRolePer' => $rActe->idRolePer]);
        // La Grande Vadrouille
        Participe::create(['idPer' => $pOury->idPer,    'idFil' => $f3->idFil, 'idRolePer' => $rReal->idRolePer]);
        Participe::create(['idPer' => $pDeFunes->idPer, 'idFil' => $f3->idFil, 'idRolePer' => $rActe->idRolePer]);
        Participe::create(['idPer' => $pBourvil->idPer, 'idFil' => $f3->idFil, 'idRolePer' => $rActe2->idRolePer]);
        // Oppenheimer
        Participe::create(['idPer' => $pNolan->idPer,   'idFil' => $f8->idFil, 'idRolePer' => $rReal->idRolePer]);
        Participe::create(['idPer' => $pMurphy->idPer,  'idFil' => $f8->idFil, 'idRolePer' => $rActe->idRolePer]);
        // Joker
        Participe::create(['idPer' => $pPhillips->idPer,'idFil' => $f7->idFil, 'idRolePer' => $rReal->idRolePer]);
        Participe::create(['idPer' => $pPhoenix->idPer, 'idFil' => $f7->idFil, 'idRolePer' => $rActe->idRolePer]);
        // Dune 2
        Participe::create(['idPer' => $pVilleneuve->idPer,'idFil' => $f10->idFil,'idRolePer' => $rReal->idRolePer]);
        Participe::create(['idPer' => $pChalamet->idPer,  'idFil' => $f10->idFil,'idRolePer' => $rActe->idRolePer]);
        // Le Garçon et le Héron
        Participe::create(['idPer' => $pMiyazaki->idPer, 'idFil' => $f22->idFil,'idRolePer' => $rReal->idRolePer]);
        // Mickey 17
        Participe::create(['idPer' => $pBongJoonho->idPer,'idFil' => $f26->idFil,'idRolePer' => $rReal->idRolePer]);
        Participe::create(['idPer' => $pPattinson->idPer, 'idFil' => $f26->idFil,'idRolePer' => $rActe->idRolePer]);
    }
}
