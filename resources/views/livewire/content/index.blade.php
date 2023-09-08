<div>
    {{-- @livewire('content.content', compact('content'), key($content->id)) --}}
    {{-- <livewire:content.content :content="$content" :key="$content->id"></livewire:content.content> --}}
   
    <x-slot name="header">Conteúdos Cadastrados</x-slot>

    <div class="block">
        <a href="{{ route('content.create') }}" class="text-white bg-green-600 px-4 py-2">Criar conteúdo</a>
    </div>

    @if (session()->has('success'))
        <div class="w-full px-2 py-4 border border-green-500 bg-green-400 text-white rounded">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($contents as $content)
        <livewire:content.content :content="$content" :key="$content->id"></livewire:content.content>
    @empty
    @endforelse

    {{ $contents->links() }}
</div>
