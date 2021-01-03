<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\Html\EmojiFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'message' => 'required',
            'userId' => 'required',
            'gameId' => 'required'
        ]);

        Comment::create([
            'message' => $request->message,
            'user_id' => $request->userId,
            'game_id' => $request->gameId,
        ]);

        return redirect()
            ->route('game.show', ['id' => $request->gameId])
            ->with('commentCreated', sprintf('Thank you for posting a comment %s', EmojiFactory::happy()));
    }
}
