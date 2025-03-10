<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $student->sname }}</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>ID:</th>
                                    <td>{{ $student->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name:</th>
                                    <td>{{ $student->sname }}</td>
                                </tr>
                                <tr>
                                    <th>Class:</th>
                                    <td>{{ $student->class }}</td>
                                </tr>
                                <tr>
                                    <th>Gender:</th>
                                    <td>{{ $student->boy ? 'Male' : 'Female' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5>Marks</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>Mark</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student->marks as $mark)
                                    <tr>
                                        <td>{{ $mark->subject->sname }}</td>
                                        <td>{{ $mark->mdate }}</td>
                                        <td>{{ $mark->mark }}</td>
                                        <td>{{ $mark->type }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>