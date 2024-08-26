@extends('layout.app')

@section('title', 'Dashboard Perpustakaan')

@section('content')
    <h2>Jenis Perpustakaan: Perpustakaan Khusus</h2>

    <div class="row">
        <!-- Card 1 -->
        <div class="col-lg-3 col-md-6">
            <div class="card red">
                <div class="card-header">Judul</div>
                <div class="card-body">3,660</div>
                <div class="card-footer text-center">
                    <a href="#" class="text-white">Detail <i class="fas fa-sync-alt"></i></a>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-lg-3 col-md-6">
            <div class="card green">
                <div class="card-header">Konten Digital</div>
                <div class="card-body">0</div>
                <div class="card-footer text-center">
                    <a href="#" class="text-white">Detail <i class="fas fa-sync-alt"></i></a>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-lg-3 col-md-6">
            <div class="card orange">
                <div class="card-header">Eksemplar</div>
                <div class="card-body">4,900</div>
                <div class="card-footer text-center">
                    <a href="#" class="text-white">Detail <i class="fas fa-sync-alt"></i></a>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-lg-3 col-md-6">
            <div class="card blue">
                <div class="card-header">Anggota</div>
                <div class="card-body">0</div>
                <div class="card-footer text-center">
                    <a href="#" class="text-white">Detail <i class="fas fa-sync-alt"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Kunjungan Section -->
    <div class="mt-4">
        <h4>Data Kunjungan</h4>
        <div class="d-flex justify-content-between">
            <div>Anggota: 0 Orang</div>
            <div>Non Anggota: 0 Orang</div>
        </div>
    </div>
@endsection
