<?php

namespace App\Http\Livewire;

use App\Services\IGDB\GetApiHeaders;
use App\Services\IGDB\GetEndpoint;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{

    public $search = '';
    public $searchResults = [];

    private const ROUTE = 'games';
    private const QUERY = '
        search "%s";
        fields name, cover.url;
        limit 9;';

    public function render(GetApiHeaders $headers)
    {
        $this->searchResults = Http::withHeaders($headers->fetch())
            ->withBody(sprintf(self::QUERY, $this->search), 'raw')
            ->post(GetEndpoint::fetch(self::ROUTE))
            ->json();

        return view('livewire.search-dropdown');
    }
}
