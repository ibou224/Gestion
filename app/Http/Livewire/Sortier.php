<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sortier extends Component
{
    public function render()
    {
        return view('livewire.sortier');
    }

    public function prod($id)
    {
        dd($id);
    }
}
