@include('javascript.screenshotModals')

<div id="modal-container" class="modal-container hidden fixed z-10 left-0 top-0 w-full h-full overflow-auto bg-gray-800 bg-opacity-75">
    <span class="text-6xl hover:text-gray-500 absolute" style="right: 3.5rem" onclick="hideModal()">&times;</span>
    <span class="text-6xl hover:text-gray-500 fixed" style="top: 50%; left: 2rem" onclick="previousModal()">{{ '<' }}</span>
    <span class="text-6xl hover:text-gray-500 absolute" style="top: 50%; right: 2rem" onclick="nextModal()">{{ '>' }}</span>
    <img id="modal-image" src="" class="w-4/5 mt-10 m-auto" alt="screenshot modal">
</div>

<div class="images-container border-b border-gray-300 pb-12 mt-8">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Screenshots</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
        @forelse($game['screenshots'] as $screenshot)
            <div>
                <img
                    id="screenshot_{{ $screenshot['id'] }}"
                    src="{{ $screenshot['url'] }}"
                    class="hover:opacity-75 transition ease-in-out duration-150"
                    alt="screenshot"
                    onclick="showModal(this)"
                >
            </div>
        @empty
            No screenshots available <p style="font-size:50px">&#129335;</p>
        @endforelse
    </div>
</div>
