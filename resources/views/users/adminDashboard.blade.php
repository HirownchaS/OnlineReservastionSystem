<!-- resources/views/admin/dashboard.blade.php -->

<!DOCTYPE html>
{{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Admin Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Manage Users</div>
                    <div class="card-body">
                        <p class="card-text">Add, Edit, or Delete Users</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-header">Manage Staff</div>
                    <div class="card-body">
                        <p class="card-text">Add, Edit, or Delete Staff Members</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">View Reports</div>
                    <div class="card-body">
                        <p class="card-text">View Detailed Reports</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">System Settings</div>
                    <div class="card-body">
                        <p class="card-text">Configure System Settings</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-ydTYixkhHjTJZHQiGrh2oX/+KBa8QGFIowPR07vTxwq91JGAuh8t+qI7nSDoh4ZRGhCndWHW7ujG1sWgVh4xAA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <a href=""><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href=""><i class="fas fa-users"></i> Users</a>
        <a href=""><i class="fas fa-calendar-alt"></i> Reservations</a>
        <a href=""><i class="fas fa-file-alt"></i> Reports</a>
        <a href=""><i class="fas fa-cogs"></i> Settings</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                @if (Auth::user()->role_type == 'admin')

            <a class="navbar-brand" href="">{{Auth::user()->role_type}}Dashboard</a>
            @elseif (Auth::user()->role_type == 'staff')
            <a class="navbar-brand" href="">{{Auth::user()->role_type}}Dashboard</a>
            @else
            <a class="navbar-brand" href="">{{Auth::user()->role_type}}Dashboard</a>
            @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex ms-auto">
                        <input class="form-control me-2 search-bar" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle profile-icon"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href=""><i class="fas fa-user"></i> Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href=""
                                       >
                                       <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </li>
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
    <form id="logout-form" action="" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

