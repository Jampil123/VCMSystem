@extends('layouts.app')

@section('title', 'Clamping Dashboard')

@section('content')
<div class="dashboard">
    <div class="wrapper">
        <!-- Top Header -->
        <h2>Hi, Admin</h2>
        <p>Here’s an overview of today’s clamping reports</p>

        <div class="reports-container">
            <!-- Move chart-section to the top -->
            <div class="chart-section">
                <h4>Violations per Day</h4>
                <div>
                    <canvas id="violationsChart"></canvas>
                </div>
            </div>

            <!-- Cards go below -->
            <div class="reports">
                <div class="card">
                    <i class='bx bx-car'></i>
                    <h3>{{ $totalClamped }}</h3>
                    <p>Total Clamped Vehicles</p>
                </div>

                <div class="card">
                    <i class='bx bx-error'></i>
                    <h3>{{ $activeViolations }}</h3>
                    <p>Active Violations</p>
                </div>

                <div class="card">
                    <i class='bx bx-money'></i>
                    <h3>₱{{ number_format($totalFines, 2) }}</h3>
                    <p>Total Collected Fines</p>
                </div>
            </div>
        </div>
    </div>


    <div class="enforcers">
        <h3>Enforcers</h3>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Enforcer Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Assigned Area</th>
                    </tr>
                </thead>
                   @forelse($enforcers as $enforcer)
                    <tr>
                        <td>{{ ($enforcer->f_name ?? '') . ' ' . ($enforcer->l_name ?? '') }}</td>
                        <td>{{ $enforcer->email }}</td>
                        <td>
                            <span class="status {{ strtolower($enforcer->status->status ?? 'unknown') }}">
                                {{ $enforcer->status->status ?? 'Unknown' }}
                            </span>
                        </td>
                        <td>{{ $enforcer->enforcer_id ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No enforcers found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('violationsChart').getContext('2d');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($violationsPerDay->pluck('date')) !!}, // dates from DB
        datasets: [{
            label: 'Violations per Day',
            data: {!! json_encode($violationsPerDay->pluck('total')) !!}, // unpaid clampings
            backgroundColor: '#22c55e', // green like your sample
            borderRadius: 8, // rounded top corners
            borderSkipped: false // round top
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
            title: {
                display: true,
                text: 'Violations per Day',
                font: { size: 16, weight: 'bold' }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                },
                title: {
                    display: true,
                    text: 'Number of Violations'
                }
            },
            x: {
                grid: { display: false },
                title: {
                    display: true,
                    text: 'Date'
                }
            }
        }
    }
});
</script>

@endsection

