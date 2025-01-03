<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class Sidebar extends Component
{

    protected $listeners = [
        'toggledesktopsidebar' => 'toggleDesktop',
        'togglemobilesidebar' => 'toggleMobile'
    ];

    public $desktopState = true;
    public $mobileState = false;

    public function toggleDesktop() {
        $this->desktopState = ! $this->desktopState;
        Cookie::queue('sidebar', $this->desktopState ? 1 : 0);
    }

    public function toggleMobile() {
        $this->mobileState =! $this->mobileState;
    }

    public function mount() {
        $this->desktopState = !Cookie::has('sidebar') ? true : (Cookie::get('sidebar') ? true : false);
    }

    public function logout() {
        Auth::guard('web')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
