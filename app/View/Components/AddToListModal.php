<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddToListModal extends Component
{
    public int $gameId;

    public function __construct(int $gameId)
    {
        $this->gameId = $gameId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.add-to-list-modal');
    }
}
