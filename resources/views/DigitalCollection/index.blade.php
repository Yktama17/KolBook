@extends('layout.app')

@section('title', 'Layanan Koleksi Digital')

@section('content')
<main class="digital-collection-page">
    <div class="container">
        <h1>Layanan Koleksi Digital</h1>
        <form action="{{ route('digital-collection.search') }}" method="GET" class="search-form">
            <div class="search-bar">
                <input type="text" name="keyword" placeholder="Kata Kunci" class="search-input">
                <select name="format" class="search-select">
                    <option value="">Judul</option>
                    <option value="pdf">Pengarang</option>
                    <option value="epub">Penerbit</option>
                    <!-- Add more options as needed -->
                </select>
                <select name="format" class="search-select">
                    <option value="">Semua Format File</option>
                    <option value="pdf">PDF</option>
                    <option value="epub">ePub</option>
                    <!-- Add more options as needed -->
                </select>
                <button type="submit" class="search-button">Cari</button>
            </div>
            {{-- <p><a href="#">Pencarian Lanjut</a> • <a href="#">Riwayat Pencarian</a> • <a href="#">Bantuan</a></p> --}}
        </form>
    </div>
</main>
@endsection

<style>
    .digital-collection-page {
        background-color: #f0f8ff;
        padding: 20px;
        text-align: center;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .search-form {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .search-bar {
        display: flex;
        gap: 10px;
    }

    .search-input {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 200px;
    }

    .search-select {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .search-button {
        padding: 10px 20px;
      background: linear-gradient(135deg, #56CCF2, #2F80ED);
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .search-button:hover {
        background-color: #218838;
    }
</style>
