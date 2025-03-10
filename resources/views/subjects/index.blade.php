<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subjects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @auth
                        <div class="mb-4">
                            <a href="{{ route('subjects.create') }}" class="btn btn-primary">Add New Subject</a>
                        </div>
                    @endauth

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->id }}</td>
                                    <td>{{ $subject->sname }}</td>
                                    <td>{{ $subject->category }}</td>
                                    <td>
                                        <a href="{{ route('subjects.show', $subject->id) }}" class="btn btn-sm btn-info">View</a>
                                        @auth
                                            <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            
                                            @if(Auth::user()->isAdmin())
                                                <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display:inline">
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

                    {{ $subjects->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>