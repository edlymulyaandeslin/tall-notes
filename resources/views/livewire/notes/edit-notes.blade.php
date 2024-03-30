<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component {
    public Note $note;

    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;
    public $notePublished;

    public function mount(Note $note)
    {
        $this->authorize('update', $note);
        $this->fill($note);
        $this->noteTitle = $note->title;
        $this->noteBody = $note->body;
        $this->noteRecipient = $note->recepient;
        $this->noteSendDate = $note->send_date;
        $this->notePublished = $note->is_published;
    }

    public function updateNote()
    {
        $this->validate([
            'noteTitle' => ['required', 'string', 'min:5'],
            'noteBody' => ['required', 'string', 'min:5'],
            'noteRecipient' => ['required', 'email'],
            'noteSendDate' => ['required', 'date'],
        ]);

        $this->note->update([
            'title' => $this->noteTitle,
            'body' => $this->noteBody,
            'recepient' => $this->noteRecipient,
            'send_date' => $this->noteSendDate,
            'is_published' => $this->notePublished,
        ]);

        $this->dispatch('notes-updated');
    }
}; ?>

<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Notes
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-4">

            <form wire:submit.prevent='updateNote' class="space-y-3">
                <x-input wire:model='noteTitle' label='Note Title' placeholder="It's been a great day" />
                <x-textarea wire:model='noteBody' label='Your Notes'
                    placeholder="Share all your thoughts with your friends" />
                <x-input wire:model='noteRecipient' label='Recipient' type="email" icon="user"
                    placeholder="yourfriend@gmail.com" />
                <x-input type="date" wire:model='noteSendDate' label='Send Date' />
                <x-checkbox wire:model='notePublished' label="Note Published" />
                <div class="flex gap-2">
                    <x-button warning type="submit">Update Note</x-button>
                    <x-button href="{{ route('notes.index') }}" negative wire:navigate>Back to notes</x-button>
                </div>
                <x-action-message class="me-3" on="notes-updated" />

                <x-errors />
            </form>
        </div>
    </div>

</div>
