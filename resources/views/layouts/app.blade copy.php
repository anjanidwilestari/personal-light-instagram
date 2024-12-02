<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
    <div id="app">
        @include('layouts.navbar') <!-- Navbar -->
        <main class="py-4">
            @yield('content') <!-- Content -->
        </main>
        @include('layouts.footer') <!-- Footer -->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
