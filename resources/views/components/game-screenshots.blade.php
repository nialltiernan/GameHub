<div class="images-container border-b border-gray-800 pb-12 mt-8">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Screenshots</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
        @forelse($game['screenshots'] as $screenshot)
            <div>
                <a href="{{ $screenshot['url'] }}">
                    <img src="{{ $screenshot['url'] }}" class="hover:opacity-75 transition ease-in-out duration-150" alt="screenshot">
                </a>
            </div>
        @empty
            No screenshots available <p style="font-size:50px">&#129335;</p>
        @endforelse
    </div>
</div>