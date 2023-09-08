<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

    <x-slot name="header">Editar conteúdo</x-slot>

    @if (session()->has('success'))
    <div class="wfull text-white my-3 p-4 border border-green-500 bg-green-400">
        {{ session('success') }}
    </div>
    @endif

    <form action="" wire:submit.prevent='editContent'>
        <div class="mb-5">
            <label class="block">Titulo</label>
            <input type="text" wire:model.defer='content.title' />
            @error('content.title')
            <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block">Conteudo</label>
            <input type="text" wire:model.defer='content.body' />
            @error('content.body')
            <strong>{{ $message }}</strong>
            @enderror
        </div>

        <button class="border border-green-500 px-5 py-3 rounded">
            Editar dados
        </button>
    </form>
</div>
