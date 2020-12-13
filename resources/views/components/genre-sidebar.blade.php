<div id="sidebar" class="px-8 pt-4 bg-gray-800 rounded hidden lg:block">
    <ul>
        @foreach($genres as $id => $genre)
            <li @if($id === $genreId)
                class="text-blue-600 transform translate-x-5"
                @else
                class="hover:text-blue-600 transform hover:translate-x-5"
                    @endif>
                <a href="{{ route('genres.show', ['id' => $id]) }}">{{ $genre }}</a>
            </li>
        @endforeach
    </ul>
</div>

<div class="flex flex-col justify-around hidden lg:inline-flex">
    <button id="hideSideBarButton" onclick="toggleSidebarVisibility()" class="bg-blue-500 text-lg px-1 py-1 rounded-full">{{'<'}}</button>
    <button id="showSideBarButton" onclick="toggleSidebarVisibility()" class="bg-blue-500 text-lg px-1 py-1 rounded-full hidden">{{'>'}}</button>
</div>
