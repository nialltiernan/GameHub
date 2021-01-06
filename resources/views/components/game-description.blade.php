<div>
    @push('scripts')
        @include('javascript.descriptionShowMore')
    @endpush

    <div>
        @if ($isPreviewRequired)
            <div id="descriptionPreview">
                <p class="mt-6">{{ $preview }}...
                    <span
                        class="bg-blue-500 text-white font-semibold px-1 hover:bg-blue-600 rounded inline-block"
                        onclick="descriptionShowFull()">Show more
                    </span>
                </p>
            </div>

            <div id="descriptionFull" class="hidden">
                <p class="mt-6">{{ $full }}
                    <span
                        class="bg-blue-500 text-white font-semibold px-1 hover:bg-blue-600 rounded inline-block"
                        onclick="descriptionShowPreview()">Show less
                    </span>
                </p>
            </div>
        @else
            <div id="description">
                <p class="mt-6">{{ $preview }}</p>
            </div>
        @endif
    </div>
</div>
