<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reviews of those you shouldn't work with
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col space-y-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8 rounded">

                    <!-- Large Review Section -->

                        <div class="border p-4 mb-4">
                            <h3 class="text-xl font-semibold">{{ $review->name }}</h3>
                            <p>{{  \App\Enums\MiddlemanTypeEnum::toSelectArray()[$review->category] }}</p>
                            <p>{{ $review->link }}</p>
                            <p>{{ $review->text }}</p>
                            <button class="bg-blue-500 text-white p-2 rounded mt-2" onclick="toggleForm('addCommentForm')">Add Comment</button>
                            <form id="addCommentForm" method="post" action="{{ route('save-comment',$review->id) }}" style="display:none;">
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
                                <!-- Your form fields for adding comments go here -->
                                <input type="text" name="text" placeholder="Enter comment text" class="w-full mt-3">
                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mt-2">
                                    Save Comment
                                </button>
                            </form>

                            <!-- Comments Section -->
                            <div class="mt-4">
                                @if($review->comments->count() == 0)
                                    <p>No comments yet</p>
                                @else
                                    <p>Comments: {{$review->comments->count()}}</p>
                                    <ul>
                                        @foreach($review->comments as $comment)
                                            <li>
                                                {{ $comment->text }}
                                                @if($comment->partner_id == session()->get('partner_id'))
                                                    <button class="bg-blue-500 text-white p-2 rounded ml-2" onclick="window.location.href='{{ route('show-comment',$comment->id) }}'">Edit</button>
                                                    <button class="bg-red-500 text-white p-2 rounded ml-2" onclick="window.location.href='{{ route('delete-comment',$comment->id) }}'">Delete</button>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleForm(formId) {
            var form = document.getElementById(formId);
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</x-app-layout>
