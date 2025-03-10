<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataRetrievalController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $subjects = Subject::all();
        $classes = Student::select('class')->distinct()->get();
        
        return view('data-retrieval.index', compact('students', 'subjects', 'classes'));
    }
    
    public function retrieve(Request $request)
    {
        $query = Mark::query()->with(['student', 'subject']);
        
        if ($request->has('student_id') && $request->student_id) {
            $query->where('studentid', $request->student_id);
        }
        
        if ($request->has('subject_id') && $request->subject_id) {
            $query->where('subjectid', $request->subject_id);
        }
        
        if ($request->has('class') && $request->class) {
            $query->whereHas('student', function($q) use ($request) {
                $q->where('class', $request->class);
            });
        }
        
        if ($request->has('mark_type') && $request->mark_type) {
            $query->where('type', $request->mark_type);
        }
        
        if ($request->has('date_from') && $request->date_from) {
            $query->where('mdate', '>=', $request->date_from);
        }
        
        if ($request->has('date_to') && $request->date_to) {
            $query->where('mdate', '<=', $request->date_to);
        }
        
        if ($request->has('gender') && in_array($request->gender, ['0', '1'])) {
            $query->whereHas('student', function($q) use ($request) {
                $q->where('boy', $request->gender);
            });
        }
        
        $results = $query->paginate(15);
        
        $students = Student::all();
        $subjects = Subject::all();
        $classes = Student::select('class')->distinct()->get();
        
        return view('data-retrieval.index', compact('results', 'students', 'subjects', 'classes'));
    }
}