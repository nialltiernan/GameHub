<?php

namespace App\Http\Controllers;

use App\Services\IGDB\GetApiHeaders;
use App\Services\IGDB\GetEndpoint;
use App\ViewModels\GameViewModel;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function show($id, GetApiHeaders $headers)
    {
        $query = sprintf('fields 
            name, cover.url, first_release_date, platforms.abbreviation, rating, slug, 
            involved_companies.company.name, genres.name, aggregated_rating, summary, websites.*, videos.*,
            screenshots.*, similar_games.cover.url, similar_games.name, similar_games.rating,
            similar_games.platforms.abbreviation, similar_games.slug;
            where id = %s;', $id
        );

        $data = Http::withHeaders($headers->fetch())
            ->withBody($query, 'raw')
            ->post(GetEndpoint::fetch('games'))
            ->json();

        if (empty($data)) {
            abort(404);
        }

        $game = array_pop($data);
        $viewModel = new GameViewModel($game);

        return view('game', ['game' => $viewModel->data()]);
    }
}
