<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GenreContentTop extends Component
{
    public string $title;
    public int $genreId;
    public array $limitOptions;
    public int $limit;
    public array $orderOptions;
    public string $order;
    public array $sortOptions;
    public string $sort;

    public function __construct(
        string $title,
        int $genreId,
        array $limitOptions,
        int $limit,
        array $orderOptions,
        string $order,
        array $sortOptions,
        string $sort
    ) {
        $this->title = $title;
        $this->genreId = $genreId;
        $this->limitOptions = $limitOptions;
        $this->limit = $limit;
        $this->orderOptions = $orderOptions;
        $this->order = $order;
        $this->sortOptions = $sortOptions;
        $this->sort = $sort;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.genre-content-top');
    }
}
