<?php

namespace App\Livewire\Notes;

use App\Models\Note;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Notes')]
class NoteIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $notes = Note::latest()->paginate(6);

        return view('livewire.notes.note-index', [
            'notes' => $notes
        ]);
    }

    public function delete(Note $note)
    {
        $note->delete();
    }
}
