<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PlatformLinks extends Component
{
    public array $platforms;

    public function __construct(array $platforms)
    {
        $this->platforms = $platforms;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.platform-links');
    }
}
