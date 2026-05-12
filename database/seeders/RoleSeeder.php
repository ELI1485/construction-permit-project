<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'citoyen',
            'architecte',
            'agent_urbanisme',
            'service_technique',
            'مواطن',
            'ممثل الشخص المعنوي',
            'مهندس معماري',
            'مهندس مساح طوبوغرافي',
            'ممثل منعش عقاري',
            'مهندس مختص',
            'ممثل جماعة ترابية',
            'عضو اللجنة',
            'ممثل متعهد شركة الاتصالات',
            'ممثل متعهد شركة شبكات الماء والكهرباء',
            'administrateur',
        ];

        foreach ($roles as $nom) {
            Role::firstOrCreate(['nom' => $nom]);
        }
    }
}
