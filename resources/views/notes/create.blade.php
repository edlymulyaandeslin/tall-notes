<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Notes
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <x-button icon="arrow-left" href="{{ route('notes.index') }}" wire:navigate>All notes</x-button>
            <livewire:notes.create-notes>
        </div>
    </div>
</x-app-layout>
