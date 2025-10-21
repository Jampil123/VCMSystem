<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>@yield('title', 'Enforcer Dashboard')</title>

    <link rel="stylesheet" href="{{ asset('styles/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/enforcer-dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    {{-- Main content --}}
    <div class="child-container">
        @yield('content')
    </div>

    {{-- Navigation (shared across pages) --}}
    <nav>
        <button id="homeBtn"><i class="fa-solid fa-house"></i></button>
        <button id="notificationsBtn"><i class="fa-solid fa-bell"></i></button>
        <button class="add" id="addClampingBtn"><i class="fa-solid fa-plus"></i></button>
        <button id="recordsBtn"><i class="fa-solid fa-list"></i></button>
        <button id="profileBtn"><i class="fa-solid fa-user"></i></button>
    </nav>

    <script src="{{ asset('js/navigation.js') }}"></script>
    @stack('scripts')
</body>
</html>
