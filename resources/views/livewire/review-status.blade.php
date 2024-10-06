<div class="container">
    <div class="row mb-3">
        <div class="col-md-4">
            <strong>Initiator:</strong> {{ $review->partner->name }}
        </div>
        <div class="col-md-4">
            <strong>Status:</strong>
        </div>
        <div class="col-md-4 text-end">
            <span class="badge @if($reviewStatus == 1) bg-danger @else bg-success @endif p-2">
                @if($reviewStatus == 1) Confirmed @else Not Confirmed @endif
            </span>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <button class="btn btn-danger w-100" wire:click="addConfirm">
                Confirm Negative Review
            </button>
        </div>
        <div class="col-md-6">
            <button class="btn btn-success w-100" wire:click="antiConfirm">
                Give a Positive Mark
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Review Grades
                </button>
                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                    @foreach($review->statuses as $stat)
                        <li class="dropdown-item">
                            {{ $stat->partner->name }}: {{ $stat->grade }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

