<?php

namespace App\Http\Livewire\Content;

use App\Models\Content;
use Illuminate\Support\Facades\Storage;
use Livewire\{Component, WithFileUploads};

class Edit extends Component
{
    use WithFileUploads;

    public $content;
    public $body;
    public $cover;

    public $rules = [
        'content.title' => 'required',
        'content.body' => 'required|min:10',
        'content.description' => 'required',
        'content.type' => 'required',
        'cover' => 'nullable|image'
    ];

    public function mount(Content $content)
    {
        $this->content = $content;
    }

    public function editContent()
    {
        $this->validate();

        if ($this->cover) {
            Storage::disk('public')->delete('cover', 'public');
        }

        $this->content->cover = $this->cover
            ? $this->cover->store('cover', 'public')
            : $this->content->cover;


        if (!$this->content->save()) {
            session()->flash('error', 'Erro ao editar conteúdo...');
        }

        session()->flash('success', 'Conteúdo editado com sucesso!');
    }

    public function render()
    {
        return view('livewire.content.edit');
    }
}
