<?php

namespace App\Http\Controllers;

use App\Models\GameList;
use App\Models\User;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ListController extends Controller
{

    public function index(User $user)
    {
        if ($this->doesListBelongToAnotherUser($user)) {
            return redirect()->route('gamehub.index');
        }

        return view('lists.index', ['lists' => $user->lists]);
    }

    public function show(User $user, GameList $list)
    {
        if ($this->doesListBelongToAnotherUser($user)) {
            return redirect()->route('gamehub.index');
        }

        return view('lists.show', [
            'list' => $list,
            'listGameIdToGameIds' => $list->games()->pluck('game_id','id')
        ]);
    }

    public function store(User $user, Request $request): RedirectResponse
    {
        if ($this->doesListBelongToAnotherUser($user)) {
            return redirect()->route('gamehub.index');
        }

        GameList::create([
            'user_id' => $user->id,
            'name' => $request->name
        ]);

        return redirect()
            ->route('lists.index', ['user' => $user])
            ->with('listCreated', 'You have created a list!');
    }

    public function destroy(User $user, GameList $list): RedirectResponse
    {
        if ($this->doesListBelongToAnotherUser($user)) {
            return redirect()->route('gamehub.index');
        }

        $list->delete();

        return redirect()
            ->route('lists.index', ['user' => $user])
            ->with('listDeleted', 'You have deleted a list');
    }

    private function doesListBelongToLoggedInUser(User $user): bool
    {
        return $user->is(Auth::user());
    }

    private function doesListBelongToAnotherUser(User $user): bool
    {
        return !$this->doesListBelongToLoggedInUser($user);
    }
}
