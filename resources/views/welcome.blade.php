<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Personal Light Instagram</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- Additional Styling for Background Texture -->
    <style>
        body {
            background-size: cover;
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            padding: 30px;
        }
        .container {
            max-width: 800px;
        }
    </style>
</head>
<body>
    <div id="app">
        <main class="py-5">
            <div class="container">
                <!-- Card with Content -->
                <div class="card mx-auto">
                    <!-- Header Section -->
                    <div class="text-center mb-5">
                        <h1 class="fw-bold text-primary">Personal Light Instagram</h1>
                        <p class="lead text-muted">
                            Welcome to Personal Light Instagram, a lightweight social media platform where you can share moments through photos and videos. This application was developed as part of the Technical Test for Fullstack Intern at Elitech Technovision.
                        </p>
                        <p>
                            Learn more at <a href="https://www.elitech.id" target="_blank" class="text-decoration-none text-primary">www.elitech.id</a>
                        </p>
                    </div>

                    <!-- Flowchart Section -->
                    <div class="text-center mb-5">
                        <h3 class="mb-4">Flowchart for Personal Light Instagram</h3>
                        <img src="{{ asset('images/flowchart-personal-light-instagram.png') }}" 
                             alt="Flowchart for Personal Light Instagram" 
                             class="img-fluid" 
                             style="max-width: 60%; height: auto; margin: 0 auto; display: block;">

                        <p class="mt-4 text-muted">
                            This flowchart represents the process and features of the Personal Light Instagram application, including registration, login, profile management, uploading content, and archiving.
                        </p>
                    </div>

                    <!-- Back to Home Button -->
                    <div class="text-center mt-3">
                        <a href="{{ url('/') }}" class="btn btn-primary btn-lg">Back to Home</a>
                    </div>

                    <!-- Footer Section -->
                    <footer class="mt-5 text-center text-muted">
                        <p>&copy; {{ date('Y') }} Personal Light Instagram. All rights reserved.</p>
                    </footer>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
