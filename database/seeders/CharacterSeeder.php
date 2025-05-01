<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;
use App\Models\Movie;

class CharacterSeeder extends Seeder
{
    public function run(): void
    {
        $characters = [
            // Dune: Parte Dos
            [
                'name' => 'Paul Atreides',
                'role' => 'Protagonista',
                'actor_name' => 'Timothée Chalamet',
                'photo_path' => 'https://m.media-amazon.com/images/M/MV5BMTM1MTI5Mzc0MF5BMl5BanBnXkFtZTYwNzgzOTQz._V1_.jpg',
                'movies' => ['Dune: Parte Dos']
            ],
            [
                'name' => 'Chani',
                'role' => 'Protagonista',
                'actor_name' => 'Zendaya',
                'photo_path' => 'https://m.media-amazon.com/images/M/MV5BMTQ2MjMwNDA3Nl5BMl5BanBnXkFtZTcwMTA2NDY3NQ@@._V1_.jpg',
                'movies' => ['Dune: Parte Dos']
            ],

            // Deadpool & Wolverine
            [
                'name' => 'Deadpool',
                'role' => 'Protagonista',
                'actor_name' => 'Ryan Reynolds',
                'photo_path' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Deadpool_2_Japan_Premiere_Red_Carpet_Ryan_Reynolds_%28cropped%29.jpg/250px-Deadpool_2_Japan_Premiere_Red_Carpet_Ryan_Reynolds_%28cropped%29.jpg',
                'movies' => ['Deadpool & Wolverine']
            ],
            [
                'name' => 'Wolverine',
                'role' => 'Protagonista',
                'actor_name' => 'Hugh Jackman',
                'photo_path' => 'https://upload.wikimedia.org/wikipedia/commons/c/c8/Hugh_Jackman_Berlin_2017.jpg',
                'movies' => ['Deadpool & Wolverine']
            ],

            // House of the Dragon
            [
                'name' => 'Rhaenyra Targaryen',
                'role' => 'Protagonista',
                'actor_name' => 'Emma D\'Arcy',
                'photo_path' => 'https://pics.filmaffinity.com/033633930623815-nm_200.jpg',
                'movies' => ['House of the Dragon']
            ],
            [
                'name' => 'Daemon Targaryen',
                'role' => 'Protagonista',
                'actor_name' => 'Matt Smith',
                'photo_path' => 'https://es.web.img3.acsta.net/pictures/18/01/22/11/15/3775793.jpg',
                'movies' => ['House of the Dragon']
            ],

            // Oppenheimer
            [
                'name' => 'J. Robert Oppenheimer',
                'role' => 'Protagonista',
                'actor_name' => 'Cillian Murphy',
                'photo_path' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/Cillian_Murphy-2014.jpg/250px-Cillian_Murphy-2014.jpg',
                'movies' => ['Oppenheimer']
            ],
            [
                'name' => 'Katherine Oppenheimer',
                'role' => 'Protagonista',
                'actor_name' => 'Emily Blunt',
                'photo_path' => 'https://upload.wikimedia.org/wikipedia/commons/2/23/Emily_Blunt_SAG_Awards_2019.png',
                'movies' => ['Oppenheimer']
            ],

            // Stranger Things
            [
                'name' => 'Eleven',
                'role' => 'Protagonista',
                'actor_name' => 'Millie Bobby Brown',
                'photo_path' => 'https://hips.hearstapps.com/hmg-prod/images/millie-bobby-brown-botox-1652847710.jpg',
                'movies' => ['Stranger Things']
            ],
            [
                'name' => 'Jim Hopper',
                'role' => 'Protagonista',
                'actor_name' => 'David Harbour',
                'photo_path' => 'https://cdn.britannica.com/53/244253-050-579D9771/Actor-David-Harbour-2022.jpg',
                'movies' => ['Stranger Things']
            ],

            // Breaking Bad
            [
                'name' => 'Walter White',
                'role' => 'Protagonista',
                'actor_name' => 'Bryan Cranston',
                'photo_path' => 'https://m.media-amazon.com/images/M/MV5BMTA2NjEyMTY4MTVeQTJeQWpwZ15BbWU3MDQ5NDAzNDc@._V1_.jpg',
                'movies' => ['Breaking Bad']
            ],
            [
                'name' => 'Jesse Pinkman',
                'role' => 'Protagonista',
                'actor_name' => 'Aaron Paul',
                'photo_path' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Aaron_Paul%2C_May_2009_%282%29_%28cropped%29.jpg/250px-Aaron_Paul%2C_May_2009_%282%29_%28cropped%29.jpg',
                'movies' => ['Breaking Bad']
            ],
        ];

        foreach ($characters as $characterData) {
            $character = Character::create([
                'name' => $characterData['name'],
                'role' => $characterData['role'],
                'actor_name' => $characterData['actor_name'],
                'photo_path' => $characterData['photo_path']
            ]);

            // Asociar el personaje con las películas/series correspondientes
            foreach ($characterData['movies'] as $movieName) {
                $movie = Movie::where('name', $movieName)->first();
                if ($movie) {
                    $movie->characters()->attach($character->id);
                }
            }
        }
    }
} 