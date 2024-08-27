<form action="{{ route('search-review') }}" method="get">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="d-flex flex-wrap">
        <div class="form-group flex-grow-1 mr-2">
            <input type="text" id="searchIntermediary" name="search" class="form-control border border-gray-300 rounded-md" placeholder="Enter search criteria">
        </div>
        <div class="form-group mr-2">
            <select id="intermediaryCategory" name="category" class="form-control border border-gray-300 rounded-md" required>
                @foreach($middlemanTypes as $value => $description)
                    <option value="{{ $value }}">{{ $description }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary" type="submit">
            Search
        </button>
    </div>
</form>
