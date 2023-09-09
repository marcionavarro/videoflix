<?php

namespace App\Http\Livewire\Content;

use App\Models\Content;
use Livewire\{
    Component,
    WithFileUploads
};
use Illuminate\Support\Str;

class Create extends Component
{

    use WithFileUploads;

    public $title;
    public $body;
    public $description;
    public $type;
    public $cover;

    protected $rules = [
        'title' => 'required',
        'body' => 'required',
        'description' => 'required|min:10',
        'type' => 'required',
        'cover' => 'nullable|image'
    ];

    public function saveContent()
    {
        $this->validate();

        $image = $this->cover ? $this->cover->store('covers', 'public') : null;

        Content::create([
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
            'type' => $this->type,
            'cover' => $image,
            'slug' => Str::slug($this->title)
        ]);

        $this->reset('title', 'description', 'body', 'type', 'cover');
        session()->flash('success', 'O Conteúdo foi salvo com sucesso');
    }

    public function render()
    {
        return view('livewire.content.create');
    }
}
