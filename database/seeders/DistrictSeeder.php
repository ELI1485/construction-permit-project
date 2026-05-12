<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;

/**
 * Seeds Moroccan municipalities/districts for permit applications.
 */
class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        $districts = [
            ['nom' => 'Casablanca-Anfa',       'region' => 'Casablanca-Settat'],
            ['nom' => 'Casablanca-Maarif',     'region' => 'Casablanca-Settat'],
            ['nom' => 'Rabat-Agdal',           'region' => 'Rabat-Salé-Kénitra'],
            ['nom' => 'Rabat-Hassan',          'region' => 'Rabat-Salé-Kénitra'],
            ['nom' => 'Marrakech-Guéliz',      'region' => 'Marrakech-Safi'],
            ['nom' => 'Marrakech-Médina',      'region' => 'Marrakech-Safi'],
            ['nom' => 'Fès-Ville Nouvelle',    'region' => 'Fès-Meknès'],
            ['nom' => 'Tanger-Centre',         'region' => 'Tanger-Tétouan-Al Hoceïma'],
            ['nom' => 'Agadir',                'region' => 'Souss-Massa'],
            ['nom' => 'Oujda',                 'region' => 'Oriental'],
        ];

        foreach ($districts as $d) {
            District::firstOrCreate(['nom' => $d['nom']], ['region' => $d['region']]);
        }
    }
}
