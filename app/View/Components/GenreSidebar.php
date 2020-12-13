<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GenreSidebar extends Component
{
    public array $genres;
    public int $genreId;

    public function __construct(array $genres, int $genreId)
    {
        $this->genres = $genres;
        $this->genreId = $genreId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.genre-sidebar', [
            'genres' => $this->genres,
            'genreId' => $this->genreId
        ]);
    }
}
