<?php

namespace Database\Seeders;

<<<<<<< HEAD
use Illuminate\Database\Seeder;
use App\Models\PermitType;

class PermitTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = ['Résidentiel', 'Commercial', 'Industriel', 'Agricole', 'Infrastructure'];
        foreach ($types as $nom) {
            PermitType::firstOrCreate(['nom' => $nom]);
        }
    }
}
=======
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermitTypeSeeder extends Seeder
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
