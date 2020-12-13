<?php

namespace App\Http\Controllers;

use App\Enums\Genres;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return view('genres.index', ['genres' => Genres::getIdToNameMappings()]);
    }

    public function show(Request $request, int $id)
    {
        $sort = $request->input('sort', 'rating');
        $order = $request->input('order', 'desc');

        return view('genres.show', [
            'genres' => Genres::getIdToNameMappings(),
            'genreId' => $id,
            'limit' => (int) $request->input('limit', 12),
            'limitOptions' => [12, 24, 48],
            'sort' => $sort,
            'sortOptions' => ['name' => 'Alphabetical', 'released' => 'Release Date', 'rating' => 'Rating'],
            'order' => $order,
            'orderOptions' => ['asc' => 'Ascending', 'desc' => 'Descending']
        ]);
    }

}
