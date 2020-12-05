<div wire:init="loadGames" class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 border-b border-gray-800 pb-16 pr-8">
    @forelse($games as $game)
        <x-platform-games :game="$game" />
    @empty
        @foreach(range(1,12) as $game)
            <x-game-card-loading />
        @endforeach
    @endforelse
</div>
