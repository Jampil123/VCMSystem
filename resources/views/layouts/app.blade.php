<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Clamping Dashboard')</title>

    <link rel="stylesheet" href="/../../styles/users.css">
    <link rel="stylesheet" href="/../../styles/payments.css">
    <link rel="stylesheet" href="/../../styles/clamping.css">
    <link rel="stylesheet" href="/../../styles/dashboard.css">
    <link rel="stylesheet" href="/../../styles/style.css">
    <link rel="stylesheet" href="/../../styles/dialog.css">
    <link rel="stylesheet" href="/../../styles/overlay.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <div class="logo_name">Clamping Management</div>
            </div>
        </div>

        <div class="src">
            <i class='bx bx-search'></i>
            <input type="text" class="input" placeholder="Search...">
        </div>

        <ul class="nav">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('clampings') }}">
                    <i class='bx bx-car'></i>
                    <span class="link_name">Clamping</span>
                </a>
            </li>
            <li>
                <a href="{{ route('payments') }}">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Payments</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Reports</span>
                </a>
            </li>
             <li>
                <a href="{{ route('users') }}">
                    <i class='bx bx-user'></i>
                    <span class="link_name">User Management</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="home_content">
        <!-- Top bar -->
        <div class="topbar">
            <div class="text">Clamping Management Dashboard</div>
            <div class="profile">
                <!-- <img src="https://via.placeholder.com/40" alt="Profile"> -->
                <span class="name">Admin User</span>
                <i class='bx bx-chevron-down'></i>
            </div>
        </div>

        <!-- Child container -->
        <div class="child-container">
            @yield('content')
        </div>
    </div>

<script src="{{ asset('js/overlay.js') }}"></script>
<script src="{{ asset('js/payment.js') }}"></script>

@stack('scripts') 

</body>
</html>
