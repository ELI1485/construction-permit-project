<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PermitType;

/**
 * Seeds all permit types as defined in the project specification.
 * Aligned with Moroccan construction permit categories (rokhas.ma).
 */
class PermitTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['nom' => 'Construction',  'description' => 'Permis de construction neuve (villa, immeuble, bâtiment)'],
            ['nom' => 'Démolition',    'description' => 'Permis de démolition d\'un bâtiment existant'],
            ['nom' => 'Rénovation',    'description' => 'Permis de rénovation ou réhabilitation'],
            ['nom' => 'Commercial',    'description' => 'Permis pour construction à usage commercial'],
            ['nom' => 'Industriel',    'description' => 'Permis pour construction à usage industriel'],
            ['nom' => 'Extension',     'description' => 'Permis d\'extension d\'un bâtiment existant'],
        ];

        foreach ($types as $type) {
            PermitType::firstOrCreate(
                ['nom' => $type['nom']],
                ['description' => $type['description']]
            );
        }
    }
}
