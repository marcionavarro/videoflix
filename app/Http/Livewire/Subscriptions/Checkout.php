<?php

namespace App\Http\Livewire\Subscriptions;

use App\Models\User;
use Livewire\Component;

class Checkout extends Component
{
    protected $listeners = ['charge'];

    public function getUserProperty()
    {
        return  auth()->user();
    }

    public function charge($paymentMethod)
    {
        //dd($paymentMethodId);

        if (!$this->user->subscribed('default'))
            $this->user->newSubscription('default', 'price_1PVPk0HwsQpGdjKDops3bcbb')->create($paymentMethod);

        return redirect()->route('my-content.main');
    }

    public function render()
    {
        $user = User::find(1);

        return view('livewire.subscriptions.checkout')
            ->with('intent', $this->user->createSetupIntent())
            ->layout('layouts.guest');
    }
}
