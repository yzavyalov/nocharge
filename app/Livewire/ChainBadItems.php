<?php

namespace App\Livewire;

use App\Models\Badbook\BadItem;
use Livewire\Attributes\On;
use Livewire\Component;

class ChainBadItems extends Component
{
    public $mainItem;
    public $chainItems = [];

    // Слушаем события Livewire для динамического обновления
    protected $listeners = ['refreshChainItems' => 'chainItems'];

    public function mount($mainItem)
    {
        $this->mainItem = $mainItem;
        $this->chainItems(); // Вызов метода для заполнения $chainItems
    }

    #[On('linkReviews')]
    public function chainItems()
    {
        $review = BadItem::query()->find($this->mainItem);
        $mainItems = $review->mainBadItem;
        $secondItems = $review->secondaryBadItem;

        // Объединение и обновление массива
        $this->chainItems = $mainItems->merge($secondItems);
    }

    public function render()
    {
        return view('livewire.chain-bad-items', ['chainItems' => $this->chainItems]);
    }
}

