<div class="fixed top-0 bottom-0 left-0 lg:static h-dvh overflow-hidden bg-white {{ $desktopState ? "lg:w-80" : "lg:w-16" }} {{ $mobileState ? "w-80" : "w-0" }} transition-all z-50">
    <div class="overflow-auto p-4 h-full w-full flex flex-col">
        <div>
            <div class="flex justify-end"><button class="lg:hidden" wire:click="toggleMobile"><i class="fa-solid fa-xmark text-lg"></i></button></div>
        </div>
        <div class="flex-1"></div>
        <div></div>
    </div>
</div>
