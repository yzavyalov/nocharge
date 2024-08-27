<div>
    @if(!empty($chainItems))
        <div class="col">Related members:</div>
      @foreach($chainItems as $item)
            <div class="col-auto select-item">
                <a href="{{ route('show-review', $item->id) }}">{{ $item->name }}</a>
            </div>
      @endforeach
    @endif
</div>
