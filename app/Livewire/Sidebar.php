<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
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
    }

    public function toggleMobile() {
        $this->mobileState =! $this->mobileState;
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
