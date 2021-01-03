<?php

namespace App\View\Components;

use App\Models\Comment as CommentModel;
use Illuminate\View\Component;

class Comment extends Component
{
    public CommentModel $comment;

    public function __construct(CommentModel $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.comment');
    }
}
