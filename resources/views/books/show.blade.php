<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <!-- Bootstrap CSS -->
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
                
                <!-- Nav Tabs for Collection Info -->
                <h4 class="mt-4"></h4>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-eksemplar-tab" data-toggle="tab" data-target="#nav-eksemplar" type="button" role="tab" aria-controls="nav-eksemplar" aria-selected="true">Eksemplar</button>
                        <button class="nav-link" id="nav-konten-digital-tab" data-toggle="tab" data-target="#nav-konten-digital" type="button" role="tab" aria-controls="nav-konten-digital" aria-selected="false">Konten Digital</button>
                        <button class="nav-link" id="nav-marc-tab" data-toggle="tab" data-target="#nav-marc" type="button" role="tab" aria-controls="nav-marc" aria-selected="false">MARC</button>
                        <button class="nav-link" id="nav-unduh-catalog-tab" data-toggle="tab" data-target="#nav-unduh-catalog" type="button" role="tab" aria-controls="nav-unduh-catalog" aria-selected="false">Unduh Katalog</button>
                    </div>
                </nav>

                <!-- Tab Content -->
                <div class="tab-content" id="nav-tabContent">
                    <!-- Eksemplar Content -->
                    <div class="tab-pane fade show active" id="nav-eksemplar" role="tabpanel" aria-labelledby="nav-eksemplar-tab">
                        <table class="table table-bordered mt-3">
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
                    </div>

                    <!-- Konten Digital Content -->
                    <div class="tab-pane fade" id="nav-konten-digital" role="tabpanel" aria-labelledby="nav-konten-digital-tab">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur euismod, nisi et pharetra malesuada, libero lacus elementum nunc, ut vehicula ex justo at velit.</p>
                    </div>

                    <!-- MARC Content -->
                    <div class="tab-pane fade" id="nav-marc" role="tabpanel" aria-labelledby="nav-marc-tab">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed venenatis dolor, non blandit mi.</p>
                    </div>

                    <!-- Unduh Catalog Content -->
                    <div class="tab-pane fade" id="nav-unduh-catalog" role="tabpanel" aria-labelledby="nav-unduh-catalog-tab">
                        <div class="dropdown mt-3">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                Pilih Format Unduhan
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">MARC Unicode/UTF-8</a></li>
                                <li><a class="dropdown-item" href="#">Format MARC XML</a></li>
                                <li><a class="dropdown-item" href="#">Format MODS</a></li>
                                <li><a class="dropdown-item" href="#">Format Dublin Core (RDF)</a></li>
                                <li><a class="dropdown-item" href="#">Format Dublin Core (OAI)</a></li>
                                <li><a class="dropdown-item" href="#">Format Dublin Core (SRW)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

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
    }

    .book-card .publisher {
        color: #555;
    }
</style>
