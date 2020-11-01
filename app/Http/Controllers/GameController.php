<?php

namespace App\Http\Controllers;

use App\Services\IGDB\GetApiHeaders;
use App\Services\IGDB\GetEndpoint;
use App\ViewModels\GameViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function show($id, GetApiHeaders $headers)
    {
        $query = sprintf('fields name, cover.url; where id = %s;', $id);

        $data = Http::withHeaders($headers->fetch())
            ->withBody($query, 'raw')
            ->post(GetEndpoint::fetch('games'))
            ->json();

        if (empty($data)) {
            abort(404);
        }

        $viewModel = new GameViewModel(array_pop($data));

        return view('game', ['game' => $viewModel->data()]);
    }
}
