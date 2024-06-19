<?php

namespace App\Http\Livewire\Subscriptions;

use Livewire\Component;

class Checkout extends Component
{
    public function render()
    {
        return view('livewire.subscriptions.checkout')->layout('layouts.guest');
    }
}
