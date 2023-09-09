<div class="max-w-7xl mx-auto mt-10 py-6 px-4 sm:px-6 lg:px-8">
    <x-slot name="header">Criar Novo Conteúdo</x-slot>

    @if(session()->has('success'))
    <div class="w-full px-2 py-4 border border-green-500 bg-green-400 text-white rounded mb-10">
        {{session('success')}}
    </div>
    @endif

    <form action="" wire:submit.prevent="saveContent">

        <div class="w-full mb-5">
            <label class="block">Titulo</label>

            <input type="text" wire:model.defer="title" class="w-full @error('title') border-red-700 @enderror">

            @error('title')
            <strong class="block mt-4 text-red-700 font-bold">{{$message}}</strong>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block">Descrição</label>

            <input type="text" wire:model.defer="description"
                class="w-full @error('description') border-red-700 @enderror">

            @error('description')
            <strong class="block mt-4 text-red-700 font-bold">{{$message}}</strong>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block">Conteúdo</label>

            <textarea wire:model.defer="body" class="w-full @error('body') border-red-700 @enderror"></textarea>

            @error('body')
            <strong class="block mt-4 text-red-700 font-bold">{{$message}}</strong>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block">Tipo</label>

            <select wire:model.defer="type" class="w-full @error('type') border-red-700 @enderror">
                <option value="1">Filme</option>
                <option value="2">Serie</option>
            </select>

            @error('type')
            <strong class="block mt-4 text-red-700 font-bold">{{$message}}</strong>
            @enderror
        </div>


        <div class="mb-5 flex">
            <div class="w-1/3 flex items-center justify-center">
                <label class="block mr-5">Capa</label>

                <input type="file" wire:model.defer="cover" class="w-full @error('cover') border-red-700 @enderror">

                @error('cover')
                <strong class="block mt-4 text-red-700 font-bold">{{$message}}</strong>
                @enderror
            </div>
            <div class="w-2/3 ml-7">
                @if ($cover)
                    <img src="{{$cover->temporaryUrl()}}"  alt="Prévia da Imagem"/>                    
                @endif
            </div>
        </div>


        <button class="border border-green-500 px-5 py-2 rounded">Salvar Dados</button>

    </form>
</div>