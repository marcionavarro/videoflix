<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    {{-- @livewire('content.content', compact('content'), key($content->id)) --}}
    {{-- <livewire:content.content :content="$content" :key="$content->id"></livewire:content.content> --}}
   
    <x-slot name="header">Conteúdos Cadastrados</x-slot>

    <div class="w-full py-4 flex justify-end">
        <a href="{{ route('content.create') }}" class="btn btn-success">
            Criar conteúdo
        </a>
    </div>

    @if (session()->has('success'))
        <div class="w-full px-2 py-4 border border-green-500 bg-green-400 rounded">
            {{ session('success') }}
        </div>
    @endif

    

    @forelse ($contents as $content)
        <livewire:content.content :content="$content" :key="$content->id"></livewire:content.content>
    @empty
    @endforelse

    {{ $contents->links() }}
</div>
