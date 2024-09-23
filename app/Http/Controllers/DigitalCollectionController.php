<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\MARC;

class DigitalCollectionController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $format = $request->input('format');
        $catalogs = null;

        if ($keyword) {
            $query = Catalog::query();

            switch ($format) {
                case 'author':
                    $query->where('Author', 'LIKE', "%{$keyword}%");
                    break;
                case 'publisher':
                    $query->where('Publisher', 'LIKE', "%{$keyword}%");
                    break;
                case 'isbn':
                    $query->where('ISBN', 'LIKE', "%{$keyword}%");
                    break;
                case 'ismn':
                    $query->where('ISMN', 'LIKE', "%{$keyword}%");
                    break;
                default:
                    $query->where('Title', 'LIKE', "%{$keyword}%");
            }

            $catalogs = $query->paginate(10)->appends($request->except('page'));
        }

        return view('DigitalCollection.index', compact('catalogs'));
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