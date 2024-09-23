<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Collection;
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

        // Pagination
        $books = $books->paginate(16);

        
        $totalCatalogs = Catalog::count();
        $totalCollections = Collection::count();

      
        return view('books.index', compact('books', 'filters', 'filterValues', 'totalCatalogs', 'totalCollections'));
    }

    public function show($id)
    {
        $catalog = Catalog::with(['collections.location'])->findOrFail($id);
        $marcData = MARC::where('Catalogid', $id)->orderBy('Tag', 'asc')->get();

        $relatedBooks = Catalog::where('Author', $catalog->Author)
                                ->where('id', '!=', $catalog->id)
                                ->limit(5)
                                ->get();

        return view('books.show', compact('catalog', 'relatedBooks', 'marcData'));
    }
}
