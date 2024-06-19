<div class="w-full border-b border-gray-600 text-white py-10">
    <span
        class="mb-5 block text-xs">Comentado {{ $comment->created_at->locale('pt-br')->diffForhumans()  }} por {{ $comment->user->name  }}</span>
    <p class="text-lg">{{ $comment->comment  }}</p>
</div>
