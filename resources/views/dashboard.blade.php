@extends('layout.app')

@section('title', 'Dashboard Perpustakaan')

@section('content')

<main>
    <div class="hero">
        <div class="hero-content">
            <h1>Selamat Datang Di Perpustakaan</h1>
            <p>Perum Jasa Tirta I</p>
            <p>Perpustakaan Buku dan Kearsipan</p>
        </div>
    </div>

    <section class="about">
        <div class="container">
            <h2>Tentang Perpustakaan</h2>
            <p>Perpustakaan Perum Jasa Tirta I Kantor Pusat</p>
        </div>
    </section>

  
<section class="catalog-navigation">
    <div class="container grid-container">
        <!-- Card 1: Katalog -->
        <a href="{{ route('books.index') }}">
            <div class="catalog-card">
                <video class="catalog-icon" autoplay loop muted playsinline>
                    <source src="/Videos/open-book.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <h3>Katalog</h3>
            </div>
        </a>

        <!-- Card 2: Peminjaman -->
        <a href="#">
            <div class="catalog-card">
                <video class="catalog-icon" autoplay loop muted playsinline>
                    <source src="/Videos/reading.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <h3>Peminjaman</h3>
            </div>
        </a>

        <!-- Card 3: Layanan Koleksi Digital -->
        <a href="https://app2.jasatirta1.co.id/production/jtlearning/public/" target="_blank" rel="noopener noreferrer">
            <div class="catalog-card">
                <video class="catalog-icon" autoplay loop muted playsinline>
                    <source src="/Videos/ebook.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <h3>Layanan Koleksi Digital</h3>
            </div>
        </a>              
    </div>
</section>


 
    <section class="collection-data">
        <div class="container">
            <h2>Koleksi Perpustakaan</h2>
            <div class="data-display">
                <div>
                    <h3>{{ $totalCatalogs }}</h3>
                    <p>Judul</p>
                </div>
                <div>
                    <h3>{{ $totalCollections }}</h3>
                    <p>Eksemplar</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer-section mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Kontak Kami</h5>
                    <p>Jl. Surabaya 2A, Malang 65145</p>
                    <p>Telp. (0341) 551971</p>
                    <p>Fax (0341) 553015</p>
                    <p>www.jasatirta1.co.id</p>
                </div>
            </div>
            <hr>
            <div class="footer-bottom text-center">
                <p>&copy;</p>
            </div>
        </div>
    </footer>

</main>

@endsection

<style>
    .body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }

    .hero {
        background-image: url('https://plus.unsplash.com/premium_photo-1675369009502-4125a781576a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-size: cover;
        background-position: center;
        color: #fff;
        text-align: center;
        padding: 100px 50px;
    }

    .hero-content h1 {
        font-size: 48px;
        margin-bottom: 10px;
    }

    .hero-content p {
        font-size: 20px;
        margin-bottom: 20px;
    }

    .about {
        background-color: #ffffff;
        padding: 50px 0;
        text-align: center;
    }

    .about h2 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    .about p {
        font-size: 18px;
        color: #666;
        line-height: 1.6;
    }

    /* Card Navigasi */
    .catalog-navigation {
        background-color: #ffffff;
        padding: 50px 0;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .catalog-card {
        position: relative;
        background: #f9f9f9;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        overflow: hidden;
        cursor: pointer;
    }

    .catalog-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #56CCF2, #2F80ED);
        opacity: 0;
        transition: opacity 0.3s;
        z-index: 1;
        border-radius: 15px;
    }

    .catalog-card:hover::before {
        opacity: 1;
    }

    .catalog-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .catalog-card .catalog-icon {
        margin-bottom: 10px;
        width: 80px;
        height: 80px;
        object-fit: contain;
        position: relative;
        z-index: 2;
    }

    .catalog-card h3 {
        font-size: 18px;
        margin: 10px 0 5px 0;
        color: #333;
        position: relative;
        z-index: 2;
    }

    
    .collection-data {
        background-color: #ffffff;
        padding: 50px 0;
        text-align: center;
    }

    .collection-data h2 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    .data-display {
        display: flex;
        justify-content: center;
        gap: 50px;
    }

    .data-display div {
        text-align: center;
    }

    .data-display h3 {
        font-size: 48px;
        margin-bottom: 10px;
        color: #035FFE;
    }

    .data-display p {
        font-size: 18px;
        color: #666;
    }


    .footer-section {
        background: linear-gradient(135deg, #56CCF2, #2F80ED); 
        color: white;
        padding: 30px 0;
        width: 100%; 
        margin: 0; 
    }

    .footer-content {
        max-width: none;  
        padding: 0 20px; 
        width: 100%; 
    }

    .footer-section h5 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .footer-section p {
        margin: 5px 0;
        color: #fff;
    }

    .footer-bottom {
        text-align: center;
        padding-top: 15px;
    }

    .footer-bottom p {
        font-size: 14px;
        color: #f1f1f1;
    }
</style>
