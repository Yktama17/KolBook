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
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading">INLISLite v3</div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item"><i class="fas fa-home"></i> Beranda</a> 
                <a href="#" class="list-group-item"><i class="fas fa-book-open"></i> Katalog</a>
                <a href="#" class="list-group-item"><i class="fas fa-folder-open"></i> Koleksi</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" class="w-100 p-4">
            <nav class="breadcrumb">
                <span class="breadcrumb-item"><a href="#">Dashboard</a></span>
                <span class="breadcrumb-item active">INLISLite v3</span>
            </nav>

            @yield('content')
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<style>
    body {
        font-family: 'Arial', sans-serif;
    }

    #sidebar-wrapper {
        min-height: 100vh;
        background: #343a40;
        padding-top: 20px;
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

    .card {
        border: none;
        margin-bottom: 20px;
    }

    .card-header {
        font-size: 1rem;
        font-weight: bold;
        color: #fff;
        padding: 10px;
    }

    .card-body {
        text-align: center;
        font-size: 2rem;
        font-weight: bold;
        padding: 20px;
    }

    .card.red .card-header {
        background-color: #c0392b;
    }

    .card.green .card-header {
        background-color: #27ae60;
    }

    .card.orange .card-header {
        background-color: #f39c12;
    }

    .card.blue .card-header {
        background-color: #2980b9;
    }

    .breadcrumb {
        background-color: transparent;
        padding: 10px 0;
    }

    .breadcrumb-item a {
        color: #007bff;
    }

    .breadcrumb-item.active {
        color: #6c757d;
    }
</style>
