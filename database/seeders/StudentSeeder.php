<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $students = [
            ['id' => 1, 'sname' => 'Pék Roland', 'class' => '12/B', 'boy' => 1],
            ['id' => 2, 'sname' => 'Illin Zita', 'class' => '12/C', 'boy' => 0],
            ['id' => 3, 'sname' => 'Ördögh Dániel', 'class' => '12/B', 'boy' => 1],
            ['id' => 4, 'sname' => 'Barta Ildikó', 'class' => '12/C', 'boy' => 0],
            ['id' => 5, 'sname' => 'Simony Kata', 'class' => '12/B', 'boy' => 0],
            ['id' => 6, 'sname' => 'Csepreg Natália', 'class' => '12/A', 'boy' => 0],
            // In StudentSeeder.php, add these students to the $students array:
            ['id' => 140, 'sname' => 'Test Student 140', 'class' => '11/A', 'boy' => 0],
            ['id' => 345, 'sname' => 'Test Student 345', 'class' => '10/B', 'boy' => 1],
            ['id' => 351, 'sname' => 'Test Student 351', 'class' => '10/B', 'boy' => 0],
            ['id' => 365, 'sname' => 'Test Student 365', 'class' => '10/A', 'boy' => 1],
            ['id' => 366, 'sname' => 'Test Student 366', 'class' => '10/A', 'boy' => 0],
            ['id' => 390, 'sname' => 'Test Student 390', 'class' => '9/C', 'boy' => 1],
            ['id' => 105, 'sname' => 'Test Student 105', 'class' => '11/A', 'boy' => 1],
            // Add more students as needed for testing
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}