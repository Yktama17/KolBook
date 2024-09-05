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
        // Fetch filter and search queries
        $filters = $request->input('filter', []);
        $filterValues = $request->input('filterValue', []);

        $books = Catalog::withCount('collections');

        // Apply filters to query
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

        // Fetch the total number of catalogs and collections
        $totalCatalogs = Catalog::count();
        $totalCollections = Collection::count();

        // Pass the data to the view
        return view('books.index', compact('books', 'filters', 'filterValues', 'totalCatalogs', 'totalCollections'));
    }

    public function show($id)
    {
        $catalogs = Catalog::with(['collections.location'])->findOrFail($id);
        $marcData = MARC::where('Catalogid', $id)->orderBy('Tag', 'asc')->get();

        $relatedBooks = Catalog::where('Author', $catalogs->Author)
                                ->where('ID', '!=', $catalogs->ID)
                                ->limit(5)
                                ->get();

        return view('books.show', compact('catalogs', 'relatedBooks', 'marcData'));
    }
}
