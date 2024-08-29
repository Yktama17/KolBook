@extends('layout.app')

@section('title', 'Dashboard Perpustakaan')

@section('content')
    <h2></h2>

    <div class="row">
        <!-- Card 1: Jumlah Katalog -->
        <div class="col-lg-3 col-md-6">
            <div class="card red">
                <div class="card-header">Judul</div>
                <div class="card-body">{{ $totalCatalogs }}</div>
                <div class="card-footer text-center">
                    <a href="{{ route('books.index') }}" class="text-black">Detail <i class="fas fa-sync-alt"></i></a>
                </div>
            </div>
        </div>

        <!-- Card 2: Konten Digital -->
        <div class="col-lg-3 col-md-6">
            <div class="card green">
                <div class="card-header">Konten Digital</div>
                <div class="card-body">0</div> <!-- Anda bisa mengubah ini jika ada data dinamis untuk konten digital -->
                <div class="card-footer text-center">
                    <a href="#" class="text-black">Detail <i class="fas fa-sync-alt"></i></a>
                </div>
            </div>
        </div>

        <!-- Card 3: Jumlah Koleksi -->
        <div class="col-lg-3 col-md-6">
            <div class="card orange">
                <div class="card-header">Eksemplar</div>
                <div class="card-body">{{ $totalCollections }}</div>
                <div class="card-footer text-center">
                    <a href="#" class="text-black">Detail <i class="fas fa-sync-alt"></i></a>
                </div>
            </div>
        </div>

        <!-- Card 4: Jumlah Anggota -->
        <div class="col-lg-3 col-md-6">
            <div class="card blue">
                <div class="card-header">Anggota</div>
                <div class="card-body">0</div> <!-- Anda bisa mengubah ini jika ada data dinamis untuk anggota -->
                <div class="card-footer text-center">
                    <a href="#" class="text-black">Detail <i class="fas fa-sync-alt"></i></a>
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Data Kunjungan Section -->
    <div class="mt-4">
        <h4>Data Kunjungan</h4>
        <div class="d-flex justify-content-between">
            <div>Anggota: 0 Orang</div> <!-- Gantilah dengan data dinamis jika tersedia -->
            <div>Non Anggota: 0 Orang</div> <!-- Gantilah dengan data dinamis jika tersedia -->
        </div>
    </div> --}}
@endsection
