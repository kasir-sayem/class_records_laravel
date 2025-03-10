<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Retrieval') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h4>Query Data</h4>
                    
                    <form action="{{ route('data-retrieval.retrieve') }}" method="POST" class="mb-5">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="student_id" class="form-label">Student</label>
                                <select class="form-select" id="student_id" name="student_id">
                                    <option value="">All Students</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}" {{ request('student_id') == $student->id ? 'selected' : '' }}>
                                            {{ $student->sname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="subject_id" class="form-label">Subject</label>
                                <select class="form-select" id="subject_id" name="subject_id">
                                    <option value="">All Subjects</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->sname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="class" class="form-label">Class</label>
                                <select class="form-select" id="class" name="class">
                                    <option value="">All Classes</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->class }}" {{ request('class') == $class->class ? 'selected' : '' }}>
                                            {{ $class->class }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="mark_type" class="form-label">Mark Type</label>
                                <select class="form-select" id="mark_type" name="mark_type">
                                    <option value="">All Types</option>
                                    <option value="Test" {{ request('mark_type') == 'Test' ? 'selected' : '' }}>Test</option>
                                    <option value="Exam" {{ request('mark_type') == 'Exam' ? 'selected' : '' }}>Exam</option>
                                    <option value="Homework" {{ request('mark_type') == 'Homework' ? 'selected' : '' }}>Homework</option>
                                    <option value="Project" {{ request('mark_type') == 'Project' ? 'selected' : '' }}>Project</option>
                                    <option value="Oral" {{ request('mark_type') == 'Oral' ? 'selected' : '' }}>Oral</option>
                                </select>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="date_from" class="form-label">Date From</label>
                                <input type="date" class="form-control" id="date_from" name="date_from" value="{{ request('date_from') }}">
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="date_to" class="form-label">Date To</label>
                                <input type="date" class="form-control" id="date_to" name="date_to" value="{{ request('date_to') }}">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label d-block">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_all" value="" {{ request('gender') === null ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender_all">All</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_male" value="1" {{ request('gender') === '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender_male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_female" value="0" {{ request('gender') === '0' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender_female">Female</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a href="{{ route('data-retrieval') }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </form>
                    
                    @if(isset($results))
                        <h4>Results</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Class</th>
                                        <th>Gender</th>
                                        <th>Subject</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>Mark</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($results as $result)
                                        <tr>
                                            <td>{{ $result->student->sname }}</td>
                                            <td>{{ $result->student->class }}</td>
                                            <td>{{ $result->student->boy ? 'Male' : 'Female' }}</td>
                                            <td>{{ $result->subject->sname }}</td>
                                            <td>{{ $result->subject->category }}</td>
                                            <td>{{ $result->mdate }}</td>
                                            <td>{{ $result->mark }}</td>
                                            <td>{{ $result->type }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        {{ $results->links() }}
                    @endif
                </div>
            </div>