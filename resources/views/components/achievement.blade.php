<div class="flex">
    <img id="achievement_{{ $name }}" src="{{ $imageUrl }}" alt="{{ $name }}" class="h-20 mr-4" onclick="showAchievementModal(this)">
    <div>
        <div class="text-sm">
            {{ $percent }}
        </div>
        <div class="text-lg">
            {{ $name }}
        </div>
        <div class="text-sm text-gray-400">
            {{ $description }}
        </div>
    </div>
</div>
