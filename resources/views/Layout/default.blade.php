
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
                @if(Auth::user())
                <li><a href= href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
                
                @else
                <li><a href="{{ route("login") }}">Login</a></li>
                @endif
                
            </ul>
        </nav>
    </header>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

        @csrf
    </form>
    
    @yield('content')
    
    <footer class="bg-dark text-white text-center py-3 mt-10">
        <p>&copy; 2024 ABC Restaurant. All Rights Reserved.</p>
    </footer>
<!-- Logout Form -->

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
