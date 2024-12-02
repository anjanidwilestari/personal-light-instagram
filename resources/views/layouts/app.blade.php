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
    <!-- Bootstrap JS (Popper and Bootstrap Bundle) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
