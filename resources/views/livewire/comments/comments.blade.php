<div class="mt-20">
    <h3 class="block mb-20 text-white text-2xl font-extrabold">Comentários ({{ $comments->count()  }})</h3>
    @forelse($comments as $comment)
        <livewire:comments.comment :comment="$comment" :key="$comment->id" />
    @empty
        <div class="text-white text-center font-bold text-2xl">Nenhum Comentário</div>
    @endforelse
</div>
