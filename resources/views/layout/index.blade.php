@extends('layouts.dashboard')

@section('content')
<div class="container mt-4">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Books</h5>
                    <p class="card-text">Jumlah: 1200</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Employees</h5>
                    <p class="card-text">Jumlah: 50</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Transactions</h5>
                    <p class="card-text">Jumlah: 300</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
