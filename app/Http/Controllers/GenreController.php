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
        $title = $this->getTitle($sort, $order, $id);

        return view('genres.show', [
            'genres' => Genres::getIdToNameMappings(),
            'genreId' => $id,
            'title' => $title,
            'limit' => (int) $request->input('limit', 12),
            'limitOptions' => [12, 24, 48],
            'sort' => $sort,
            'sortOptions' => ['name' => 'Alphabetical', 'released' => 'Release Date', 'rating' => 'Rating'],
            'order' => $order,
            'orderOptions' => ['asc' => 'Ascending', 'desc' => 'Descending']
        ]);
    }

    private function getTitle(string $sort, string $order, int $id): string
    {
        if ($sort === 'rating' && $order === 'desc') {
            return sprintf('Most loved %s games', Genres::getDisplayName($id));
        }
        if ($sort === 'rating' && $order === 'asc') {
            return sprintf('Least loved %s games', Genres::getDisplayName($id));
        }
        if ($sort === 'name' && $order === 'desc') {
            return sprintf('Games Z to A %s games', Genres::getDisplayName($id));
        }
        if ($sort === 'name' && $order === 'asc') {
            return sprintf('Games A to Z %s games', Genres::getDisplayName($id));
        }
        if ($sort === 'released' && $order === 'desc') {
            return sprintf('Oldest %s games', Genres::getDisplayName($id));
        }
        if ($sort === 'released' && $order === 'asc') {
            return sprintf('Newest %s games', Genres::getDisplayName($id));
        }
        return '';
    }

}
