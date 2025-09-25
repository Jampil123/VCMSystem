@extends('layouts.app')

@section('title', 'Clamping Dashboard')

@section('content')
<div class="dashboard">
    <div class="wrapper">
        <!-- Top Header -->
        <h2>Hi, Admin</h2>
        <p>Here’s an overview of today’s clamping reports</p>

        <div class="reports-container">
            <!-- Stats Cards -->
            <div class="reports">
                <div class="card">
                    <i class='bx bx-car'></i>
                    <h3>120</h3>
                    <p>Total Clamped Vehicles</p>
                    <span class="trend up">+12%</span>
                </div>
                <div class="card">
                    <i class='bx bx-error'></i>
                    <h3>45</h3>
                    <p>Active Violations</p>
                    <span class="trend down">-8%</span>
                </div>
                <div class="card">
                    <i class='bx bx-money'></i>
                    <h3>₱56,800</h3>
                    <p>Total Collected Fines</p>
                    <span class="trend up">+18%</span>
                </div>
            </div>

            <!-- Chart Section -->
            <div class="chart-section">
                <h4>Violations per Day</h4>
                <div class="chart-placeholder">
                    <!-- You can integrate Chart.js or any chart library here -->
                    <p>[Chart of Violations Here]</p>
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
                <tbody>
                    <tr>
                        <td>Juan Dela Cruz</td>
                        <td>juan@clamping.com</td>
                        <td><span class="status active">Active</span></td>
                        <td>Main Street</td>
                    </tr>
                    <tr>
                        <td>Maria Santos</td>
                        <td>maria@clamping.com</td>
                        <td><span class="status probation">Probation</span></td>
                        <td>Downtown</td>
                    </tr>
                    <tr>
                        <td>Carlos Reyes</td>
                        <td>carlos@clamping.com</td>
                        <td><span class="status inactive">Inactive</span></td>
                        <td>Market Area</td>
                    </tr>
                    <tr>
                        <td>Maria Santos</td>
                        <td>maria@clamping.com</td>
                        <td><span class="status probation">Probation</span></td>
                        <td>Downtown</td>
                    </tr>
                    <tr>
                        <td>Maria Santos</td>
                        <td>maria@clamping.com</td>
                        <td><span class="status probation">Probation</span></td>
                        <td>Downtown</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

