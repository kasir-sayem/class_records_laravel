<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mark Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('marks.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Mark Details</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>ID:</th>
                                    <td>{{ $mark->id }}</td>
                                </tr>
                                <tr>
                                    <th>Student:</th>
                                    <td>{{ $mark->student->sname }}</td>
                                </tr>
                                <tr>
                                    <th>Subject:</th>
                                    <td>{{ $mark->subject->sname }}</td>
                                </tr>
                                <tr>
                                    <th>Date:</th>
                                    <td>{{ $mark->mdate }}</td>
                                </tr>
                                <tr>
                                    <th>Mark:</th>
                                    <td>{{ $mark->mark }}</td>
                                </tr>
                                <tr>
                                    <th>Type:</th>
                                    <td>{{ $mark->type }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>