@extends('layouts.app')

@section('title', 'Violations')

@section('content')
<div class="clamping-container">
    <h2 class="page-title">Clamping Records</h2>

    <!-- Quick Actions -->
    <div class="actions-bar">
        <button class="btn btn-primary" id="addBtn">➕ Add New Clamping</button>
        <!-- Search & Filter -->
        <div class="search-filter">
            <input type="text" class="input-text" placeholder="Search by Plate / Name">
            <select class="select-box">
                <option selected>Status</option>
                <option>Pending</option>
                <option>Paid</option>
                <option>Released</option>
            </select>
            <button class="btn btn-secondary">Filter</button>
        </div>
    </div>

    <!-- Violations Table -->
    <div class="table-wrapper">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ticket No.</th>
                    <th>Plate No.</th>
                    <th>Reason for Clamping</th>
                    <th>Location</th>
                    <th>Date Clamped</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample Rows -->
                <tr>
                    <td>1</td>
                    <td>VN-1001</td>
                    <td>ABC-1234</td>
                    <td>Illegal Parking</td>
                    <td>Main St. Corner Ave.</td>
                    <td>2025-09-21</td>
                    <td><span class="badge danger">Pending</span></td>
                    <td>
                        <button class="btn btn-info">View</button>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>VN-1002</td>
                    <td>XYZ-5678</td>
                    <td>No Parking Zone</td>
                    <td>Market Area</td>
                    <td>2025-09-20</td>
                    <td><span class="badge success">Paid</span></td>
                    <td>
                        <button class="btn btn-info">View</button>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>VN-1002</td>
                    <td>XYZ-5678</td>
                    <td>No Parking Zone</td>
                    <td>Market Area</td>
                    <td>2025-09-20</td>
                    <td><span class="badge success">Paid</span></td>
                    <td>
                        <button class="btn btn-info">View</button>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                 <tr>
                    <td>2</td>
                    <td>VN-1002</td>
                    <td>XYZ-5678</td>
                    <td>No Parking Zone</td>
                    <td>Market Area</td>
                    <td>2025-09-20</td>
                    <td><span class="badge success">Paid</span></td>
                    <td>
                        <button class="btn btn-info">View</button>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@include('partials.add-clamping')

<!-- Script -->
<script>
    const addBtn = document.getElementById('addBtn');
    const closeBtn = document.getElementById('closeBtn');
    const panel = document.getElementById('addPanel');

    addBtn.addEventListener('click', () => {
        panel.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', () => {
        panel.classList.add('hidden');
    });
</script>

@endsection
