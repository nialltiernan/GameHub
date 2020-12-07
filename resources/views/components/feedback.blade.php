<div class="bg-gray-800 mb-8 rounded p-4">
    @if ($email)
        Message left by {{ $email }}<br><br>
    @endif
    {{ $comment }}
</div>
