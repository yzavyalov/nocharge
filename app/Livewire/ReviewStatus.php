<?php

namespace App\Livewire;

use App\Services\ReviewConfirmService;
use Livewire\Component;

class ReviewStatus extends Component
{
    public $review;

    public $grade;

    public function mount($review)
    {
        $this->review = $review;
    }


    public function render()
    {
        $this->review->refresh(); // Обновляем модель

        $reviewStatus = $this->review->status;

        return view('livewire.review-status',compact('reviewStatus'));
    }

    public function addConfirm()
    {
        ReviewConfirmService::addConfirm($this->review->id);
    }

    public function antiConfirm()
    {
        ReviewConfirmService::antiConfirm($this->review->id);
    }
}
