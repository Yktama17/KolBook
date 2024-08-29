<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Perpustakaan')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Perpustakaan Perum Jasa Tirta I</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.index') }}"><i class="fas fa-book-open"></i> Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-folder-open"></i> Koleksi</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container-fluid mt-4">
        <nav class="breadcrumb">
            <span class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></span>
            <span class="breadcrumb-item active">PerpusPJTI</span>
        </nav>

        @yield('content')
    </div>
    <!-- /#page-content-wrapper -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
    /* Styling untuk navbar */
    .navbar-dark .navbar-nav .nav-link {
        color: #cfd8dc;
    }

    .navbar-dark .navbar-nav .nav-link:hover {
        color: #ffffff;
    }
</style>
