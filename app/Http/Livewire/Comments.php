<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Collection;
use Livewire\Component;

class Comments extends Component
{
    public int $gameId;
    public Collection $comments;

    public function loadComments()
    {
        $comments = Comment::whereGameId($this->gameId)->orderBy('created_at', 'desc')->get();
        $this->comments = $comments;
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
