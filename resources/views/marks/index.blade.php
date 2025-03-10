<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Marks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @auth
                        <div class="mb-4">
                            <a href="{{ route('marks.create') }}" class="btn btn-primary">Add New Mark</a>
                        </div>
                    @endauth

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Mark</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($marks as $mark)
                                <tr>
                                    <td>{{ $mark->id }}</td>
                                    <td>{{ $mark->student->sname }}</td>
                                    <td>{{ $mark->subject->sname }}</td>
                                    <td>{{ $mark->mdate }}</td>
                                    <td>{{ $mark->mark }}</td>
                                    <td>{{ $mark->type }}</td>
                                    <td>
                                        <a href="{{ route('marks.show', $mark->id) }}" class="btn btn-sm btn-info">View</a>
                                        @auth
                                            <a href="{{ route('marks.edit', $mark->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            
                                            @if(Auth::user()->isAdmin())
                                                <form action="{{ route('marks.destroy', $mark->id) }}" method="POST" style="display:inline">
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

                    {{ $marks->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>