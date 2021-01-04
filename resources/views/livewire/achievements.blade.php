<div wire:init="loadAchievements" class="border-b border-gray-800 pb-12 mt-8">
    <h1>Achievements</h1>
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
