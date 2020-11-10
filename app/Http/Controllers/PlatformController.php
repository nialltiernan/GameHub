<?php

namespace App\Http\Controllers;

use App\Services\IGDB\GetApiHeaders;
use App\Services\IGDB\GetEndpoint;
use App\ViewModels\GamesViewModel;
use App\ViewModels\PlatformsViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlatformController extends Controller
{
    public function index()
    {

        $viewModel = new PlatformsViewModel();

        return view('platforms.index', [
            'platforms' => $viewModel->getPlatforms()
        ]);
    }

    public function show($id,  GetApiHeaders $headers)
    {
        $query = sprintf(
            'fields name, cover.url,rating, platforms.abbreviation;
            where platforms = (%s) & aggregated_rating != null;
            sort aggregated_rating desc; 
            limit 15;', $id
        );

        $games = Http::withHeaders($headers->fetch())
            ->withBody($query, 'raw')
            ->post(GetEndpoint::fetch('games'))
            ->json();

        if (empty($games)) {
            abort(404);
        }


        $gamesViewModel = new GamesViewModel($games);
        $platformsViewModel = new PlatformsViewModel();

        return view('platforms.show', [
            'games' => $gamesViewModel->data(),
            'platforms' => $platformsViewModel->getPlatforms(),
            'selectedPlatform' => $platformsViewModel->getSelectedPlatform($id),
        ]);
    }
}
