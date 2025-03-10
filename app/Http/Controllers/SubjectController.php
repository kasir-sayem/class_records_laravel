<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('admin')->only(['destroy']);
    }
    
    public function index()
    {
        $subjects = Subject::latest()->paginate(10);
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sname' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index')
            ->with('success', 'Subject created successfully.');
    }

    public function show(Subject $subject)
    {
        return view('subjects.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'sname' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')
            ->with('success', 'Subject updated successfully');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')
            ->with('success', 'Subject deleted successfully');
    }
}