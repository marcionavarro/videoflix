<?php

namespace App\Http\Livewire\Subscriptions;

use App\Models\User;
use Livewire\Component;

class Checkout extends Component
{
    protected $listeners = ['charge'];

    public function charge($paymentMethodId)
    {
        //dd($paymentMethodId);

        $user = User::find(1);

        if(!$user->subscribed('default'))
            $user->newSubscription('default', 'price_1PTZP4HwsQpGdjKDadQ2X8sh')->create($paymentMethodId);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        $user = User::find(1);

        return view('livewire.subscriptions.checkout')
            ->with('intent', $user->createSetupIntent())
            ->layout('layouts.guest');
    }
}
