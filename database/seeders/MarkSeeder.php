<?php

namespace Database\Seeders;

use App\Models\Mark;
use Illuminate\Database\Seeder;

class MarkSeeder extends Seeder
{
    public function run()
    {
        $marks = [
            ['studentid' => 140, 'mdate' => '2010-09-08', 'mark' => 4, 'type' => 'oral assessment', 'subjectid' => 13],
            ['studentid' => 105, 'mdate' => '2010-09-08', 'mark' => 5, 'type' => 'oral assessment', 'subjectid' => 13],
            ['studentid' => 105, 'mdate' => '2010-09-08', 'mark' => 4, 'type' => 'oral assessment', 'subjectid' => 13],
            ['studentid' => 345, 'mdate' => '2010-09-07', 'mark' => 5, 'type' => 'oral assessment', 'subjectid' => 6],
            ['studentid' => 390, 'mdate' => '2010-09-07', 'mark' => 5, 'type' => 'oral assessment', 'subjectid' => 6],
            ['studentid' => 365, 'mdate' => '2010-09-07', 'mark' => 5, 'type' => 'lesson work', 'subjectid' => 6],
            ['studentid' => 351, 'mdate' => '2010-09-06', 'mark' => 5, 'type' => 'oral assessment', 'subjectid' => 5],
            ['studentid' => 366, 'mdate' => '2010-09-06', 'mark' => 5, 'type' => 'oral assessment', 'subjectid' => 3],
            // Add more mark data for testing
        ];

        foreach ($marks as $mark) {
            // Convert the date format from Y.m.d to Y-m-d
            Mark::create($mark);
        }
    }
}