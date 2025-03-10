<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-4">Welcome to the Class Record System</h3>
                    
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Students</h5>
                                    <p class="card-text display-4">{{ $studentsCount }}</p>
                                    <a href="{{ route('students.index') }}" class="btn btn-light">View All</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-4">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Subjects</h5>
                                    <p class="card-text display-4">{{ $subjectsCount }}</p>
                                    <a href="{{ route('subjects.index') }}" class="btn btn-light">View All</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-4">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Marks</h5>
                                    <p class="card-text display-4">{{ $marksCount }}</p>
                                    <a href="{{ route('marks.index') }}" class="btn btn-light">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Quick Links</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <a href="{{ route('data-retrieval') }}">Data Retrieval</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{ route('charts') }}">Performance Charts</a>
                                        </li>
                                        @auth
                                            <li class="list-group-item">
                                                <a href="{{ route('students.create') }}">Add New Student</a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="{{ route('subjects.create') }}">Add New Subject</a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="{{ route('marks.create') }}">Add New Mark</a>
                                            </li>
                                        @endauth
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>System Information</h5>
                                </div>
                                <div class="card-body">
                                    <p>Welcome to the Class Record System. This application allows you to manage students, subjects, and marks in a school environment.</p>
                                    
                                    @guest
                                        <p>Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to access additional features.</p>
                                    @else
                                        <p>You are logged in as <strong>{{ Auth::user()->name }}</strong> with role <strong>{{ Auth::user()->role->name }}</strong>.</p>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>