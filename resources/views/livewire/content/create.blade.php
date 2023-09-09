<div class="max-w-7xl mx-auto mt-10 py-6 px-4 sm:px-6 lg:px-8">
    {{-- @dump($errors) --}}

    <x-slot name="header">Criar novo conteúdo</x-slot>

    @if (session()->has('success'))
    <div class="wfull text-white my-3 p-4 border border-green-500 bg-green-400 mb-10">
        {{ session('success') }}
    </div>
    @endif

    <form action="" wire:submit.prevent='saveContent'>
        <div class="mb-5">
            <label class="block">Titulo</label>
            <input type="text" wire:model.defer='title' class="w-full @error('title') border-red-700 @enderror"/>
            @error('title')
            <strong class="block mt-2 text-red-700 font-bold">{{ $message }}</strong>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block">Conteudo</label>
            <input type="text" wire:model.defer='body' class="w-full @error('title') border-red-700 @enderror" />
            @error('body')
            <strong class="block mt-2 text-red-700 font-bold">{{ $message }}</strong>
            @enderror
        </div>

        <button class="border border-green-500 px-5 py-3 rounded">
            Enviar dados
        </button>
    </form>

</div>