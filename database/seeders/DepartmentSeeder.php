<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['department_name' => 'Education Department'],
            ['department_name' => 'Home Department'],
            ['department_name' => 'Revenue Department'],
            ['department_name' => 'Custom Department'],
            ['department_name' => 'other'],
        ];
        foreach ($departments as $department)
            Department::create($department);
    }
}
