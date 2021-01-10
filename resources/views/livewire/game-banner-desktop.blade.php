<div wire:init="loadBanner" class="flex justify-center border-t border-gray-800 pt-8 mt-8">
    @if ($banner)
       <a href="{{ $banner->url }}" target="_blank">
           <img src="{{ $banner->image['url'] }}">
       </a>
    @endif
</div>
