<div class="fixed top-0 bottom-0 left-0 lg:static h-dvh overflow-hidden shadow bg-white {{ $desktopState ? "lg:w-72" : "lg:w-16" }} {{ $mobileState ? "w-80" : "w-0" }} transition-all z-50">
    <div class="p-4 h-full w-full flex flex-col">
        <div>
            <div class="flex justify-end"><button class="lg:hidden" wire:click="toggleMobile"><i class="fa-solid fa-xmark text-lg"></i></button></div>
            <a class="no-underline w-full" href="{{ route('dashboard') }}">
                <div class="text-lg flex gap-4 items-center cursor-pointer rounded py-2 px-4 hover:bg-slate-300/40 {{ $desktopState ? "" : "md:flex md:justify-center" }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="{{ $desktopState ? "block" : "md:hidden" }}">Dashboard</span>
                </div>
            </a>
        </div>
        <hr>
        <div class="flex-1 flex flex-col gap-2 overflow-auto">
            <a class="no-underline w-full focus:outline-none" href="{{ route('items.index') }}">
                <div class="flex gap-4 items-center cursor-pointer rounded py-2 px-4 hover:bg-slate-300/40 {{ $desktopState ? "" : "md:flex md:justify-center" }}">
                    <i class="fa-solid fa-list"></i>
                    <span class="{{ $desktopState ? "block" : "md:hidden" }}">Items</span>
                </div>
            </a>
            <a class="no-underline w-full" href="{{ route('profile.edit') }}">
                <div class="flex gap-4 items-center cursor-pointer rounded py-2 px-4 hover:bg-slate-300/40 {{ $desktopState ? "" : "md:flex md:justify-center" }}">
                    <i class="fa-solid fa-user"></i>
                    <span class="{{ $desktopState ? "block" : "md:hidden" }}">Profile</span>
                </div>
            </a>
            <a class="no-underline w-full" href="{{ route('dashboard') }}">
                <div class="flex gap-4 items-center cursor-pointer rounded py-2 px-4 hover:bg-slate-300/40 {{ $desktopState ? "" : "md:flex md:justify-center" }}">
                    <i class="fa-solid fa-wrench"></i>
                    <span class="{{ $desktopState ? "block" : "md:hidden" }}">Settings</span>
                </div>
            </a>
        </div>
        <hr>
        <div class="flex flex-col gap-2">
            <div class="w-full flex gap-4 items-center cursor-pointer text-red-600 rounded py-2 px-4 hover:bg-slate-300/40 {{ $desktopState ? "" : "md:flex md:justify-center" }}" wire:click="logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="{{ $desktopState ? "block" : "md:hidden" }}">Logout</span>
            </div>
            <footer class="{{ $desktopState ? "lg:block" : "lg:hidden" }}">
                <p class="text-center text-xs text-slate-600">&copy; {{ date('Y') }} - Laravel Livewire</p>
            </footer>
        </div>
    </div>
</div>
