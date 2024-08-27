<?php

namespace App\Livewire;

use App\Models\Badbook\BadItem;
use App\Models\Badbook\ConnectReview;
use Livewire\Component;

class ChainBadItems extends Component
{
    public $mainItem;

    public $chainItems = [];

    public function mount($mainItem)
    {
        $this->mainItem = $mainItem;

        $this->chainItems(); // Вызов метода для заполнения $chainItems
    }

    public function chainItems()
    {
        $review = BadItem::query()->find($this->mainItem);

        $mainItems = $review->mainBadItem;

        $secondItems = $review->secondaryBadItem;

        $this->chainItems = $mainItems->merge($secondItems);;
    }

    public function render()
    {
        return view('livewire.chain-bad-items', ['chainItems' => $this->chainItems]);
    }
}
