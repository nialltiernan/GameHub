<?php

namespace App\Http\Controllers;

use App\Services\Rawg\ClientRetriever;
use App\View\Models\GameViewModel;
use Validator;

class GameController extends Controller
{
    public function show($id, ClientRetriever $clientRetriever)
    {
        $validator = Validator::make(['id' => $id], ['id' => 'numeric',]);

        if ($validator->fails()) {
            abort(404);
        }

        $client = $clientRetriever->executeNoAuth();

        $data = $client->games()->getGame($id)->getData();

        $viewModel = new GameViewModel($data);

        return view('game', ['game' => $viewModel->data()]);
    }
}
