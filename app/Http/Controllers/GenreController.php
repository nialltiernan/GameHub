<?php

namespace App\Http\Controllers;

use App\Services\IGDB\GetApiHeaders;
use App\Services\IGDB\GetEndpoint;
use App\ViewModels\GamesViewModel;
use Illuminate\Support\Facades\Http;

class GenreController extends Controller
{
    public function index()
    {
        return view('genres.index');
    }

    public function show($id,  GetApiHeaders $headers)
    {
        $query = sprintf(
            'fields name, cover.url,rating, platforms.abbreviation;
            where genres = (%s);
            sort rating desc; 
            limit 15;', $id
        );

        $games = Http::withHeaders($headers->fetch())
            ->withBody($query, 'raw')
            ->post(GetEndpoint::fetch('games'))
            ->json();

        if (empty($games)) {
            abort(404);
        }

        $viewModel = new GamesViewModel($games);

        return view('genres.show', [
            'games' => $viewModel->data()
        ]);
    }
}
