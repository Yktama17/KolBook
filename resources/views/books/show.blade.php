<!DOCTYPE html>
<html>
<head>
    <title>Detail Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Perpustakaan Perum Jasa Tirta I</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="container">
        <h1 class="my-4">{{ $catalogs->Title }}</h1>
        
        <div class="row">
            <div class="col-md-4">
                <!-- Book Image -->
                <img src="https://images.unsplash.com/photo-1615976909545-a2d402c7dac3?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D/random/200x200?book" class="card-img-top" alt="{{ $catalogs->Title }}">
            </div>
            <div class="col-md-8">
                <!-- Book Details -->
                <h3>Detail Buku</h3>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Penerbit:</strong> {{ $catalogs->Publisher }}</li>
                    <li class="list-group-item"><strong>BIBID:</strong> {{ $catalogs->BIBID }}</li>
                    <li class="list-group-item"><strong>Tahun Publikasi:</strong> {{ $catalogs->PublishYear }}</li>
                    <li class="list-group-item"><strong>Di Publikasi Oleh:</strong> {{ $catalogs->Publikasi }}</li>
                </ul>

                <!-- Collection Info -->
                <h4 class="mt-4">Koleksi Info</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No Barcode</th>
                            <th>No Panggil</th>
                            <th>Akses</th>
                            <th>Lokasi</th>
                            <th>Ketersediaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($catalogs->collections as $collection)
                        <tr>
                            <td>{{ $collection->NomorBarcode ?? 'Tidak tersedia' }}</td>
                            <td>{{ $collection->CallNumber ?? 'Tidak tersedia' }}</td>
                            <td>
                                @if($collection->ISOPAC == 1)
                                    Dapat dipinjam
                                @elseif($collection->ISOPAC == 2)
                                    Tidak bisa Dipinjam
                                @else
                                    Tidak tersedia
                                @endif
                            </td>
                            <td>{{ $collection->location->Name ?? 'Tidak tersedia' }}</td>
                            <td>
                                @if($collection->ISOPAC == 1)
                                    Tersedia
                                @else
                                    Tidak Tersedia
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Back Button -->
                <a href="{{ route('books.index', ['filter' => request('filter'), 'filterValue' => request('filterValue')]) }}" class="btn btn-primary mt-4">Kembali ke Daftar Buku</a>
            </div>
        </div>

        <!-- Karya Terkait -->
        <h4 class="mt-5">Karya Terkait</h4>
        <div class="card-container">
            @foreach($relatedBooks as $relatedBook)
            <div class="book-card elevation-2">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $relatedBook->Title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $relatedBook->Title }}</h5>
                    <p class="card-text publisher">{{ $relatedBook->Publisher }}</p>
                    {{-- <a href="{{ url('/books/' . $relatedBook->id) }}" class="btn btn-outline-info">Lihat Detail</a> --}}
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<style>
    /* Book Card */
    .card-container {
        display: grid;
        grid-template-columns: repeat(5, 1fr); /* Mengatur grid dengan 5 kolom */
        gap: 15px; /* Memberikan jarak antar kartu */
        justify-content: center;
        margin-bottom: 20px;
    }

    .book-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(13, 177, 40, 0.2);
        border: 1px solid #ddd;
    }

    .book-card img {
        height: 150px;
        object-fit: cover;
    }

    .book-card .card-body {
        padding: 15px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .book-card .btn-outline-info {
        margin-top: auto;
        display: block;
        padding: 10px;
        width: 100%;
    }

    .book-card .card-title {
        font-size: 16px;
        font-weight: bold;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 5px;
    }

    .book-card .card-text {
        font-size: 14px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 5px;
    }

    /* Added Spacing */
    .remove-filter {
        margin-right: 10px; /* Menambahkan jarak antara tombol Remove dan Search */
    }

    .search-button {
        margin-top: 10px;
    }
</style>
