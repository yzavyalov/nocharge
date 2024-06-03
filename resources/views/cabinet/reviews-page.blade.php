<x-app-layout>
    <x-slot name="header">
        <div class="card-body">
            <h2 class="font-semibold text-xl text-center leading-tight">
                Reviews of those you shouldn't work with
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4">
                <div class="bg-white overflow-hidden shadow-xl rounded p-8 mt-8">

                    <!-- Search Form -->
                    <div class="flex flex-row justify-between items-center mb-4">
                        <form action="{{ route('search-review') }}" method="get" class="flex items-center">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <label for="search" class="sr-only">Search</label>
                            <input type="text" id="search" name="search" placeholder="Search by title" class="form-control" value="{{ old('search') }}">
                            <select name="category" id="category" class="form-control ml-2 mt-2">
                                <option value="">All</option>
                                @foreach($middlemanTypes as $value => $description)
                                    <option value="{{ $value }}" {{ old('category') == $value ? 'selected' : '' }}>{{ $description }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary ml-2 mt-2">Search</button>
                        </form>

                        <button id="addReviewBtn" class="btn btn-danger ml-2 mt-2" onclick="toggleForm('addIntermediaryForm')">Add bad intermediaries</button>
                    </div>

                    <!-- Add Intermediary Form -->
                    <form id="addIntermediaryForm" method="post" action="{{ route('save-review') }}" style="display:none;">
                        @csrf
                        <div class="mb-3">
                            <label for="intermediaryName" class="form-label">Name</label>
                            <input type="text" id="intermediaryName" name="name" class="form-control" placeholder="Enter name" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" id="link" name="link" class="form-control" placeholder="Enter link" value="{{ old('link') }}">
                        </div>
                        <div class="mb-3">
                            <label for="intermediaryCategory" class="form-label">Category</label>
                            <select id="intermediaryCategory" name="category" class="form-control" required>
                                @foreach($middlemanTypes as $value => $description)
                                    <option value="{{ $value }}" {{ old('category') == $value ? 'selected' : '' }}>{{ $description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="intermediaryReview" class="form-label">Review</label>
                            <textarea id="intermediaryReview" name="text" class="form-control" placeholder="Enter review" required>{{ old('text') }}</textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning">Save</button>
                        </div>
                    </form>

                    <!-- Table with Reviews and Comments -->
                    <div class="overflow-x-auto mt-3">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Comments</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Data from the database will be displayed here -->
                            @foreach($reviews as $review)
                                <tr>
                                    <td><a href="{{ route('show-review',$review->id) }}"><img src="{{$review->image}}" alt="{{$review->title}}" style="width: 100px;"></a></td>
                                    <td><a href="{{ route('show-review',$review->id) }}">{{ $review->name }}</a></td>
                                    <td><a href="{{ $review->link }}">{{ $review->link }}</a></td>
                                    <td>{{ \App\Enums\MiddlemanTypeEnum::toSelectArray()[$review->category] }}</td>
                                    <td>{{ $review->text }}</td>
                                    <td>
                                        @if($review->comments->count() == 0)
                                            No comments yet
                                        @else
                                            <ul>
                                                @foreach($review->twocomments as $comment)
                                                    <li>{{ $comment->text }}</li>
                                                @endforeach
                                                <li><a href="{{ route('show-review',$review->id) }}" class="text-primary">read all comments</a></li>
                                            </ul>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-info" onclick="window.location.href='{{ route('show-review',$review->id) }}'">Add comment ({{$review->comments->count()}})</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        {{ $reviews->links() }}

        </div>
    </div>

    <script>
        function toggleForm(formId) {
            var form = document.getElementById(formId);
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>

</x-app-layout>
