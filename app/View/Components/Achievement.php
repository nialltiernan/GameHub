<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Achievement extends Component
{
    public array $achievement;
    public string $name;
    public string $description;
    public string $imageUrl;
    public string $percent;

    public function __construct(array $achievement)
    {
        $this->achievement = $achievement;
        $this->name = $achievement['name'];
        $this->description = $achievement['description'];
        $this->imageUrl = $achievement['image'];
        $this->percent = $achievement['percent'] . '%';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.achievement');
    }
}
