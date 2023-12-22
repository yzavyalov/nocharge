<?php

namespace App\Livewire;

use App\Enums\MiddlemanTypeEnum;
use Livewire\Component;

class Intermediaries extends Component
{
    public function render()
    {
        $middlemanTypes = MiddlemanTypeEnum::toSelectArray();
        return view('livewire.intermediaries',compact('middlemanTypes'));
    }
}
