<div class="flex flex-col md:flex-row md:justify-between bg-gray-600 p-4 mb-2 rounded">
    <span class="w-3/4">{{ $comment->message }}</span>

    <span class="text-sm mt-2 md:mt-0 md:ml-5">
        @if (Auth::user()->is($comment->user))
            You, {{ $comment->created_at->format('M d Y') }}

            <div class="inline-block">
                <a href="{{ route('comments.edit', ['comment' => $comment]) }}"
                   class="bg-blue-500 text-white font-semibold px-2 hover:bg-blue-600 rounded">Edit</a>

                <form action="{{ route('comments.destroy', ['comment' => $comment]) }}" class="inline-block" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="gameId" value="{{ $comment->game_id }}">
                    <input type="submit" value="Delete"
                           class="bg-red-500 text-white font-semibold px-2 hover:bg-red-600 rounded"
                           onclick="return confirm('Are you sure you want to delete this comment?');"/>
                </form>
            </div>

        @else
            <span class="italic">{{ $comment->user->username }},</span>
            <div class="inline-block">
                {{ $comment->created_at->format('M d Y') }}
            </div>
        @endif
    </span>
</div>
