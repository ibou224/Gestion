<div wire:ignore.self>

    @if($currentPage == PAGECREATEFORM)
        @include("livewire.utilisateurs.create")
    @endif

    @if($currentPage == PAGEEDITFORM)
        @include("livewire.utilisateurs.edit")
    @endif

    @if($currentPage == PAGELISTE)
        @include("livewire.utilisateurs.liste")

    @endif

</div>
