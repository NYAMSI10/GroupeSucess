<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Presence extends Component
{
    public $fin, $start;

    public function editPresence($id)
    {
        $presence = \App\Models\Presence::where('user_id', $id)->first();

        $this->fin = $presence->fin;
        $this->start = $presence->start;
        $this->dispatchBrowserEvent('show-edit-student-modal');

    }
}
