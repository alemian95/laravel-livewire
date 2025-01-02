<?php

namespace App\Livewire;

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

    public function render()
    {
        return view('livewire.sidebar');
    }
}
