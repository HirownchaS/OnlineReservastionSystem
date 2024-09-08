<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        /* Custom styles for the admin dashboard */
        .sidebar {
            min-height: 100vh;
            width: 250px;
            background-color: #2c3e50;
            padding-top: 20px;
            position: fixed;
        }

        .sidebar a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 15px 20px;
            display: block;
            font-size: 1.1em;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar a:hover {
            background-color: #34495e;
            color: #fff;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .navbar {
            background-color: #2980b9;
            padding: 0.8rem 1rem;
        }
        .navbar .navbar-brand {
            font-size: 1.8em;
            color: #ecf0f1;
        }
        .navbar .navbar-nav .nav-link {
            color: #ecf0f1;
            font-size: 1.1em;
            margin-right: 1rem;
            transition: color 0.3s;
        }
        .navbar .navbar-nav .nav-link:hover {
            color: #bdc3c7;
        }
        .navbar .dropdown-menu {
            background-color: #2c3e50;
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .navbar .dropdown-menu .dropdown-item {
            color: #ecf0f1;
        }
        .navbar .dropdown-menu .dropdown-item:hover {
            background-color: #34495e;
        }
        .search-bar {
            width: 350px;
        }
        .profile-icon {
            margin-right: 0.5rem;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href=""><i class="fas fa-user"></i> Users</a>
        <a href="{{ route('reservations.index') }}"><i class="fas fa-calendar-alt"></i> Reservations</a>
        <a href="{{ route('menus.index') }}"><i class="fas fa-file-alt"></i> Menu</a>
        <a href="{{ route('categories.index') }}"><i class="fas fa-file-alt"></i> Category</a>
        <a href="{{route('reports.index')}}"><i class="fas fa-file-alt"></i> Reports</a>
        <a href="{{ route('queries.index') }}"><i class="fas fa-cogs"></i> Queries</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                @if (Auth::user()->role == 'admin')
                    <a class="navbar-brand" href="">{{ Auth::user()->role }}Dashboard</a>
                @else
                    <a class="navbar-brand" href="">{{ Auth::user()->role }}Dashboard</a>
                @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex ms-auto">
                        <input class="form-control me-2 search-bar" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle profile-icon"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href=""><i class="fas fa-user"></i>
                                        {{ Auth::user()->fname }}</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href=href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-item ">
                            <a class="nav-link dropdown-toggle" href="#" id="notificationsDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bell"></i>
                                @if (Auth::user()->unreadNotifications->count())
                                    <span
                                        class="badge bg-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
                               
                               
                                @forelse (auth()->user()->unreadNotifications as $notification)
                           
                                    Reservation #{{ $notification->data['reservation_id'] }} was cancelled.<br>
                                    <strong>Details:</strong><br>
                                    Date: {{ $notification->data['date'] }}<br>
                                    Time: {{ $notification->data['time'] }}<br>
                                    Guests: {{ $notification->data['guest_count'] }}<br>
                                    Customer: {{ $notification->data['customer_name'] }}
                               
                            @empty
                            <span>No new Notification</span>
                                @endforelse
                                <form action="{{ route('notifications.markAsRead') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn">Mark All as Read</button>
                                </form>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        @yield('content')

    </div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
