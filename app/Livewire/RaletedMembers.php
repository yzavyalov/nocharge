<?php

namespace App\Livewire;

use App\Models\Badbook\BadItem;
use App\Models\Badbook\ConnectReview;
use App\Services\ReviewService;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class RaletedMembers extends Component
{
    public $search = '';
    public $showSearch = false;
    public $query = '';
    public $results = [];
    public $selectedMembers = []; // Массив для хранения выбранных элементов

    protected $rules = [
        'search' => 'string|max:150|nullable',
    ];

    public $reviewId;

    public function mount($reviewId)
    {
        $this->reviewId = $reviewId;
    }

    public function updatedQuery()
    {
        $this->results = BadItem::where('name', 'like', '%' . $this->query . '%')
            ->orWhere('text', 'like', '%' . $this->query . '%')
            ->orWhere('link', 'like', '%' . $this->query . '%')
            ->orWhere('title', 'like', '%' . $this->query . '%')
            ->orWhere('description', 'like', '%' . $this->query . '%')
            ->take(10)
            ->get();
    }

    public function selectMember($id, $name)
    {
        // Добавляем выбранного члена в массив
        $this->selectedMembers[] = [
            'id' => $id,
            'name' => $name,
        ];

        // Закрываем поиск после выбора элемента
//        $this->showSearch = false;

        // Очищаем результаты и поле поиска
        $this->query = '';
        $this->results = [];
    }

    public function minusFromList($id)
    {
        $this->selectedMembers = array_filter($this->selectedMembers, function ($member) use ($id) {
            return $member['id'] !== $id;
        });

        // Если нужно пересобрать массив с новыми индексами
        $this->selectedMembers = array_values($this->selectedMembers);
    }


    public function linkReviews()
    {
        foreach ($this->selectedMembers as $member)
        {
            ConnectReview::create([
                'main_bad_item_id' => $this->reviewId,
                'secondary_bad_item_id' => $member['id']
            ]);
        }

        $this->showSearch = false;

        $this->dispatch('linkReviews');
    }
    public function render()
    {
        return view('livewire.raleted-members');
    }

    public function items()
    {
        return ReviewService::getAllBadItems();
    }
}
