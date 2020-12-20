<div wire:init="loadScreenshots">

    @include('javascript.screenshotsModal')

    <div id="screenshots-modal" class="hidden fixed z-10 left-0 top-0 w-full h-full overflow-auto bg-gray-800 bg-opacity-75">
        <span class="text-6xl hover:text-gray-500 absolute" style="right: 3.5rem" onclick="hideScreenshotModal()">&times;</span>
        <span class="text-6xl hover:text-gray-500 fixed" style="top: 50%; left: 2rem" onclick="previousScreenshotModal()">{{ '<' }}</span>
        <span class="text-6xl hover:text-gray-500 absolute" style="top: 50%; right: 2rem" onclick="nextScreenshotModal()">{{ '>' }}</span>
        <img id="modal-image" src="" class="w-4/5 mt-10 m-auto" alt="screenshot modal">
    </div>

    <div class="images-container border-b border-gray-300 pb-12 mt-8">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Screenshots</h2>
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
