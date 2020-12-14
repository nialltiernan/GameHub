<?php

namespace App\Http\Livewire;

use App\Rawg\Filters\GamesFilter;
use App\Services\Rawg\ClientRetriever;
use App\ViewModels\SearchResultsViewModel;
use Livewire\Component;

class SearchDropdown extends Component
{

    public string $search = '';
    public array $searchResults = [];

    public function render(ClientRetriever $clientRetriever)
    {
        if ($this->search) {
            $filter = new GamesFilter();
            $filter->setSearch($this->search);

            $client = $clientRetriever->execute();
            $data = $client->games()->getGames($filter)->getData()['results'];

            $viewModel = new SearchResultsViewModel($data);

            $this->searchResults = $viewModel->data();
        } else {
            $this->searchResults = [];
        }

        return view('livewire.search-dropdown');
    }
}
