<?php

namespace App\Livewire;

use Livewire\Component;

class InputEncrypt extends Component
{
    public $email;
    public $haEmail;

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
        $this->haEmail = hash('sha256', $value);
    }
}
