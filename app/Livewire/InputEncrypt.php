<?php

namespace App\Livewire;

use Livewire\Component;

class InputEncrypt extends Component
{
    public $email;
    public $hashedEmail;

    public function submit()
    {
        // Handle the submit logic if needed
    }

    public function render()
    {
        return view('livewire.input-encrypt');
    }

    public function updatedEmail($value)
    {
        $this->hashedEmail = hash('sha256', $value);
    }
}
