<div>
    @push('scripts')
        @include('javascript.descriptionShowMore')
    @endpush

    <div>
        <div id="descriptionPreview">
            <p class="mt-6">{{ $preview }}
                <span
                    class="bg-blue-500 text-white font-semibold px-1 hover:bg-blue-600 rounded"
                    onclick="descriptionShowFull()">Show more
                </span>
            </p>
        </div>

        <div id="descriptionFull" class="hidden">
            <p class="mt-6">{{ $full }}
                <span
                    class="bg-blue-500 text-white font-semibold px-1 hover:bg-blue-600 rounded"
                    onclick="descriptionShowPreview()">Show less
                </span>
            </p>
        </div>
    </div>
</div>
