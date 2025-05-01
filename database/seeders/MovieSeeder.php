<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            // Películas actuales (últimos 3 meses)
            [
                'name' => 'Dune: Parte Dos',
                'classification' => 'Ciencia Ficción',
                'release_date' => now()->subDays(30),
                'review' => 'La épica continuación de la saga de Dune, donde Paul Atreides se une a los Fremen para vengar a su familia.',
                'is_series' => false,
                'poster_path' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/8b8R8l88Qje9dn9OE8PY05Nxl1X.jpg'
            ],

            // Próximos estrenos de películas
            [
                'name' => 'Deadpool & Wolverine',
                'classification' => 'Acción',
                'release_date' => now()->addDays(30),
                'review' => 'Deadpool y Wolverine se unen en una aventura multiversal llena de acción y humor.',
                'is_series' => false,
                'poster_path' => 'https://lh6.googleusercontent.com/proxy/HzvmR9TzyBWCx5lIXVRZuEBX8AbXDGwxp4aUKk6n1iiQe_OCCvoOCUCPTLmB5RybRgAwMayZFW9zdV7vXaj480DKj5Nfb2X7KftYOrT_BytcZgIB10bn71j7N3Rn'
            ],

            // Películas anteriores
            [
                'name' => 'Oppenheimer',
                'classification' => 'Drama Histórico',
                'release_date' => now()->subMonths(6),
                'review' => 'La historia del científico J. Robert Oppenheimer y su papel en el desarrollo de la bomba atómica.',
                'is_series' => false,
                'poster_path' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/ncKCQVXgk4BcQV6XbvesgZ2zLvZ.jpg'
            ],

            // Series actuales
            [
                'name' => 'House of the Dragon',
                'classification' => 'Drama',
                'release_date' => now()->subMonths(3),
                'review' => 'La precuela de Game of Thrones que narra la historia de la Casa Targaryen.',
                'is_series' => true,
                'season' => 2,
                'poster_path' => 'https://m.media-amazon.com/images/M/MV5BM2QzMGVkNjUtN2Y4Yi00ODMwLTg3YzktYzUxYjJlNjFjNDY1XkEyXkFqcGc@._V1_.jpg'
            ],

            // Próximas series
            [
                'name' => 'Stranger Things',
                'classification' => 'Ciencia Ficción',
                'release_date' => now()->addMonths(2),
                'review' => 'La quinta y última temporada de la exitosa serie que mezcla ciencia ficción, terror y drama adolescente.',
                'is_series' => true,
                'season' => 5,
                'poster_path' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/49WJfeN0moxb9IPfGn8AIqMGskD.jpg'
            ],

            // Series anteriores
            [
                'name' => 'Breaking Bad',
                'classification' => 'Drama',
                'release_date' => now()->subMonths(24),
                'review' => 'Un profesor de química con cáncer terminal se convierte en fabricante de metanfetamina para asegurar el futuro de su familia.',
                'is_series' => true,
                'season' => 5,
                'poster_path' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/ggFHVNu6YYI5L9pCfOacjizRGt.jpg'
            ],
        ];

        foreach ($movies as $movie) {
            \App\Models\Movie::create($movie);
        }
    }
}
