<div wire:init="loadScreenshots">
    <div class="border-b border-gray-800 pb-12 mt-8">
        <h1>Screenshots</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
            @forelse($screenshots as $index => $screenshot)
                <div>
                    <img
                        id="screenshot_{{ $index }}"
                        src="{{ $screenshot }}"
                        class="hover:opacity-75 transition ease-in-out duration-150"
                        alt="screenshot"
                        onclick="showScreenshotModal(this)"
                    >
                </div>
            @empty
                No screenshots available <p style="font-size:50px">&#129335;</p>
            @endforelse
        </div>
    </div>

</div>
