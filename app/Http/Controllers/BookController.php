<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\MARC;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->input('filter', []);
        $filterValues = $request->input('filterValue', []);

        $books = Catalog::withCount('collections');

        foreach ($filters as $index => $filter) {
            $filterValue = $filterValues[$index] ?? '';
            switch ($filter) {
                case 'Title':
                    $books->where('Title', 'like', "%{$filterValue}%");
                    break;
                case 'Publisher':
                    $books->where('Publisher', 'like', "%{$filterValue}%");
                    break;
                case 'PublishYear':
                    $books->where('PublishYear', 'like', "%{$filterValue}%");
                    break;
                case 'BIBID':
                    $books->where('BIBID', 'like', "%{$filterValue}%");
                    break;
            }
        }

        $books = $books->paginate(10);

        return view('books.index', compact('books', 'filters', 'filterValues'));
    }

    public function show($id)
    {
        // Mengambil data katalog beserta relasi koleksinya dan lokasi
        $catalogs = Catalog::with(['collections.location'])->findOrFail($id);

        // Mengambil data MARC untuk katalog tersebut
        $marcData = MARC::where('Catalogid', $id)->orderBy('Tag', 'asc')->get();

        // Query untuk mendapatkan buku terkait berdasarkan pengarang yang sama
        $relatedBooks = Catalog::where('Author', $catalogs->Author)
                                ->where('ID', '!=', $catalogs->ID) // Menghindari buku yang sama
                                ->limit(5) // Membatasi jumlah buku terkait
                                ->get();

        return view('books.show', compact('catalogs', 'relatedBooks', 'marcData'));
    }
}










