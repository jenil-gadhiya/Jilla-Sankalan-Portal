<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Designation;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designations = [
            ['designation_name' => 'Collector'],
            ['designation_name' => 'Additional Collector'],
            ['designation_name' => 'Prant Officer'],
            ['designation_name' => 'Mamlatdar'],
            ['designation_name' => 'Deputy Mamlatdar'],
        ];
        foreach ($designations as $designation)
            Designation::create($designation);
    }
}
