<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PlatformContent extends Component
{
    private string $sort;
    private string $order;
    private int $limit;
    private int $platformId;
    private string $selectedPlatform;
    private array $limitOptions;
    private array $sortOptions;
    private array $orderOptions;

    /**
     * PlatformContent constructor.
     * @param string $selectedPlatform
     * @param int $platformId
     * @param string $sort
     * @param string $order
     * @param int $limit
     * @param array $limitOptions
     * @param array $sortOptions
     * @param array $orderOptions
     */
    public function __construct(
        string $selectedPlatform,
        int $platformId,
        string $sort,
        string $order,
        int $limit,
        array $limitOptions,
        array $sortOptions,
        array $orderOptions
    ) {
        $this->sort = $sort;
        $this->order = $order;
        $this->limit = $limit;
        $this->platformId = $platformId;
        $this->selectedPlatform = $selectedPlatform;
        $this->limitOptions = $limitOptions;
        $this->sortOptions = $sortOptions;
        $this->orderOptions = $orderOptions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.platform-content', [
            'sort' => $this->sort,
            'order' => $this->order,
            'limit' => $this->limit,
            'platformId' => $this->platformId,
            'selectedPlatform' => $this->selectedPlatform,
            'sortOptions' => $this->sortOptions,
            'limitOptions' => $this->limitOptions,
            'orderOptions' => $this->orderOptions,
        ]);
    }
}
