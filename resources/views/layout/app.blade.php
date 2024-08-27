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
    <div class="d-flex toggled" id="wrapper"> 
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading">Perpustakaan Perum Jasa Tirta I</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('dashboard') }}" class="list-group-item"><i class="fas fa-home"></i> Beranda</a>
                <a href="{{ route('books.index') }}" class="list-group-item"><i class="fas fa-book-open"></i> Katalog</a>
                <a href="#" class="list-group-item"><i class="fas fa-folder-open"></i> Koleksi</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" class="w-100 p-4">
            <!-- Burger Menu -->
            <span id="menu-toggle" class="fas fa-bars"></span>

            <nav class="breadcrumb">
                <span class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></span>
                <span class="breadcrumb-item active">PerpusPJTI</span>
            </nav>

            @yield('content')
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript untuk burger menu
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
</html>

<style>
    /* Tambahkan CSS untuk styling sidebar dan burger menu */
    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
    }

    #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -300px;
        background: #343a40;
        padding-top: 20px;
        transition: all 0.3s ease;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
    }

    .sidebar-heading {
        padding: 10px 15px;
        font-size: 1.2rem;
        color: #fff;
        text-align: center;
    }

    .list-group-item {
        background-color: #343a40;
        color: #cfd8dc;
        border: none;
    }

    .list-group-item:hover {
        background-color: #495057;
    }

    #menu-toggle {
        cursor: pointer;
        font-size: 1.5rem;
        padding: 10px 15px;
    }
</style>
