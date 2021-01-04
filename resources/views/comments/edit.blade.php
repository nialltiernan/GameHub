@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">

        <div class="flex flex-col md:flex-row md:justify-between">
            <h1>Edit comment</h1>

            <div class="flex">
                <a href="{{ route('game.show', ['id' => $comment->game_id]) }}"
                   class="button-primary hover:bg-blue-700 mr-4">Back</a>

                <form action="{{ route('comments.destroy', ['comment' => $comment]) }}"
                      class="inline-block" method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="gameId" value="{{ $comment->game_id }}">
                    <input type="submit" value="Delete"
                           class="button-delete hover:bg-red-600"
                           onclick="return confirm('Are you sure you want to delete this comment?');"/>
                </form>
            </div>


        </div>

        <form action="{{ route('comments.update', ['comment' => $comment]) }}" method="POST" class="mt-5">
            @csrf
            @method('PATCH')

            <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
            <input type="hidden" name="gameId" value="{{ $comment->game_id }}">

            <textarea
                name="message"
                class="text-input focus:outline-none focus:shadow-outline w-full"
                placeholder="{{ $comment->message }}"
                maxlength="255"
                required="required"
            ></textarea>

            <input type="submit" class="button-primary hover:bg-blue-700 mt-2" value="Save">
        </form>

    </div>
@endsection
