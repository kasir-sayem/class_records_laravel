<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('admin')->only(['destroy']);
    }
    
    public function index()
    {
        $marks = Mark::with(['student', 'subject'])->latest()->paginate(10);
        return view('marks.index', compact('marks'));
    }

    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('marks.create', compact('students', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'studentid' => 'required|exists:students,id',
            'subjectid' => 'required|exists:subjects,id',
            'mdate' => 'required|date',
            'mark' => 'required|integer|min:1|max:5',
            'type' => 'required|string|max:255',
        ]);

        Mark::create($request->all());

        return redirect()->route('marks.index')
            ->with('success', 'Mark created successfully.');
    }

    public function show(Mark $mark)
    {
        return view('marks.show', compact('mark'));
    }

    public function edit(Mark $mark)
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('marks.edit', compact('mark', 'students', 'subjects'));
    }

    public function update(Request $request, Mark $mark)
    {
        $request->validate([
            'studentid' => 'required|exists:students,id',
            'subjectid' => 'required|exists:subjects,id',
            'mdate' => 'required|date',
            'mark' => 'required|integer|min:1|max:5',
            'type' => 'required|string|max:255',
        ]);

        $mark->update($request->all());

        return redirect()->route('marks.index')
            ->with('success', 'Mark updated successfully');
    }

    public function destroy(Mark $mark)
    {
        $mark->delete();

        return redirect()->route('marks.index')
            ->with('success', 'Mark deleted successfully');
    }
}