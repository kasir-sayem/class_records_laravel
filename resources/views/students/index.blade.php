<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @auth
                        <div class="mb-4">
                            <a href="{{ route('students.create') }}" class="btn btn-primary">Add New Student</a>
                        </div>
                    @endauth

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Gender</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->sname }}</td>
                                    <td>{{ $student->class }}</td>
                                    <td>{{ $student->boy ? 'Male' : 'Female' }}</td>
                                    <td>
                                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-info">View</a>
                                        @auth
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            
                                            @if(Auth::user()->isAdmin())
                                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            @endif
                                        @endauth
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>