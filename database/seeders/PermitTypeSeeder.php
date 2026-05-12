<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PermitType;

class PermitTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'تراخيص المجال الاقتصادي',
            'تراخيص مجال التعمير',
            'تراخيص مجال الربط بالشبكات',
            'الخدمات الإلكترونية متعددة الوظائف',
        ];

        foreach ($types as $nom) {
            PermitType::firstOrCreate(['nom' => $nom]);
        }
    }
}