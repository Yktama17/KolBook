<!-- resources/views/books/index.blade.php -->
@extends('layout.app')

@section('title', 'Koleksi Buku')

@section('content')
    <h1 class="my-4">Katalog</h1>

    <!-- Filter Card -->
    <div class="filter-card mb-4">
        <div class="card-header">
            Filter Katalog
            <button id="add-filter" class="btn btn-primary btn-sm float-right">Tambah Filter</button>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('books.index') }}" class="form-inline">
                <div id="filter-container">
                    <!-- Existing Filters -->
                    @if(request()->has('filter') && is_array(request('filter')))
                        @foreach(request('filter') as $index => $filter)
                            <div class="form-group filter-group">
                                <select name="filter[]" class="form-control mr-sm-2">
                                    <option value="" {{ $filter == '' ? 'selected' : '' }}>Select Filter</option>
                                    <option value="Title" {{ $filter == 'Title' ? 'selected' : '' }}>Title</option>
                                    <option value="Publisher" {{ $filter == 'Publisher' ? 'selected' : '' }}>Publisher</option>
                                    <option value="PublishYear" {{ $filter == 'PublishYear' ? 'selected' : '' }}>Year</option>
                                    <option value="BIBID" {{ $filter == 'BIBID' ? 'selected' : '' }}>BIBID</option>
                                </select>
                                <input type="text" name="filterValue[]" class="form-control mr-sm-2" placeholder="Enter value" value="{{ request('filterValue')[$index] ?? '' }}">
                                <button type="button" class="btn btn-danger btn-sm remove-filter">Remove</button>
                            </div>
                        @endforeach
                    @else
                        <!-- Initial Filter Fields -->
                        <div class="form-group filter-group">
                            <select name="filter[]" class="form-control mr-sm-2">
                                <option value="" selected>Select Filter</option>
                                <option value="Title" {{ request('filter.0') == 'Title' ? 'selected' : '' }}>Title</option>
                                <option value="Publisher" {{ request('filter.0') == 'Publisher' ? 'selected' : '' }}>Publisher</option>
                                <option value="PublishYear" {{ request('filter.0') == 'PublishYear' ? 'selected' : '' }}>Year</option>
                                <option value="BIBID" {{ request('filter.0') == 'BIBID' ? 'selected' : '' }}>BIBID</option>
                            </select>
                            <input type="text" name="filterValue[]" class="form-control mr-sm-2" placeholder="Enter value" value="{{ request('filterValue.0') }}">
                            <button type="button" class="btn btn-danger btn-sm remove-filter">Remove</button>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary search-button">Search</button>
            </form>
        </div>
    </div>

    <!-- Book Cards -->
    <div class="card-container">
        @foreach($books as $book)
        <div class="book-card elevation-2">
            <img src="https://plus.unsplash.com/premium_photo-1669652639337-c513cc42ead6?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="{{ $book->Title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $book->Title }}</h5>
                <p class="card-text publisher">{{ $book->Publisher }}</p>
                <p class="card-text collections-count">Copies: {{ $book->collections_count }}</p>
                <a href="{{ route('books.show', ['id' => $book->ID, 'filter' => request('filter'), 'filterValue' => request('filterValue')]) }}" class="btn btn-outline-info">Detail</a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $books->appends(request()->input())->links('pagination::bootstrap-5') }}
    </div>

    <script>
        document.getElementById('add-filter').addEventListener('click', function() {
         let filterContainer = document.getElementById('filter-container');
         let filterGroup = `
             <div class="form-group filter-group">
                 <select name="filter[]" class="form-control mr-sm-2">
                     <option value="" selected>Select Filter</option>
                     <option value="Title">Title</option>
                     <option value="Publisher">Publisher</option>
                     <option value="PublishYear">Year</option>
                     <option value="BIBID">BIBID</option>
                 </select>
                 <input type="text" name="filterValue[]" class="form-control mr-sm-2" placeholder="Enter value">
                 <button type="button" class="btn btn-danger btn-sm remove-filter">Remove</button>
             </div>
         `;
         filterContainer.insertAdjacentHTML('beforeend', filterGroup);
     });
     
     document.getElementById('filter-container').addEventListener('click', function(event) {
         if (event.target.classList.contains('remove-filter')) {
             event.target.parentElement.remove();
         }
     });
     
     </script>    

@endsection


<style>
   
    .filter-card {
        border: 1px solid #ddd;
        border-radius: 14px;
        box-shadow: 0 4px 8px rgba(54, 122, 179, 0.2);
    }

    .filter-card .card-header {
        background-color: #f8f9fa;
        font-size: 18px;
        font-weight: bold;
        padding: 10px 15px;
    }

    .filter-card .card-body {
        padding: 15px;
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
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

    .book-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(54, 122, 179, 0.2);
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

    .remove-filter {
        margin-right: 10px; 
    }

    .search-button {
        margin-top: 10px;
    }
</style>

<!-- JavaScript untuk menambah dan menghapus filter -->

