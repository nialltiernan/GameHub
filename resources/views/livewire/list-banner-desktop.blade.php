<div wire:init="loadBanner" class="hidden lg:block mt-8 w-1/5">
    <div class="flex flex-row-reverse">
        @if ($banner)
            <a href="{{ $banner->url }}" target="_blank">
                <img src="{{ $banner->image['url'] }}">
            </a>
        @endif
    </div>
</div>
