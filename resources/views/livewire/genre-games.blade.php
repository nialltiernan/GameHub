<div wire:init="loadGames">
    <div class="game-grid md:grid-cols-2 lg:grid-cols-4 ">
        @forelse($games as $game)
            <x-platform-games :game="$game" />
        @empty
            @foreach(range(1,12) as $game)
                <x-game-card-loading />
            @endforeach
        @endforelse
    </div>
</div>

@push('scripts')
    @include('javascript.ratingLivewire')
@endpush
