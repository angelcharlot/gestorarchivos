<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Panel extends Component
{
    public $vista=0;

    public function render()
    {
        return view('livewire.panel');
    }
}
