<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $counter = 0;

    public $confirmingUserDeletion = false;

    public function confirmation()
    {                
        $this->confirmingUserDeletion = true;        
    }

    public function add()
    {
        $this->counter++;
    }

    public function minus()
    {
        if ($this->counter != 0)
            $this->counter--;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
