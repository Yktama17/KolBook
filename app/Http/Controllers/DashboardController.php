<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Collection;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah katalog
        $totalCatalogs = Catalog::count();

        // Menghitung jumlah koleksi
        $totalCollections = Collection::count();

        // Mengirim data ke view
        return view('dashboard', compact('totalCatalogs', 'totalCollections'));
    }
}

