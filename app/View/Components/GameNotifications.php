<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GameNotifications extends Component
{

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.game-notifications');
    }
}
