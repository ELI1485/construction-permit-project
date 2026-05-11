<?php

namespace Database\Seeders;

<<<<<<< HEAD
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['nom' => 'Brouillon',                             'couleur' => '#6c757d'],
            ['nom' => 'Soumis',                                'couleur' => '#0d6efd'],
            ['nom' => "En cours d'étude",                      'couleur' => '#ffc107'],
            ['nom' => 'Documents complémentaires demandés',    'couleur' => '#fd7e14'],
            ['nom' => 'Validé techniquement',                  'couleur' => '#20c997'],
            ['nom' => 'Validé administrativement',             'couleur' => '#198754'],
            ['nom' => 'Refusé',                                'couleur' => '#dc3545'],
            ['nom' => 'Archivé',                               'couleur' => '#343a40'],
        ];

        foreach ($statuses as $s) {
            Status::firstOrCreate(['nom' => $s['nom']], ['couleur' => $s['couleur']]);
        }
    }
}
=======
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
    }
}
>>>>>>> d704913ffe19b0dc7ca77cbdca09657be3a8f3a0
