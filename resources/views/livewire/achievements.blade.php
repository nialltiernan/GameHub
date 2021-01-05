<div wire:init="loadAchievements" class="border-b border-gray-800 pb-12 mt-8">
    <div class="">
        <h1>
            Achievements (
                <a href="{{ route('game.achievements', ['id' => $gameId]) }}" class="hover:text-gray-400 underline">
                    See all
                </a>
            )
        </h1>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-8">
        @forelse($achievements as $achievement)
            <x-achievement :achievement="$achievement" />
        @empty
            <div>
                No achievements found
            </div>
        @endforelse
    </div>
</div>
