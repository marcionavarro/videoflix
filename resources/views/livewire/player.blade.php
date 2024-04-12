@if(!$videos)
        <div class="bg-gray-100 p-10">
            <h3 class="font-extrabold  text-center text-2xl">Nenhum vídeo encontrado...</h3>
        </div>
@else
    @if($content->type == 2)
        <x-player-series :videos="$videos" :current="$current"></x-player-series>
    @else
        <x-player-single :video="$videos[0]"></x-player-single>
    @endif
@endif
