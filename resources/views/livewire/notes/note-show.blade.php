<div>
    <div class="flex justify-between border-b-2">
        <a href="{{ route('notes.edit', $note) }}" class="font-bold hover:underline hover:text-blue-500" wire:navigate>
            {{ $note->title }}
        </a>
        <span class="text-xs">{{ $note->created_at->diffForHumans() }}</span>
    </div>

    <span class="text-xs">{{ $note->description }}</span>

    <div class="flex items-end justify-between mt-4">
        <span class="text-sm font-semibold">Penerima : {{ $note->recipient }}</span>
        <x-button rounded red icon="heart" label="{{ $like }}" wire:click='increaseLike' />
    </div>
</div>
