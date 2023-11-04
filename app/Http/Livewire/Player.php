<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Video;

class Player extends Component
{
    public $video;

    public function mount(Video $video)
    {
        $this->video = $video;
    }

    public function render()
    {
        return view('livewire.player')->layout('layouts.player-base');
    }
}
