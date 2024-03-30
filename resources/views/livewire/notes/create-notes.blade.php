<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;

    public function saveNote()
    {
        $this->validate([
            'noteTitle' => ['required', 'string', 'min:5'],
            'noteBody' => ['required', 'string', 'min:5'],
            'noteRecipient' => ['required', 'email'],
            'noteSendDate' => ['required', 'date'],
        ]);

        auth()
            ->user()
            ->notes()
            ->create([
                'title' => $this->noteTitle,
                'body' => $this->noteBody,
                'recepient' => $this->noteRecipient,
                'send_date' => $this->noteSendDate,
                'is_published' => true,
            ]);

        $this->redirect(route('notes.index'), navigate: true);
    }
}; ?>

<div>
    <form wire:submit.prevent='saveNote' class="space-y-3">
        <x-input wire:model='noteTitle' label='Note Title' placeholder="It's been a great day" />
        <x-textarea wire:model='noteBody' label='Your Notes' placeholder="Share all your thoughts with your friends" />
        <x-input wire:model='noteRecipient' label='Recipient' type="email" icon="user"
            placeholder="yourfriend@gmail.com" />
        <x-input wire:model='noteSendDate' label='Send Date' type="date" />
        <x-button primary type="submit" right-icon="calendar">Schedule Note</x-button>
        <x-errors />
    </form>
</div>
