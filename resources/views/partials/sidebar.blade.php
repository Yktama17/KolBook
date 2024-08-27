<!-- resources/views/partials/sidebar.blade.php -->
<div id="sidebar-wrapper">
    <div class="sidebar-heading">Perpustakaan Perum Jasa Tirta I</div>
    <div class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="list-group-item"><i class="fas fa-home"></i> Beranda</a>
        <a href="{{ route('books.index') }}" class="list-group-item"><i class="fas fa-book-open"></i> Katalog</a>
        <a href="#" class="list-group-item"><i class="fas fa-folder-open"></i> Koleksi</a>
    </div>
</div>
