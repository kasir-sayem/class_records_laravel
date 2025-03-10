<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Mark') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('marks.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>

                    <form action="{{ route('marks.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="studentid" class="form-label">Student</label>
                            <select class="form-select @error('studentid') is-invalid @enderror" id="studentid" name="studentid">
                                <option value="">Select Student</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ old('studentid') == $student->id ? 'selected' : '' }}>
                                        {{ $student->sname }} ({{ $student->class }})
                                    </option>
                                @endforeach
                            </select>
                            @error('studentid')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="subjectid" class="form-label">Subject</label>
                            <select class="form-select @error('subjectid') is-invalid @enderror" id="subjectid" name="subjectid">
                                <option value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ old('subjectid') == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->sname }} ({{ $subject->category }})
                                    </option>
                                @endforeach
                            </select>
                            @error('subjectid')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="mdate" class="form-label">Date</label>
                            <input type="date" class="form-control @error('mdate') is-invalid @enderror" id="mdate" name="mdate" value="{{ old('mdate') }}">
                            @error('mdate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="mark" class="form-label">Mark (1-5)</label>
                            <input type="number" min="1" max="5" class="form-control @error('mark') is-invalid @enderror" id="mark" name="mark" value="{{ old('mark') }}">
                            @error('mark')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                                <option value="">Select Type</option>
                                <option value="Test" {{ old('type') == 'Test' ? 'selected' : '' }}>Test</option>
                                <option value="Exam" {{ old('type') == 'Exam' ? 'selected' : '' }}>Exam</option>
                                <option value="Homework" {{ old('type') == 'Homework' ? 'selected' : '' }}>Homework</option>
                                <option value="Project" {{ old('type') == 'Project' ? 'selected' : '' }}>Project</option>
                                <option value="Oral" {{ old('type') == 'Oral' ? 'selected' : '' }}>Oral</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Mark</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>