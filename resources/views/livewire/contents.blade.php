<div class="max-w-7xl mx-auto mt-10 py-6 px-4 sm:px-6 lg:px-8">

    @foreach($contents->groupBy('type') as $type => $contentArr)

        <div class="w-full border-b border-white mb-10 pb-2"><strong class="text-white text-xl"> {{$type == 1 ? 'Filmes'  : 'Series'  }}</strong></div>

        <div class="w-full md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-0.5 mb-10">
            @foreach($contentArr as $content)
                <div class="lg:w-88 xl:w-96 mb-8 bg-gray-900 rounded shadow-lg hover:p-4">

                    @if($content->cover)
                        <img src="{{asset('storage/' . $content->cover)}}" alt="Capa do conteúdo: {{$content->title}}" class="mb-8 rounded-t">
                    @else
                        <img src="{{asset('images/no-photo.jpg')}}" alt="Capa do conteúdo: {{$content->title}}" class="mb-8 rounded-t">
                    @endif

                    <div class="px-4 pb-4 text-white relative h-64">

                        <p class="flex justify-end mb-5">
                            @livewire('favorite-button', ['model' => $content->id, 'type' => 'content'])
                        </p>

                        <h5 class="font-extrabold text-2xl mb-4">{{$content->title}}</h5>

                        <p class="leading-4 text-xl mb-20">{{$content->description}}</p>

                        <a href="{{route('video.player', $content)}}" class="mt-8 font-bold text-2xl block w-full text-center px-2 py-4
                                              hover:bg-white hover:text-gray-900 rounded transition duration-300 ease-in-out
                                              absolute bottom-0.5 left-0 right-0">Assistir</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach


    <div class="w-full mt-10">
        {{$contents->links()}}
    </div>
</div>
