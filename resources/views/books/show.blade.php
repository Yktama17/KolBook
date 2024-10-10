<!-- resources/views/books/show.blade.php -->
@extends('layout.app')

@section('title', $catalog->Title)

@section('content')
    <h1 class="my-4">{{ $catalog->Title }}</h1>
    
    <div class="row">
        <div class="col-md-4">
            <img src="https://jasatirta1.co.id/wp-content/uploads/2022/07/LOGO_PJT_BESAR.png" class="card-img-top" alt="{{ $catalog->Title }}">
        </div>
        <div class="col-md-8">
            <h3>Detail Buku</h3>
            <ul class="list-group">
                <li class="list-group-item"><strong>Penerbit:</strong> {{ $catalog->Publisher }}</li>
                <li class="list-group-item"><strong>BIBID:</strong> {{ $catalog->BIBID }}</li>
                <li class="list-group-item"><strong>Tahun Publikasi:</strong> {{ $catalog->PublishYear }}</li>
                <li class="list-group-item"><strong>Di Publikasi Di:</strong> {{ $catalog->Publikasi }}</li>
                <li class="list-group-item"><strong>Bahasa:</strong> 
                    @if($catalog->Languages == 'ind')
                        Indonesia
                    @elseif($catalog->Languages == 'eng')
                        Inggris
                    @else
                        {{ $catalog->Languages }}
                    @endif
                </li>
                
            </ul>

            <h4 class="mt-4">Informasi Koleksi</h4>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-eksemplar-tab" data-toggle="tab" data-target="#nav-eksemplar" type="button" role="tab" aria-controls="nav-eksemplar" aria-selected="true">Eksemplar</button>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
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
                            @foreach($catalog->collections as $collection)
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

              
            </div>
            <button id="back-button" class="btn btn-outline-secondary">Kembali</button>
        </div>
    </div>

    <!-- Karya Terkait -->
    <h4 class="mt-5">Karya Terkait</h4>
    <div class="card-container">
        @foreach($relatedBooks as $relatedBook)
        <div class="book-card elevation-2">
            <img src="https://jasatirta1.co.id/wp-content/uploads/2022/07/LOGO_PJT_BESAR.png" class="card-img-top" alt="{{ $relatedBook->Title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $relatedBook->Title }}</h5>
                <p class="card-text publisher">{{ $relatedBook->Publisher }}</p>
                {{-- <a href="{{ route('books.show', $relatedBook->ID) }}" class="btn btn-primary mt-2">Detail</a> <!-- Tombol Detail --> --}}
            </div>
        </div>
        @endforeach
    </div>

    <script>
        document.getElementById('back-button').addEventListener('click', function() {
          
            const previousPage = sessionStorage.getItem('previousPage');
            if (previousPage) {
                window.location.href = previousPage;
            } else {
              
                window.location.href = "{{ route('books.index') }}";
            }
        });
    </script>

@endsection


<style>
   
    .card-container {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 15px;
        justify-content: center;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .card-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 576px) {
        .card-container {
            grid-template-columns: 1fr;
        }
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

    .book-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(27, 197, 183, 0.2);
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
        color: #31b3b3;
    }
</style>
