<?php

namespace App\Http\Controllers;

use App\Services\RAWG\ClientRetriever;
use App\ViewModels\GameViewModel;

class GameController extends Controller
{
    public function show($id, ClientRetriever $clientRetriever)
    {
        $client = $clientRetriever->execute();

        $data = $client->games()->getGame($id)->getData();

        $viewModel = new GameViewModel($data);

        return view('game', ['game' => $viewModel->data()]);
    }
}
