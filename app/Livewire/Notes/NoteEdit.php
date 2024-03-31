<?php

namespace App\Livewire\Notes;

use App\Models\Note;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Edit Notes')]
class NoteEdit extends Component
{
    public Note $note;
    public $title;
    public $description;
    public $recipient;
    public $is_published;

    public function mount(Note $note)
    {
        $this->note = $note;
        $this->fill($note);

        $this->title = $note->title;
        $this->description = $note->description;
        $this->recipient = $note->recipient;
        $this->is_published = $note->is_published;
    }

    public function updateNotes()
    {
        $this->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:8',
            'recipient' => 'required|email',
            'is_published' => 'required|boolean',
        ]);

        $this->note->update([
            'title' => $this->title,
            'description' => $this->description,
            'recipient' => $this->recipient,
            'is_published' => $this->is_published,
        ]);

        return $this->redirect(route('notes.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.notes.note-edit');
    }
}
