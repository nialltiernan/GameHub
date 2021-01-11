<div wire:init="loadBanner" class="hidden lg:block border-t border-gray-800 pt-8 mt-8">
    <div class="flex justify-center">
        @if ($banner)
            <a href="{{ $banner->url }}" target="_blank">
                <img src="{{ $banner->image['url'] }}">
            </a>
        @endif
    </div>

</div>
