<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\VideoProcessedNotification;
use App\Notifications\WhenVideoProcessingHasFailedNotification;
use \FFMpeg;
use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Video;

class VideoProcessingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $video;

    /**
     * Create a new job instance.
     *
     * @param Video $video
     */
    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $video = $this->video->video;

        $nameNewVideo = str_replace(strrchr($this->video->video, '.'), ' ', $this->video->video) . '.m3u8';

        $lowBitrateFormat = (new X264)->setKiloBitrate(500);
        $midBitrateFormat = (new X264)->setKiloBitrate(1500);
        $highBitrateFormat = (new X264)->setKiloBitrate(3000);

        FFMpeg::fromDisk('videos')
            ->open($video)
            ->exportForHLS()
            ->addFormat($lowBitrateFormat)
            ->addFormat($midBitrateFormat)
            ->addFormat($highBitrateFormat)
            ->onProgress(
                function ($progress) {
                    $this->video->update(
                        [
                            'progress' => $progress
                        ]
                    );
                }
            )
            ->toDisk('videos_processed')
            ->save($this->video->code . '/' . $nameNewVideo);

        $this->video->update(
            [
                'processed_video' => $nameNewVideo,
                'is_processed' => true
            ]
        );

        // Notificar o sucesso do processamento...
        $user = User::first(); // To-DO: Pegar os usuarios com paple ADMIN
        $user->notify(new VideoProcessedNotification($this->video));
    }

    public function failed(\Throwable $exception = null)
    {
        $user = User::first(); // To-DO: Pegar os usuarios com paple ADMIN
        $user->notify(new WhenVideoProcessingHasFailedNotification($this->video, $exception));
    }
}
