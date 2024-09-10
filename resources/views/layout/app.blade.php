<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Perpustakaan')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="https://jasatirta1.co.id/wp-content/uploads/2022/07/LOGO_PJT_BESAR.png" alt="Logo PJT I" style="height: 30px; margin-right: 10px;">
            Perpustakaan Perum Jasa Tirta I
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-book-open"></i> Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-folder-open"></i> Panduan</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container-fluid mt-4">
        {{-- <nav class="breadcrumb">
            <span class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></span>
            <span class="breadcrumb-item active">PerpusPJTI</span>
        </nav> --}}

        @yield('content')
    </div>
    <!-- /#page-content-wrapper -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
    /* Mengganti warna background navbar */
    .navbar {
        background: linear-gradient(135deg, #56CCF2, #2F80ED); /* Ganti dengan warna yang Anda inginkan */
    }

    /* Mengganti warna teks navbar */
    .navbar-dark .navbar-nav .nav-link {
        color: #ecf0f1; /* Ganti dengan warna teks yang diinginkan */
    }

    /* Mengganti warna teks navbar saat dihover */
    .navbar-dark .navbar-nav .nav-link:hover {
        color: #ffffff; /* Warna teks saat dihover */
    }

    /* Mengganti warna teks brand (judul navbar) */
    .navbar-dark .navbar-brand {
        color: #ffffff; /* Ganti dengan warna teks yang diinginkan */
    }

    /* Mengganti warna ikon hamburger (untuk versi mobile) */
    .navbar-dark .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/ %3E%3C/svg%3E");
    }
</style>
