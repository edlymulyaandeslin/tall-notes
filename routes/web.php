<?php

use App\Livewire\Notes\NoteCreate;
use App\Livewire\Notes\NoteEdit;
use App\Livewire\Notes\NoteIndex;
use App\Livewire\Notes\NoteShow;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('notes', NoteIndex::class)->name('notes.index');
Route::get('notes/create', NoteCreate::class)->name('notes.create');
Route::get('notes/{note}/edit', NoteEdit::class)->name('notes.edit');
Route::get('notes/{note}', NoteShow::class)->name('notes.show');

require __DIR__ . '/auth.php';
