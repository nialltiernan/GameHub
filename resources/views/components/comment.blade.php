<div class="flex justify-between bg-gray-600 p-4 mb-2 rounded">
    <span>{{ $comment->message }}</span>
    <span class="text-sm">Posted by {{ $comment->user->username }} on {{ $comment->created_at->format('M d Y') }}</span>
</div>
