<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Servis;

class ServisSeeder extends Seeder
{

    public function run(): void
    {
        Servis::create([
            'naziv' => 'Servisiranje kotlova',
            'opis' => 'Redovan i vanredan servis kotlova svih tipova.',
            'ikona' => 'fas fa-tools',
            'telefon' => '060/123-556',
            'adresa' => 'Bulevar kralja Aleksandra 123'

        ]);

        Servis::create([
            'naziv' => 'Montaža opreme',
            'opis' => 'Profesionalna montaža kotlova i sistema grejanja.',
            'ikona' => 'fas fa-cogs',
            'telefon' => '061/555-999',
            'adresa' => 'Nemanjina 12, Beograd'

        ]);

        Servis::create([
            'naziv' => 'Konsultacije',
            'opis' => 'Saveti pri izboru opreme i energetskoj efikasnosti.',
            'ikona' => 'fas fa-comments',
            'telefon' => '066/444-777',
            'adresa' => 'Zmaj Jovina 3, Novi Sad'

        ]);

        Servis::create([
            'naziv' => ' Hitne intervencije',
            'opis' => 'Dostupni smo 24/7 za hitne intervencije u slučaju kvara grejnih sistema.',
            'ikona' => 'fas fa-exclamation-triangle',
            'telefon' => '061/223-556',
            'adresa' => 'Laze Telečkog 8, Zrenjanin'

        ]);

        Servis::create([
            'naziv' => 'Priključenje na postojeći sistem
',
            'opis' => 'Saveti pri izboru opreme i energetskoj efikasnosti.',
            'ikona' => 'fas fa-network-wired',
            'telefon' => '060/112-334',
            'adresa' => 'Vojvode Stepe 101, Čačak'

        ]);

    }
}
