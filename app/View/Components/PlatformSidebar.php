<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PlatformSidebar extends Component
{
    public array $platforms;
    public int $platformId;

    public function __construct($platforms, $platformId)
    {
        $this->platforms = $platforms;
        $this->platformId = $platformId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.platform-sidebar', [
            'platforms' => $this->platforms,
            'platformId' => $this->platformId
        ]);
    }
}
