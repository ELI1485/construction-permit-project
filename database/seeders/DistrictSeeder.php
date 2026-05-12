<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        $districts = [
            // جهة طنجة تطوان الحسيمة
            ['nom' => 'طنجة (Tanger)', 'region' => 'جهة طنجة تطوان الحسيمة'],
            ['nom' => 'تطوان (Tétouan)', 'region' => 'جهة طنجة تطوان الحسيمة'],
            ['nom' => 'الحسيمة (Al Hoceïma)', 'region' => 'جهة طنجة تطوان الحسيمة'],
            ['nom' => 'شفشاون (Chefchaouen)', 'region' => 'جهة طنجة تطوان الحسيمة'],
            ['nom' => 'العرائش (Larache)', 'region' => 'جهة طنجة تطوان الحسيمة'],
            ['nom' => 'قرية باب برد (Bab Berred)', 'region' => 'جهة طنجة تطوان الحسيمة'],

            // جهة الشرق
            ['nom' => 'وجدة (Oujda)', 'region' => 'جهة الشرق'],
            ['nom' => 'الناظور (Nador)', 'region' => 'جهة الشرق'],
            ['nom' => 'بركان (Berkane)', 'region' => 'جهة الشرق'],
            ['nom' => 'تاوريرت (Taourirt)', 'region' => 'جهة الشرق'],
            ['nom' => 'فجيج (Figuig)', 'region' => 'جهة الشرق'],
            ['nom' => 'قرية تافوغالت (Tafoughalt)', 'region' => 'جهة الشرق'],

            // جهة فاس مكناس
            ['nom' => 'فاس (Fès)', 'region' => 'جهة فاس مكناس'],
            ['nom' => 'مكناس (Meknès)', 'region' => 'جهة فاس مكناس'],
            ['nom' => 'تازة (Taza)', 'region' => 'جهة فاس مكناس'],
            ['nom' => 'إفران (Ifrane)', 'region' => 'جهة فاس مكناس'],
            ['nom' => 'صفرو (Sefrou)', 'region' => 'جهة فاس مكناس'],
            ['nom' => 'قرية عين اللوح (Ain Leuh)', 'region' => 'جهة فاس مكناس'],

            // جهة الرباط سلا القنيطرة
            ['nom' => 'الرباط (Rabat)', 'region' => 'جهة الرباط سلا القنيطرة'],
            ['nom' => 'سلا (Salé)', 'region' => 'جهة الرباط سلا القنيطرة'],
            ['nom' => 'القنيطرة (Kénitra)', 'region' => 'جهة الرباط سلا القنيطرة'],
            ['nom' => 'الخميسات (Khemisset)', 'region' => 'جهة الرباط سلا القنيطرة'],
            ['nom' => 'تمارة (Témara)', 'region' => 'جهة الرباط سلا القنيطرة'],
            ['nom' => 'قرية سيدي يحيى الغرب (Sidi Yahya)', 'region' => 'جهة الرباط سلا القنيطرة'],

            // جهة الدار البيضاء سطات
            ['nom' => 'الدار البيضاء (Casablanca)', 'region' => 'جهة الدار البيضاء سطات'],
            ['nom' => 'المحمدية (Mohammédia)', 'region' => 'جهة الدار البيضاء سطات'],
            ['nom' => 'سطات (Settat)', 'region' => 'جهة الدار البيضاء سطات'],
            ['nom' => 'الجديدة (El Jadida)', 'region' => 'جهة الدار البيضاء سطات'],
            ['nom' => 'برشيد (Berrechid)', 'region' => 'جهة الدار البيضاء سطات'],
            ['nom' => 'قرية بولعوان (Boulaouane)', 'region' => 'جهة الدار البيضاء سطات'],

            // جهة بني ملال خنيفرة
            ['nom' => 'بني ملال (Béni Mellal)', 'region' => 'جهة بني ملال خنيفرة'],
            ['nom' => 'خريبكة (Khouribga)', 'region' => 'جهة بني ملال خنيفرة'],
            ['nom' => 'خنيفرة (Khénifra)', 'region' => 'جهة بني ملال خنيفرة'],
            ['nom' => 'أزيلال (Azilal)', 'region' => 'جهة بني ملال خنيفرة'],
            ['nom' => 'قرية أوزود (Ouzoud)', 'region' => 'جهة بني ملال خنيفرة'],

            // جهة مراكش آسفي
            ['nom' => 'مراكش (Marrakech)', 'region' => 'جهة مراكش آسفي'],
            ['nom' => 'آسفي (Safi)', 'region' => 'جهة مراكش آسفي'],
            ['nom' => 'الصويرة (Essaouira)', 'region' => 'جهة مراكش آسفي'],
            ['nom' => 'قلعة السراغنة (El Kelaâ)', 'region' => 'جهة مراكش آسفي'],
            ['nom' => 'الحوز (Al Haouz)', 'region' => 'جهة مراكش آسفي'],
            ['nom' => 'قرية إمليل (Imlil)', 'region' => 'جهة مراكش آسفي'],

            // جهة درعة تافيلالت
            ['nom' => 'الرشيدية (Errachidia)', 'region' => 'جهة درعة تافيلالت'],
            ['nom' => 'ورزازات (Ouarzazate)', 'region' => 'جهة درعة تافيلالت'],
            ['nom' => 'تنغير (Tinghir)', 'region' => 'جهة درعة تافيلالت'],
            ['nom' => 'زاكورة (Zagora)', 'region' => 'جهة درعة تافيلالت'],
            ['nom' => 'ميدلت (Midelt)', 'region' => 'جهة درعة تافيلالت'],
            ['nom' => 'قرية مرزوكة (Merzouga)', 'region' => 'جهة درعة تافيلالت'],

            // جهة سوس ماسة
            ['nom' => 'أكادير (Agadir)', 'region' => 'جهة سوس ماسة'],
            ['nom' => 'تارودانت (Taroudant)', 'region' => 'جهة سوس ماسة'],
            ['nom' => 'تزنيت (Tiznit)', 'region' => 'جهة سوس ماسة'],
            ['nom' => 'إنزكان (Inezgane)', 'region' => 'جهة سوس ماسة'],
            ['nom' => 'طاطا (Tata)', 'region' => 'جهة سوس ماسة'],
            ['nom' => 'قرية تفراوت (Tafraout)', 'region' => 'جهة سوس ماسة'],

            // جهة كلميم واد نون
            ['nom' => 'كلميم (Guelmim)', 'region' => 'جهة كلميم واد نون'],
            ['nom' => 'طانطان (Tan-Tan)', 'region' => 'جهة كلميم واد نون'],
            ['nom' => 'سيدي إفني (Sidi Ifni)', 'region' => 'جهة كلميم واد نون'],
            ['nom' => 'أسا الزاك (Assa-Zag)', 'region' => 'جهة كلميم واد نون'],
            ['nom' => 'قرية أمتدي (Amtoudi)', 'region' => 'جهة كلميم واد نون'],

            // جهة العيون الساقية الحمراء
            ['nom' => 'العيون (Laâyoune)', 'region' => 'جهة العيون الساقية الحمراء'],
            ['nom' => 'بوجدور (Boujdour)', 'region' => 'جهة العيون الساقية الحمراء'],
            ['nom' => 'السمارة (Es-Semara)', 'region' => 'جهة العيون الساقية الحمراء'],
            ['nom' => 'طرفاية (Tarfaya)', 'region' => 'جهة العيون الساقية الحمراء'],
            ['nom' => 'قرية الدورة (Daoura)', 'region' => 'جهة العيون الساقية الحمراء'],

            // جهة الداخلة وادي الذهب
            ['nom' => 'الداخلة (Dakhla)', 'region' => 'جهة الداخلة وادي الذهب'],
            ['nom' => 'أوسرد (Aousserd)', 'region' => 'جهة الداخلة وادي الذهب'],
            ['nom' => 'قرية بئر كندوز (Bir Gandouz)', 'region' => 'جهة الداخلة وادي الذهب'],
        ];

        foreach ($districts as $d) {
            District::firstOrCreate(['nom' => $d['nom']], ['region' => $d['region']]);
        }
    }
}
