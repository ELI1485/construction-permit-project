<?php

namespace Database\Seeders;

<<<<<<< HEAD
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['citoyen', 'architecte', 'agent_urbanisme', 'service_technique', 'administrateur'] as $nom) {
            Role::firstOrCreate(['nom' => $nom]);
        }
    }
}
=======
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
