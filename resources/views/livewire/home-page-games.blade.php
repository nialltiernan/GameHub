<div wire:init="loadGames" class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
    @forelse($games as $game)
        <x-game-card :game="$game" />
    @empty
        @foreach(range(1,12) as $game)
            <x-game-card-loading />
        @endforeach
    @endforelse
</div>

@push('scripts')
    <script>
        window.livewire.on('gameWithRatingAdded', params => {
            let progressBarContainer = document.getElementById(params.slug);

            let bar = new ProgressBar.Circle(progressBarContainer, {
                color: 'white',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 6,
                trailWidth: 4,
                easing: 'easeInOut',
                duration: 2500,
                text: {
                    autoStyleContainer: false
                },
                from: { color: '#48BB78', width: 6 },
                to: { color: '#48BB78', width: 6 },
                // Set default step function for all animate calls
                step: function(state, circle) {
                    circle.path.setAttribute('stroke', state.color);
                    circle.path.setAttribute('stroke-width', state.width);

                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('0%');
                    } else {
                        circle.setText(value + '%');
                    }

                }
            });
            bar.animate(params.rating / 100);
        })

    </script>
@endpush
