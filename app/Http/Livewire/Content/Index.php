<?php

namespace App\Http\Livewire\Content;

use App\Models\Content;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    public function render()
    {
        $contents = Content::paginate(5);
        return view('livewire.content.index', compact('contents'));
    }
}
