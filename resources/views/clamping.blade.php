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
                @foreach($clampings as $index => $clamping)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $clamping->ticket_no }}</td>
                        <td>{{ $clamping->plate_no }}</td>
                        <td>{{ $clamping->reason }}</td>
                        <td>{{ $clamping->location }}</td>
                        <td>{{ $clamping->date_clamped }}</td>
                        <td>{{ $clamping->status }}</td>
                        <td>
                            <button class="btn btn-info">View</button>
                            <button class="btn btn-warning">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
        </table>
    </div>
</div>

@include('partials.add-clamping')

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
