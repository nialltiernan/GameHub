<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GameCardSmall extends Component
{

    public array $game;

    public function __construct(array $game)
    {
        $this->game = $game;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.game-card-small');
    }
}
