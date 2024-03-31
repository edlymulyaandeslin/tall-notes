<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Notes
        </h2>
    </x-slot>

    @if ($notes->isEmpty())
        <div class="py-12">
            <div class="max-w-xl mx-auto space-y-4 text-center sm:px-6 lg:px-8">
                <p class="text-xl font-semibold">There are no notes yet.</p>
                <p class="text-sm ">Let's write your notes, share your experience with your friends.</p>
                <x-button teal label="Create note" right-icon="plus" href="{{ route('notes.create') }}" wire:navigate />
            </div>
        </div>
    @else
        <div class="py-12">
            <div class="mb-6 sm:px-6 lg:px-8">
                <x-button teal label="Create note" right-icon="plus" href="{{ route('notes.create') }}" wire:navigate />
            </div>
            <div class="grid grid-cols-3 gap-4 mx-auto sm:px-6 lg:px-8">
                @foreach ($notes as $note)
                    <x-card wire:key="{{ $note->id }}">
                        <div class="flex justify-between border-b-2">
                            <a href="{{ route('notes.edit', $note) }}"
                                class="font-bold hover:underline hover:text-blue-500" wire:navigate>
                                {{ $note->title }}
                            </a>
                            <span class="text-xs">{{ $note->created_at->diffForHumans() }}</span>
                        </div>

                        <span class="text-xs">{{ Str::limit($note->description, 50) }}</span>

                        <div class="flex items-end justify-between mt-4">
                            <div class="flex flex-col flex-between">
                                <span class="text-sm font-semibold">Penerima : {{ $note->recipient }}</span>
                                <span class="text-xs">Published : {{ $note->is_published ? 'Yes' : 'No' }}</span>
                            </div>
                            <div class="flex justify-end gap-1">
                                <x-button.circle primary icon="eye" href="{{ route('notes.show', $note) }}" />
                                <x-button.circle negative icon="trash" wire:click="delete({{ $note }})" />
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>
            <div class="sm:px-6 sm:py-3 lg:py:3 lg:px-8">
                {{ $notes->links() }}
            </div>
        </div>
    @endif

</div>
