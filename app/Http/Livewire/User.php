<?php

namespace App\Http\Livewire;

use Livewire\Component;

class User extends Component
{
    public function render()
    {
        return view('livewire.utilisateurs.index')
            ->extends('layouts.default')
            ->section('content');
    }
}
