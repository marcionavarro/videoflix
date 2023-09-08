<div class="my-5">
    <div class="flex">
        {{ $content->id }}: {{ $content->title }} -
        <a href="{{ route('content.edit', $content) }}" class="px-2 py-1 border border-blue-600 rounded ml-2">
            Editar
        </a> <span class="mx-2"> | </span>
        <livewire:content.delete :content="$content"></livewire:content.delete>
    </div>
</div>