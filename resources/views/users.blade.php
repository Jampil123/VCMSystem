@extends('layouts.app')

@section('title', 'Users Dashboard')

@section('content')
<div>
    <!-- <h1>User Management</h1> -->

    <!-- Reports Section -->
    <div class="reports">
        <div class="card">
            <i class="fa-solid fa-users"></i>
            <p>Total Users</p>
            <h2 id="totalUsers">0</h2>
        </div>
        <div class="card">
            <i class="fa-solid fa-user-check"></i>
            <p>Active Users</p>
        <h2 id="activeUsers">0</h2>
        </div>
        <div class="card">
            <i class="fa-solid fa-hourglass-half"></i>
            <p>Pending Users</p>
            <h2 id="pendingUsers">0</h2>
        </div>
        <div class="card">
            <i class="fa-solid fa-user-slash"></i>
            <p>Inactive Users</p>
            <h2 id="inactiveUsers">0</h2>
        </div>
    </div>

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
                <th>Photo & Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr data-status="active" data-role="admin">
                <td>John Doe</td>
                <td>johndoe</td>
                <td>john@example.com</td>
                <td>09123456789</td>
                <td>Admin</td>
                <td><span class="status status-active">Active</span></td>
                <td class="actions">
                    <button class="view-btn">View</button>
                    <button class="approve-btn">Approve</button>
                    <button class="reject-btn">Reject</button>
                </td>
            </tr>
            <tr data-status="pending" data-role="enforcer">
                <td>Jane Smith</td>
                <td>janesmith</td>
                <td>jane@example.com</td>
                <td>09998887777</td>
                <td>Enforcer</td>
                <td><span class="status status-pending">Pending</span></td>
                <td class="actions">
                    <button class="view-btn">View</button>
                    <button class="approve-btn">Approve</button>
                    <button class="reject-btn">Reject</button>
                </td>
            </tr>
            <tr data-status="inactive" data-role="user">
                <td>Mark Lee</td>
                <td>marklee</td>
                <td>mark@example.com</td>
                <td>09223334444</td>
                <td>User</td>
                <td><span class="status status-inactive">Inactive</span></td>
                <td class="actions">
                    <button class="view-btn">View</button>
                    <button class="approve-btn">Approve</button>
                    <button class="reject-btn">Reject</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection