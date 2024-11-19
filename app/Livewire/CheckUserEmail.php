<?php

namespace App\Livewire;

use App\Services\CheckUserEmailService;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CheckUserEmail extends Component
{
    public function render()
    {
        return view('livewire.check-user-email');
    }

}
