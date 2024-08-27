<div>
    <button wire:click="$toggle('showSearch')" @if(!$showSearch) class="btn btn-info col-3" @else class="btn btn-outline-info col-3" @endif>Add a related member</button>

    <div class="mt-3" @if(!$showSearch) style="display:none;" @endif>
        <input type="text" wire:model.live="query" placeholder="Search..." class="form-control">

        @if(!empty($query))
            <ul class="list-group mt-2">
                @forelse($results as $result)
                    <li class="list-group-item list-group-item-action"
                        wire:click="selectMember({{ $result->id }}, '{{ $result->name }}')"
                        style="cursor: pointer;">
                        {{ $result->name }}
                    </li>
                @empty
                    <li class="list-group-item">Nothing found</li>
                @endforelse
            </ul>
        @endif

        <!-- Выбранные элементы -->
        @if(!empty($selectedMembers))
            <div class="mt-3">
                <div class="box">
                    <h5>Selected Members:</h5>
                    @foreach($selectedMembers as $member)
                        <div class="col-auto select-item">
                            {{ $member['name'] }}
                            <button wire:click="minusFromList({{ $member['id'] }})">X</button>
                        </div>
                    @endforeach
                </div>

                <button class="btn btn-info mt-4" wire:click="linkReviews">Link reviews into a chain</button>
            </div>
        @endif
    </div>
</div>
