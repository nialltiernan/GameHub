<?php

namespace App\Http\Controllers;

use App\Models\GameList;
use App\Models\ListGame;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ListGameController extends Controller
{

    public function store(User $user, GameList $list, Request $request): RedirectResponse
    {
        ListGame::create([
            'game_list_id' => $request->gameListId,
            'game_id' => $request->gameId,
        ]);

        return redirect()
            ->route('lists.show', ['user' => $user, 'list' => $list])
            ->with('gameAdded', 'You have added a game to this list!');
    }

    public function destroy(User $user, GameList $list, ListGame $listGame): RedirectResponse
    {
        $listGame->delete();

        return redirect()
            ->route('lists.show', ['user' => $user, 'list' => $list])
            ->with('gameRemoved', 'You have removed a game from this list');
    }
}
