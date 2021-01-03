<div class="my-5">
    @if (Auth::check())

        <h2>Add a comment</h2>

        <form action="{{ route('comments.store') }}" method="POST">
            @csrf

            <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
            <input type="hidden" name="gameId" value="{{ $gameId }}">

            <textarea
                name="message"
                class="text-input focus:outline-none focus:shadow-outline w-full"
                placeholder="Place your comment here"
                maxlength="255"
                required="required"
            ></textarea>

            <input type="submit" class="button-primary hover:bg-blue-700 mt-2" value="Comment">
        </form>
    @else
        <h2>
            <a href="{{ route('auth.showLogin') }}" class="underline hover:text-gray-400">Login</a> to add a comment
        </h2>
    @endif
</div>
