<?php

namespace App\Http\Livewire;

use App\Models\Review;
use LivewireUI\Modal\ModalComponent;

class AlertDanger extends ModalComponent
{

    public $idKey;

    public function render()
    {
        return view('livewire.alert-danger');
    }
}
