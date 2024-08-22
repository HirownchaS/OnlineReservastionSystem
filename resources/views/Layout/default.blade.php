
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Restaurant</title>
    <!-- Include any stylesheets here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <header class="bg-dark text-white text-center py-5">
        <h1>Welcome to ABC Restaurant</h1>
        <p>Experience the finest dining in Sri Lanka</p>
        <nav>
            <ul>
                <li><a href="{{ route("home") }}">Home</a></li>
                <li><a href="{{ route("about") }}">About Us</a></li>
                <li><a href="{{ route("services") }}">Services</a></li>
                <li><a href="{{ route("reservation") }}">Reservations</a></li>
                <li><a href="{{ route("contact") }}">Contact Us</a></li>

            </ul>
        </nav>
    </header>
    @yield('content')
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 ABC Restaurant. All Rights Reserved.</p>
    </footer>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
