<x-guest-layout>

    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $note->title }}
        </h2>
    </div>

    <p class="mt-4">{{ $note->body }}</p>

    <div class="flex items-center justify-end mt-12 space-x-2">
        <h3 class="text-sm">Sent from {{ $user->name }}</h3>
        <livewire:heartreact :note="$note" />
    </div>
</x-guest-layout>
