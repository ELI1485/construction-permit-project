<?php

namespace Database\Seeders;

<<<<<<< HEAD
=======
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
>>>>>>> d704913ffe19b0dc7ca77cbdca09657be3a8f3a0
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
<<<<<<< HEAD
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            DistrictSeeder::class,
            StatusSeeder::class,
            PermitTypeSeeder::class,
            UserSeeder::class,
        ]);
    }
}
=======
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 
    }
}
>>>>>>> d704913ffe19b0dc7ca77cbdca09657be3a8f3a0
