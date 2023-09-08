<?php

namespace App\Http\Livewire\Content;

use App\Models\Content;
use Livewire\Component;

class Edit extends Component
{
    public $content;

    public $rules = [
        'content.title' => 'required',
        'content.body' => 'required|min:10'
    ];

    public function mount(Content $content)
    {
        $this->content = $content;
    }

    public function editContent()
    {
        $this->validate();
        
        if(!$this->content->save()){
            session()->flash('error', 'Erro ao editar conteúdo...');
        }
        
        session()->flash('success', 'Conteúdo editado com sucesso!');
    }

    public function render()
    {
        return view('livewire.content.edit');
    }
}
