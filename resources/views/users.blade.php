@extends('layouts.app')

@section('title', 'Users Dashboard')

@section('content')
<div>

    <!-- Reports Section -->
    <div class="user-reports">
        <div class="card">
            <i class="fa-solid fa-users"></i>
            <p>Total Users</p>
            <h2 id="totalUsers">{{ $totalUsers }}</h2>
        </div>
        <div class="card">
            <i class="fa-solid fa-user-check"></i>
            <p>Active Users</p>
            <h2 id="activeUsers">{{ $activeUsers }}</h2>
        </div>
        <div class="card">
            <i class="fa-solid fa-hourglass-half"></i>
            <p>Pending Users</p>
            <h2 id="pendingUsers">{{ $pendingUsers }}</h2>
        </div>
        <div class="card">
            <i class="fa-solid fa-user-slash"></i>
            <p>Inactive Users</p>
            <h2 id="inactiveUsers">{{ $inactiveUsers }}</h2>
        </div>
    </div>

    
    <div class="userTable-container">
        <h2 class="page-title">User Management</h2>
        <!-- Filters -->
        <div class="filters">
            <input type="text" id="searchInput" placeholder="Search users...">
            <select id="statusFilter">
                <option value="">All Status</option>
                <option value="active">Active</option>
                <option value="pending">Pending</option>
                <option value="inactive">Inactive</option>
            </select>
            <select id="roleFilter">
                <option value="">All Roles</option>
                <option value="admin">Admin</option>
                <option value="enforcer">Enforcer</option>
                <option value="user">User</option>
            </select>
        </div>

        <!-- User Table -->
        <table id="userTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr>
                    <td class="user-profile">
                        <img src="{{ $user->details && $user->details->photo ? asset('storage/' . $user->details->photo) : asset('images/default-avatar.png') }}" 
                            alt="{{ $user->f_name }} {{ $user->l_name }}">
                        <span>{{ $user->f_name }} {{ $user->l_name }}</span>
                    </td>

                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone ?? '—' }}</td>
                    <td>{{ $user->role->name ?? '—' }}</td>
                    <td>
                        @php
                            $status = strtolower($user->status->status ?? 'unknown');

                            // map database statuses to CSS classes
                            $statusClass = match($status) {
                                'approved' => 'active',
                                'pending' => 'probation',
                                'suspended' => 'inactive',
                                default => '',
                            };
                        @endphp
                        <span class="status {{ $statusClass }}">
                            {{ ucfirst($status) }}
                        </span>
                    </td>

                    <td class="actions">
                        <button class="view-btn">View</button>
                        <button class="approve-btn">Approve</button>
                        <button class="reject-btn">Reject</button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection