<div class="fixed top-0 bottom-0 left-0 lg:static h-dvh overflow-hidden bg-white {{ $desktopState ? "lg:w-80" : "lg:w-16" }} {{ $mobileState ? "w-80" : "w-0" }} transition-all">
    <div class="overflow-auto">
        <button class="lg:hidden" wire:click="toggleMobile">close</button>
    </div>
</div>
