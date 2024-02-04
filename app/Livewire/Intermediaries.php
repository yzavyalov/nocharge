<?php

namespace App\Livewire;

use App\Enums\MiddlemanTypeEnum;
use App\Models\Badbook\BadItem;
use Livewire\Component;

class Intermediaries extends Component
{
    public function render()
    {
        $middlemanTypes = MiddlemanTypeEnum::toSelectArray();

        $reviews = BadItem::latest()->take(10)->get();

        return view('livewire.intermediaries',compact('middlemanTypes','reviews'));
    }
}
