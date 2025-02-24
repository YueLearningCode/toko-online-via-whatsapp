<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('Profile.css') }}">
    <link rel="icon" href="{{ asset('images/FlashStoreU.ico') }}" type="image/x-icon">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/FlashStoreU.ico') }}" type="image/x-icon">
</head>

<body>
    <div class="dashboard">
        <div class="sidebar">
            <div>
                <h2>FLASHSTORE</h2>
                <ul>
                    <li><a href="/dashboard"><i class="bi bi-house-door"></i> Home</a></li>
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <li><a href="/total-users"><i class="bi bi-people"></i> Total Users</a></li>
                        <li><a href="/total-sales"><i class="bi bi-bar-chart"></i> Total Sales</a></li>
                        <a class="submit-btn admin-btn" href="halamantambah" role="button" data-aos="zoom-in"
                            data-aos-delay="400">
                            <i class='bx bx-plus'></i> Tambah Produk
                        </a>
                    @endif
                </ul>
            </div>
        </div>

        <div class="main-content">
            <section class="section">
                <h2>Profile</h2>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ auth()->user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ auth()->user()->email }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </section>
        </div>
    </div>
</body>

</html>
