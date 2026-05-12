<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DocumentType;

/**
 * Seeds the 7 document types required for construction permit applications.
 * Based on Moroccan administrative requirements (rokhas.ma).
 */
class DocumentTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['nom' => 'CIN',                  'obligatoire' => true],
            ['nom' => 'Plan Architectural',   'obligatoire' => true],
            ['nom' => 'Titre Foncier',        'obligatoire' => true],
            ['nom' => 'Plan de Situation',    'obligatoire' => true],
            ['nom' => 'Quittance Fiscale',    'obligatoire' => true],
            ['nom' => 'Registre de Commerce', 'obligatoire' => false],
            ['nom' => 'Levé Topographique',   'obligatoire' => false],
        ];

        foreach ($types as $type) {
            DocumentType::firstOrCreate(
                ['nom' => $type['nom']],
                ['obligatoire' => $type['obligatoire']]
            );
        }
    }
}
