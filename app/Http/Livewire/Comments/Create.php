<?php

namespace App\Http\Livewire\Comments;

use App\Models\Video;
use Livewire\Component;

class Create extends Component
{
    public $comment;
    public $video;

    protected $rules = [
        'comment' => 'required'
    ];

    public function mount(Video $video)
    {
        $this->video = $video;
    }

    public function createComment()
    {
        dd($this->video);
        $this->validate();

        $comment = [
            'user_id' => auth()->id(),
            'comment' => $this->comment,
        ];

        $this->video->comments()->create($comment);
        session()->flash('success', 'Comentário criado com sucesso!');
    }

    public function render()
    {
        return view('livewire.comments.create');
    }
}
