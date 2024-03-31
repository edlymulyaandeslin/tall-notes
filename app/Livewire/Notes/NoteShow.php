<?php

namespace App\Livewire\Notes;

use App\Models\Note;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Detail Notes')]
class NoteShow extends Component
{
    public Note $note;
    public $like;


    public function mount(Note $note)
    {
        $this->note = $note;
        $this->fill($note);

        $this->like = $note->like;
    }

    public function increaseLike()
    {
        $this->note->like++;
        $this->note->save();

        $this->like = $this->note->like;
    }

    public function render()
    {
        return view('livewire.notes.note-show', [
            'notes' => $this->note
        ]);
    }
}
