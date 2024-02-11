<x-app-layout>
    <x-slot name="header">
        <div class="card-body">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Reviews of those you shouldn't work with
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col space-y-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8 rounded">

                    <!-- Search Form -->
                    <div class="w-full flex flex-row justify-between items-center">
                        <form action="{{route('search-review')}}" method="get" class="flex items-center">
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
                            <input type="text" id="search" name="search" placeholder="Search by title" class="border p-2 rounded w-80">
                            <select name="category" id="category" class="border p-2 ml-2 rounded w-80">
                                <option value="">All</option>
                                @foreach($middlemanTypes as $value => $description)
                                    <option value="{{ $value }}">{{ $description }}</option>
                                @endforeach
                                <!-- Your categories here -->
                            </select>
                            <button type="submit" class="bg-blue-500 text-white p-2 ml-2 rounded w-40">Search</button>
                        </form>

                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="toggleForm()">
                            Add bad intermediaries
                        </button>
                    </div>
                    <form id="addIntermediaryForm" method="post" action="{{ route('save-review') }}" style="display:none;">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        <div>
                            <label for="intermediaryName" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="intermediaryName" name="name" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter name" required>
                        </div>

                        <div>
                            <label for="link" class="block text-sm font-medium text-gray-700">Link</label>
                            <input type="text" id="link" name="link" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter link">
                        </div>

                        <div class="mt-4">
                            <label for="intermediaryCategory" class="block text-sm font-medium text-gray-700">Category</label>
                            <select id="intermediaryCategory" name="category" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                                @foreach($middlemanTypes as $value => $description)
                                    <option value="{{ $value }}">{{ $description }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="intermediaryReview" class="block text-sm font-medium text-gray-700">Review</label>
                            <textarea id="intermediaryReview" name="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter review" required></textarea>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Save
                            </button>
                        </div>
                    </form>

                    <!-- Table with Reviews and Comments -->
                    <table class="table-auto mt-3 w-full">
                        <thead>
                        <tr>
                            <th class="border p-2 text-left">Title</th>
                            <th class="border p-2 text-left">Link</th>
                            <th class="border p-2 text-left">Category</th>
                            <th class="border p-2 text-left">Description</th>
                            <th class="border p-2 text-left">Comments</th>
                            <th class="border p-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Data from the database will be displayed here -->
                        @foreach($reviews as $review)
                            <tr>
                                <td class="border p-2"><a href="{{ route('show-review',$review->id) }}">{{ $review->name }}</a></td>
                                <td class="border p-2"><a href="{{ $review->link }}">{{ $review->link }}</a></td>
                                <td class="border p-2">{{  \App\Enums\MiddlemanTypeEnum::toSelectArray()[$review->category] }}</td>
                                <td class="border p-2">{{ $review->text }}</td>
                                <td class="border p-2">
                                    @if($review->comments->count() == 0)
                                        <p>No comments yet</p>
                                    @else
                                        <ul>
                                            @foreach($review->twocomments as $comment)
                                                <li>{{ $comment->text }}</li>
                                            @endforeach
                                            <a href="{{ route('show-review',$review->id) }}" style="color: blue">reed all comments</a>
                                        </ul>
                                    @endif
                                    <!-- Displaying comments -->
                                </td>
                                <td class="border p-2 text-center">
                                    <!-- Button to add a comment -->
                                    <button class="bg-blue-500 text-white p-2 rounded" onclick="window.location.href='{{ route('show-review',$review->id) }}'">Add comment ({{$review->comments->count()}})</button>
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
        function toggleForm() {
            var form = document.getElementById('addIntermediaryForm');
            form.classList.toggle('hidden');
        }
    </script>

    <script>
        function toggleForm() {
            const form = document.querySelector('.hidden');
            form.classList.toggle('hidden');
        }
    </script>
    <script>
        function toggleForm(formId) {
            var form = document.getElementById(formId);
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</x-app-layout>
