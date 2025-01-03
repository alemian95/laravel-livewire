<div class="fixed top-0 bottom-0 left-0 lg:static h-dvh overflow-hidden shadow bg-white {{ $desktopState ? "lg:w-72" : "lg:w-16" }} {{ $mobileState ? "w-80" : "w-0" }} transition-all z-10">
    <div class="overflow-auto p-4 h-full w-full flex flex-col">
        <div>
            <div class="flex justify-end"><button class="lg:hidden" wire:click="toggleMobile"><i class="fa-solid fa-xmark text-lg"></i></button></div>
        </div>
        <div class="flex-1 flex flex-col gap-2">
            <a class="no-underline w-full" href="{{ route('dashboard') }}">
                <div class="text-lg flex gap-4 items-center cursor-pointer rounded py-2 px-4 hover:bg-slate-300/40 {{ $desktopState ? "" : "flex justify-center" }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="{{ $desktopState ? "block" : "hidden" }}">Dashboard</span>
                </div>
            </a>
            <hr>
            <a class="no-underline w-full" href="{{ route('profile.edit') }}">
                <div class="flex gap-4 items-center cursor-pointer rounded py-2 px-4 hover:bg-slate-300/40 {{ $desktopState ? "" : "flex justify-center" }}">
                    <i class="fa-solid fa-user"></i>
                    <span class="{{ $desktopState ? "block" : "hidden" }}">Profile</span>
                </div>
            </a>
            <a class="no-underline w-full" href="{{ route('dashboard') }}">
                <div class="flex gap-4 items-center cursor-pointer rounded py-2 px-4 hover:bg-slate-300/40 {{ $desktopState ? "" : "flex justify-center" }}">
                    <i class="fa-solid fa-wrench"></i>
                    <span class="{{ $desktopState ? "block" : "hidden" }}">Settings</span>
                </div>
            </a>
        </div>
        <div class="flex flex-col gap-2">
            <div class="w-full flex gap-4 items-center cursor-pointer text-red-600 rounded py-2 px-4 hover:bg-slate-300/40 {{ $desktopState ? "" : "flex justify-center" }}" wire:click="logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="{{ $desktopState ? "block" : "hidden" }}">Logout</span>
            </div>
        </div>
    </div>
</div>
