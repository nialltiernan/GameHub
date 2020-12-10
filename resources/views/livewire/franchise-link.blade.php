<div wire:init="loadFranchiseLink">
    @if($link)
        <a href="{{ $link }}">
            <img class="h-8 transform hover:scale-150" src="/images/icons/shopping-cart.svg" alt="purchase">
        </a>
    @endif
</div>
