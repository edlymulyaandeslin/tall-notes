<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public Note $note;
    public $heartCount;

    public function mount(Note $note)
    {
        $this->note = $note;
        $this->heartCount = $note->heart_count;
    }

    public function HeartCount()
    {
        $this->note->heart_count++;

        $this->note->save();

        $this->heartCount = $this->note->heart_count;
    }
}; ?>

<div>
    <x-button xs wire:click="HeartCount" rose icon='heart' spinner>{{ $heartCount }}</x-button>
</div>
