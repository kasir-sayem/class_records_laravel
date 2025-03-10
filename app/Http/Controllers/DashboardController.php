<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Mark;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studentsCount = Student::count();
        $subjectsCount = Subject::count();
        $marksCount = Mark::count();
        
        return view('dashboard', compact('studentsCount', 'subjectsCount', 'marksCount'));
    }
}