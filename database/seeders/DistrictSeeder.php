<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        $districts = [
            ['nom' => 'Casablanca',  'region' => 'Casablanca-Settat'],
            ['nom' => 'Rabat',       'region' => 'Rabat-Salé-Kénitra'],
            ['nom' => 'Marrakech',   'region' => 'Marrakech-Safi'],
            ['nom' => 'Fès',         'region' => 'Fès-Meknès'],
            ['nom' => 'Tanger',      'region' => 'Tanger-Tétouan-Al Hoceïma'],
        ];

        foreach ($districts as $d) {
            District::firstOrCreate(['nom' => $d['nom']], ['region' => $d['region']]);
        }
    }
}