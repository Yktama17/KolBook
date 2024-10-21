<?php

namespace App\Http\Controllers\Api;

use App\Models\Catalog;
use App\Http\Resources\BookResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
     
        $filters = $request->input('filter', []);
        $filterValues = $request->input('filterValue', []);

      
        $books = Catalog::withCount('collections');

        if (count($filters) === count($filterValues)) {
            foreach ($filters as $index => $filter) {
                $filterValue = $filterValues[$index] ?? null;
                if (!empty($filterValue)) { 
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
            }
        }

        
        $books = $books->paginate(20)->appends([
            'filter' => $filters,
            'filterValue' => $filterValues,
        ]);

        return BookResource::collection($books);
    }

    public function show($id)
    {
        
        $catalog = Catalog::with(['collections.location'])->findOrFail($id);
        return new BookResource($catalog); 
    }
}
