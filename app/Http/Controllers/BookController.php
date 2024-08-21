<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil input dari request
        $filters = $request->input('filter', []);
        $filterValues = $request->input('filterValue', []);

        // Mengambil data buku dengan pagination dan filter
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
        $catalogs = Catalog::with(['collections.location'])->findOrFail($id);
    
        // Query untuk mengambil karya terkait berdasarkan pengarang yang sama
        $relatedBooks = Catalog::where('Author', $catalogs->Author)
                                ->where('id', '!=', $catalogs->id) // Hindari buku yang sama
                                ->limit(5) // Batasi karya terkait
                                ->get();
    
        return view('books.show', compact('catalogs', 'relatedBooks'));
    }
    

}









