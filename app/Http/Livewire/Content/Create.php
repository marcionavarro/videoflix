<?php

namespace App\Http\Livewire\Content;

use App\Models\Content;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $body;

    protected $rules = [
        'title' => 'required',
        'body' => 'required|min:10'
    ];

    public function saveContent()
    {
        $this->validate();

        Content::create([
            'title' => $this->title,
            'body' => $this->body
        ]);

        $this->reset('title', 'body');
        session()->flash('success', 'O Conteúdo foi salvo com sucesso');
    }

    public function render()
    {
        return view('livewire.content.create');
    }
}
