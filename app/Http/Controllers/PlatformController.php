<?php

namespace App\Http\Controllers;

use App\Enums\Platforms;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index()
    {
        return view('platforms.index', ['platforms' => Platforms::getIdToNameMappings()]);
    }

    public function show(Request $request, int $id)
    {
        $sort = $request->input('sort', 'rating');
        $order = $request->input('order', 'desc');
        $title = $this->getTitle($sort, $order, $id);

        return view('platforms.show', [
            'platforms' => Platforms::getIdToNameMappings(),
            'title' => $title,
            'platformId' => $id,
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
            return sprintf('Most loved games of %s', Platforms::getDisplayName($id));
        }
        if ($sort === 'rating' && $order === 'asc') {
            return sprintf('Least loved games of %s', Platforms::getDisplayName($id));
        }
        if ($sort === 'name' && $order === 'desc') {
            return sprintf('Games Z to A of %s', Platforms::getDisplayName($id));
        }
        if ($sort === 'name' && $order === 'asc') {
            return sprintf('Games A to Z of %s', Platforms::getDisplayName($id));
        }
        if ($sort === 'released' && $order === 'desc') {
            return sprintf('Oldest games of %s', Platforms::getDisplayName($id));
        }
        if ($sort === 'released' && $order === 'asc') {
            return sprintf('Newest games of %s', Platforms::getDisplayName($id));
        }
        return '';
    }
}
