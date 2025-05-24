<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kotlovi;

class KotloviSeeder extends Seeder
{
    public function run(): void
    {
        Kotlovi::insert([

        [
            'naziv' => 'UNI 20/25',
            'opis' => 'Opis za kotao A',
            'cena' => 12500.00,
            'slika' => 'kotao_a.jpg',
            'featured' => 1,
            'tip' => 'pelet'
        ],
        [
            'naziv' => 'ECOFLAME PLUS',
            'opis' => 'Opis za kotao B',
            'cena' => 18990.00,
            'slika' => 'kotao_b.jpg',
            'featured' => 1,
            'tip' => 'pelet'
        ],
        [
            'naziv' => 'ECO COMFORT',
            'opis' => 'Opis za kotao C',
            'cena' => 9900.00,
            'slika' => 'kotao_c.jpg',
            'featured' => 1,
            'tip' => 'pelet'
        ],
        [
            'naziv' => 'K SERIJA',
            'opis' => 'Opis za kotao D',
            'cena' => 9999.99,
            'slika' => 'kotao_d.jpg',
            'featured' => 0,
            'tip' => 'drva'
        ],

        [
            'naziv' => 'PK18',
            'opis' => 'Opis za kotao D',
            'cena' => 9999.99,
            'slika' => 'kotao_e.jpg',
            'featured' => 0,
            'tip' => 'drva'
        ],


        ]);
    }
}
