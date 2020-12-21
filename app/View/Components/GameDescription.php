<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GameDescription extends Component
{
    public string $preview;
    public string $full;


    public function __construct(string $preview, string $full)
    {
        $this->preview = $preview;
        $this->full = $full;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.game-description');
    }
}
