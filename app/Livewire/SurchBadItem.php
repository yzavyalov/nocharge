<?php

namespace App\Livewire;

use App\Http\Controllers\Cabinet\ReviewController;
use App\Http\Requests\ReviewSearchRequest;
use App\Models\Badbook\BadItem;
use Livewire\Component;

class SurchBadItem extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $filter = app()->make(\App\Http\Filters\BadItemsFilter::class, ['queryParams' => $this->search]);

        $query = BadItem::query();

        if (!empty($data)) {
            $query->filter($filter);
        }

        $reviews = $query->orderBy('created_at', 'desc')->get();

        return view('livewire.surch-bad-item', [
            'rewiews' =>
                Post::where('title', 'like', '%'.$this->search.'%')->get(),
        ]);
    }

}
