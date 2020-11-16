<div class="similar-games-container mt-8">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar Games</h2>
    <div class="similar-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
        @foreach($game['similar_games'] as $similarGame)
            <x-game-card-small :game="$similarGame" />
        @endforeach
    </div>
</div>