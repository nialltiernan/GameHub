<div wire:init="loadComments" class="border-b border-gray-800 mt-8">
    <h1 class="mb-2">Comments</h1>
    @if ($comments)
        <ul>
            @forelse($comments as $comment)
                <li>
                    <x-comment :comment="$comment"/>
                </li>
            @empty
                <span class="mb-2">No comments yet...</span>
            @endforelse
        </ul>
    @endif

    <x-add-comment :game-id="$gameId"/>

</div>
