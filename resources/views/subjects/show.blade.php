<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subject Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $subject->sname }}</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>ID:</th>
                                    <td>{{ $subject->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name:</th>
                                    <td>{{ $subject->sname }}</td>
                                </tr>
                                <tr>
                                    <th>Category:</th>
                                    <td>{{ $subject->category }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5>Marks for this Subject</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Date</th>
                                        <th>Mark</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subject->marks as $mark)
                                    <tr>
                                        <td>{{ $mark->student->sname }}</td>
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