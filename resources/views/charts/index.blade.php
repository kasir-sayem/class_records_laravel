<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Performance Charts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Average Mark by Subject</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="subjectChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Monthly Average Performance</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="monthlyChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Convert PHP arrays to JavaScript
        const subjects = @json($subjects);
        const averages = @json($averages);
        const months = @json($months);
        const monthlyAvg = @json($monthlyAvg);
        
        // Subject Chart
        const subjectCtx = document.getElementById('subjectChart').getContext('2d');
        const subjectChart = new Chart(subjectCtx, {
            type: 'bar',
            data: {
                labels: subjects,
                datasets: [{
                    label: 'Average Mark',
                    data: averages,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 5
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Average Mark by Subject'
                    }
                }
            }
        });
        
        // Monthly Chart
        const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
        const monthlyChart = new Chart(monthlyCtx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Monthly Average',
                    data: monthlyAvg,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 5
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Monthly Average Performance'
                    }
                }
            }
        });
    </script>
</x-app-layout>