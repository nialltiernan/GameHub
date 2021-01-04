<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\Html\EmojiFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function edit(Comment $comment)
    {
        if ($this->doesCommentBelongToAnotherUser($comment)) {
            return redirect()->route('gamehub.index');
        }

        return view('comments.edit', ['comment' => $comment]);
    }

    public function update(Request $request, Comment $comment): RedirectResponse
    {
        $request->validate([
            'message' => 'required',
            'userId' => 'required',
            'gameId' => 'required'
        ]);

        $comment->message = $request->message;
        $comment->save();

        return redirect()
            ->route('game.show', ['id' => $request->gameId])
            ->with('commentUpdated', 'Your comment has been updated');
    }

    public function destroy(Request $request, Comment $comment)
    {
        if ($this->doesCommentBelongToAnotherUser($comment)) {
            return redirect()->route('gamehub.index');
        }

        $comment->delete();

        return redirect()
            ->route('game.show', ['id' => $request->gameId])
            ->with('commentDeleted', 'Your comment has been removed');
    }

    private function doesCommentBelongToLoggedInUser(Comment $comment): bool
    {
        return $comment->user->is(Auth::user());
    }

    private function doesCommentBelongToAnotherUser(Comment $comment): bool
    {
        return !$this->doesCommentBelongToLoggedInUser($comment);
    }
}
