<?php

namespace App\Livewire;

use App\Enums\CountriesEnum;
use Livewire\Component;

class CheckSunctionList extends Component
{
    public array $countries = [];

    public $persons = [];

    public function mount()
    {
        $this->countries = CountriesEnum::toSelectArray();
    }

    public function render()
    {
        return view('livewire.check-sunction-list',['countries' => $this->countries]);
    }

    public function persons()
    {

    }
}
