<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>

                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="sname" class="form-label">Name</label>
                            <input type="text" class="form-control @error('sname') is-invalid @enderror" id="sname" name="sname" value="{{ old('sname') }}">
                            @error('sname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="class" class="form-label">Class</label>
                            <input type="text" class="form-control @error('class') is-invalid @enderror" id="class" name="class" value="{{ old('class') }}">
                            @error('class')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="boy" id="boy1" value="1" {{ old('boy') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="boy1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="boy" id="boy0" value="0" {{ old('boy') == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="boy0">
                                    Female
                                </label>
                            </div>
                            @error('boy')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>