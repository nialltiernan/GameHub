<div wire:init="loadSimilarGames">
    <div class="similar-games-container mt-8">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar Games</h2>
        <div class="similar-games text-sm grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-12">
            @foreach($games as $game)
                <x-game-card-small :game="$game" />
            @endforeach
        </div>
    </div>
</div>
