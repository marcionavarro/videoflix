<?php

namespace App\Http\Livewire\Content\Video;

use App\Jobs\CreateThumbFromAvideoJob;
use App\Jobs\VideoProcessingJob;
use App\Models\Content;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Ramsey\Uuid\Uuid;

class CreateVideo extends Component
{
    use WithFileUploads;

    public $videos;
    public $content;

    protected $rules = [
        'video' => 'required|file|mimetypes:video/mp4,video/mpeg,video/x-matroska',
    ];

    public function mount(Content $content)
    {
        $this->content = $content;
    }

    public function uploadVideos()
    {
        $videoUploadedFile = $this->videos;

        foreach ($videoUploadedFile as $videoUploaded) {
            $video = [
                'name' => $videoUploaded->getClientOriginalName(),
                'video' => $videoUploaded->store('', 'videos'),
                'slug' => Str::slug($videoUploaded->getClientOriginalName()),
                'thumb' => 'image.png',
                'code' => Uuid::uuid4()
            ];
        }

        $video = $this->content->videos()->create($video);

        CreateThumbFromAvideoJob::dispatch($video);
        VideoProcessingJob::dispatch($video);

        return redirect()->route('content.video.list', $this->content);
    }

    public function render()
    {
        return view('livewire.content.video.create-video');
    }
}
