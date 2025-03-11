<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $subjects = [
            ['id' => 1, 'sname' => 'Information Technology', 'category' => 'information technology'],
            ['id' => 2, 'sname' => 'Earth and Environmental Science', 'category' => 'science'],
            ['id' => 3, 'sname' => 'Literature', 'category' => 'humanities'],
            ['id' => 4, 'sname' => 'History', 'category' => 'humanities'],
            ['id' => 5, 'sname' => 'Mathematics', 'category' => 'mathematics'],
            ['id' => 6, 'sname' => 'Physics', 'category' => 'science'],
            ['id' => 7, 'sname' => 'Singing and Music', 'category' => 'arts'],
            ['id' => 8, 'sname' => 'Drawing and Visual Culture', 'category' => 'arts'],
            ['id' => 9, 'sname' => 'Philosophy', 'category' => 'humanities'],
            ['id' => 10, 'sname' => 'Biology', 'category' => 'science'],
            ['id' => 11, 'sname' => 'Chemistry', 'category' => 'science'],
            ['id' => 12, 'sname' => 'English Language', 'category' => 'languages'],
            ['id' => 13, 'sname' => 'French Language', 'category' => 'languages'],
            ['id' => 14, 'sname' => 'German Language', 'category' => 'languages'],
            ['id' => 15, 'sname' => 'Italian Language', 'category' => 'languages'],
            ['id' => 16, 'sname' => 'Russian Language', 'category' => 'languages'],
            ['id' => 17, 'sname' => 'Spanish Language', 'category' => 'languages'],
            ['id' => 18, 'sname' => 'Latin Language', 'category' => 'languages'],
            ['id' => 19, 'sname' => 'Hungarian Language', 'category' => 'humanities'],
            ['id' => 20, 'sname' => 'Arts', 'category' => 'arts'],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}