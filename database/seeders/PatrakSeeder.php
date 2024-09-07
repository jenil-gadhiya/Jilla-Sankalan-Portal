<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patrak;

class PatrakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patraks = [
            [
                'patrak_name' => 'Civil authority case disposal',
                'patrak_guj_name' => 'નાગરિક અધિકાર (ખરડા) અન્વયે મળેલ અરજીઓના નિકાલની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો'
            ],

            [
                'patrak_name' => 'Information of pending cases for pension',
                'patrak_guj_name' => 'પત્રક-3 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ : બાકી પેન્શન કેસોના નિકાલની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો'
            ],

            [
                'patrak_name' => 'Ag audit pending para information',
                'patrak_guj_name' => 'પત્રક-4 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ : એ. જી. ઓડીટ બાકી પેરાની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો'
            ],

            [
                'patrak_name' => 'Information of pending sheets',
                'patrak_guj_name' => 'પત્રક-5 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ :પડતર કાગળોની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો'
            ],

            [
                'patrak_name' => 'Information of pending recovery',
                'patrak_guj_name' => 'પત્રક-6 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ : સરકારી બાકી વસૂલાતની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો'
            ],

            [
                'patrak_name' => 'Departmental investigation',
                'patrak_guj_name' => 'પત્રક-7 - જિલ્લા સંકલન -વ- ફરિયાદ સમિતિ : ખાતાકીય તપાસની માહિતી દર્શાવતુ પત્રક : સુરત જિલ્લો'
            ],

            [
                'patrak_name' => 'RTI application',
                'patrak_guj_name' => 'આરટીઆઇ અરજી અંગેનું માસિક પત્રક : સુરત જિલ્લો'
            ],

            [
                'patrak_name' => 'RTI appeal',
                'patrak_guj_name' => 'આરટીઆઇ અપીલ અંગેનું માસિક પત્રક : સુરત જિલ્લો'
            ],

            [
                'patrak_name' => 'MPMLA pending letters',
                'patrak_guj_name' => 'MP-MLA Pending Letters'
            ],
        ];
        foreach ($patraks as $patrak)
            Patrak::create($patrak);
    }
}
