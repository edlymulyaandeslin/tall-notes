<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Edit Notes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl gap-4 mx-auto sm:px-6 lg:px-8">
            <x-button flat teal label="Back to All" class="mb-4" icon="arrow-left" href="{{ route('notes.index') }}"
                wire:navigate />

            <form wire:submit.prevent='updateNotes' class="space-y-3">

                <x-input wire:model="title" label="Notes Title" placeholder="What do you think ?" />

                <x-textarea wire:model='description' right-icon="pencil" label="Your notes"
                    placeholder="Share you experience with your friends" />

                <x-input wire:model='recipient' icon="user" label="Recipient" placeholder="yourfriend@gmail.com" />

                <x-checkbox label="Is Published" wire:model="is_published" />

                <x-button type="submit" light teal label="Save" right-icon="check" />

                <x-errors />

            </form>

        </div>
    </div>
</div>
