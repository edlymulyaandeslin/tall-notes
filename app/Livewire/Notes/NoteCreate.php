<?php

namespace App\Livewire\Notes;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Create Note')]
class NoteCreate extends Component
{
    public $title;
    public $description;
    public $recipient;

    public function saveNotes()
    {
        $this->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:8',
            'recipient' => 'required|email'
        ]);

        auth()->user()->notes()->create([
            'title' => $this->title,
            'description' => $this->description,
            'recipient' => $this->recipient,
            'is_published' => false
        ]);

        return $this->redirect(route('notes.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.notes.note-create');
    }
}
