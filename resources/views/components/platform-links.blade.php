<div class="text-gray-400 mt-1">
    @foreach($platforms as $id => $abbreviation)
        <a href="{{ route('platforms.show', ['id' => $id]) }}" class="hover:text-blue-600">
            {{ $abbreviation }}@if(!$loop->last),@endif
        </a>
    @endforeach
</div>
