@if(!$videos)
    <h3 class="font-extrabold  text-center text-2xl">Nenhum vídeo encontrado...</h3>
@else
    @if($content->type == 2)
        <x-player-series :videos="$videos" :current="$current" :videoId="$videoId"></x-player-series>
    @else
        <x-player-single :video="$videos[0]"></x-player-single>
    @endif
@endif
