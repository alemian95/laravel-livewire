<?php

namespace App\Livewire;

use Livewire\Component;

class Toast extends Component
{

    public $toasts = [];

    protected $listeners = ['showToast'];

    public function showToast($type, $title, $message, $duration = 3000)
    {
        $id = uniqid();
        $this->toasts[] = compact('id', 'type', 'title', 'message', 'duration');

        // $this->dispatchBrowserEvent('toast-timer', ['id' => $id, 'duration' => $duration]);
        $this->dispatch('toast-timer', ['id' => $id, 'duration' => $duration]);
    }

    public function removeToast($id)
    {
        $this->toasts = array_filter($this->toasts, fn($toast) => $toast['id'] !== $id);
    }

    public function render()
    {
        return view('livewire.toast');
    }
}
