<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Feedback extends Component
{

    public string $comment;
    public ?string $email;

    public function __construct(string $comment, ?string $email)
    {
        $this->comment = $comment;
        $this->email = $email;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.feedback');
    }
}
