<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HomeLiveWire extends Component
{
    public function render()
    {
        return view('livewire.home-live-wire')
        ->extends('template')
        ->section('content');

    }
}
