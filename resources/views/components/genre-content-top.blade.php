<div class="flex justify-between">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
        {{ $title }}
    </h2>

    <form method="get" action="{{ route('genres.show', ['id' => $genreId]) }}" onchange="this.submit()">
        <label class="pr-2">
            Results per page
            <select name="limit" class="text-blue-500 rounded">
                @foreach($limitOptions as $option)
                    @if ($option === $limit)
                        <option selected>{{ $option }}</option>
                    @else
                        <option>{{ $option }}</option>
                    @endif
                @endforeach
            </select>
        </label>

        <label class="pr-2">
            Sort by
            <select name="sort" class="text-blue-500 rounded">
                @foreach($sortOptions as $value => $name)
                    @if ($value === $sort)
                        <option value="{{ $value }}" selected>{{ $name }}</option>
                    @else
                        <option value="{{ $value }}">{{ $name }}</option>
                    @endif
                @endforeach
            </select>
        </label>

        <label class="pr-8">
            Order
            <select name="order" class="text-blue-500 rounded">
                @foreach($orderOptions as $value => $name)
                    @if ($value === $order)
                        <option value="{{ $value }}" selected>{{ $name }}</option>
                    @else
                        <option value="{{ $value }}">{{ $name }}</option>
                    @endif
                @endforeach
            </select>
        </label>
    </form>

    <img class="lg:hidden block mr-10" src="/images/icons/hamburger.svg" onclick="toggleSidebarVisibility()" alt="toggleSidebarButton"/>
</div>
