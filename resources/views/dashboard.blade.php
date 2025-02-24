<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlashStore Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('Dashboard.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>FLASHSTORE</h2>
            <ul>
                <li><a href="/"><i class="bi bi-house-door"></i> Home</a></li>
                <li><a href="/total-users"><i class="bi bi-people"></i> Total Users</a></li>
                <a class="submit-btn admin-btn" href="halamantambah" role="button" data-aos="zoom-in"
                    data-aos-delay="400">
                    <i class='bx bx-plus'></i> Tambah Produk
                </a>
                <li><a href="/total-sales"><i class="bi bi-bar-chart"></i> Total Sales</a></li>

            </ul>
        </div>

        <!-- Profile Icon on Top Right -->
        <div class="top-right-profile">
            <a href="/profile">
                <i class="fas fa-user-circle"></i> Profile
            </a>
        </div>


        <!-- Main Content -->
        <div class="main-content">
            <div class="welcome-message">
                <h1>You're logged in! <span>Welcome to FlashStore!</span></h1>
                <p>Explore the dashboard to manage users, view sales, and update your profile.</p>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text">Manage and view all registered users.</p>
                            <a href="/total-users" class="btn btn-primary">View Users</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total Sales</h5>
                            <p class="card-text">Analyze sales data with interactive charts.</p>
                            <a href="/total-sales" class="btn btn-success">View Sales</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
