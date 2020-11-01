<div wire:init="loadGames" class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
    @forelse($games as $game)
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="#">
                    <img src="{{ $game['coverImageUrl'] }}" alt="game cover" class="hover:opacity-75">
                </a>
                {{ $game['name'] }}
            </div>
        </div>
    @empty
        @foreach(range(1,12) as $game)
            <div class="game mt-8">
                <div class="relative inline-block">
                    <div class="bg-gray-800 w-40 h-56"></div>
                </div>
                <div class="block text-lg text-transparent bg-gray-700 rounded leading-tight mt-4">Title goes here</div>
                <div class="text-transparent bg-gray-700 rounded mt-3 inline-block">PS4, PC, XBOX One</div>
            </div>
        @endforeach
    @endforelse
</div>
