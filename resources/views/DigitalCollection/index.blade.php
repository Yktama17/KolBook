@extends('layout.app')

@section('title', 'Layanan Koleksi Digital')

@section('content')
<main class="digital-collection-page">
    <div class="container py-4">
        <h1 class="text-center mb-4">Layanan Koleksi Digital</h1>
        <form action="{{ route('digital-collection.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Kata Kunci" class="form-control">
                <select name="format" class="form-select" style="max-width: 120px;">
                    <option value="">Judul</option>
                    <option value="author">Pengarang</option>
                    <option value="publisher">Penerbit</option>
                    <option value="subject">Subyek</option>
                    <option value="call_number">Nomor Panggil</option>
                    <option value="isbn">ISBN</option>
                    <option value="ismn">ISMN</option>
                </select>
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <div class="collection-results">
            @if(isset($catalogs) && $catalogs->isNotEmpty())
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach($catalogs as $catalog)
                        <div class="col mb-4">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title flex-grow-1">{{ Str::limit($catalog->Title, 50) }}</h5>
                                    <a href="{{ route('books.show', ['id' => $catalog->ID, 'filter' => request('filter'), 'filterValue' => request('filterValue'), 'page' => request('page')]) }}" class="btn btn-outline-info">Baca</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $catalogs->links('pagination::bootstrap-4') }}
                </div>
            @elseif($catalogs && $catalogs->isEmpty())
                <p class="text-center text-muted">Tidak ada hasil yang ditemukan.</p>
            @endif
        </div>
    </div>
</main>

<script>
    // Simpan URL saat ini di sessionStorage sebagai halaman sebelumnya
    sessionStorage.setItem('previousPage', window.location.href);
</script>

<style>
    /* CSS kustom Anda di sini */
    .digital-collection-page {
        background-color: #f0f8ff;
        min-height: 100vh;
        padding: 2rem 0;
    }

    .input-group {
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        border-radius: 5px;
        overflow: hidden;
    }

    .input-group .form-control,
    .input-group .form-select,
    .input-group .btn {
        border: none;
        border-radius: 0;
    }

    .input-group .form-control:focus,
    .input-group .form-select:focus {
        box-shadow: none;
        z-index: 3;
    }

    .btn-primary, .btn-success {
        background: linear-gradient(135deg, #56CCF2, #2F80ED);
        border: none;
        transition: opacity 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-primary:hover, .btn-success:hover {
        opacity: 0.9;
        box-shadow: 0 2px 10px rgba(47, 128, 237, 0.3);
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        margin-bottom: 1.5rem;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(86, 204, 242, 0.3);
    }

    .card-body {
        display: flex;
        flex-direction: column;
        padding: 1.5rem;
    }

    .card-title {
        font-size: 1rem;
        margin-bottom: 1rem;
        flex-grow: 1;
    }

    .pagination {
        justify-content: center;
    }

    .page-item.active .page-link {
        background-color: #2F80ED;
        border-color: #2F80ED;
    }

    .page-link {
        color: #2F80ED;
    }

    .page-link:hover {
        color: #1a5ba3;
    }

    .row-cols-1, .row-cols-md-2, .row-cols-lg-3 {
        margin-top: -1rem;
        margin-bottom: -1rem;
    }

    .row-cols-1 > *, .row-cols-md-2 > *, .row-cols-lg-3 > * {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .card-title {
            font-size: 0.9rem;
        }
    }
</style>
@endsection
