<?php

namespace App\Observers;

use App\Note;

class NoteObserver
{
    /**
     * Handle the note "updated" event.
     *
     * @param  \App\Note  $note
     * @return void
     */
    public function updated(Note $note)
    {
//        $note->project->recordActivity( 'note_updated');
    }
}
