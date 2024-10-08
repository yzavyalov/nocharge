<x-app-layout>
    <x-slot name="header">
        <div class="card-header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Reviews of those you shouldn't work with
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8 rounded">

                                <!-- Large Review Section -->
                                <div class="border p-4 mb-4">
                                    <div class="row">
                                        <div class="col-6"><img src="{{$review->image}}" alt="{{$review->title}}" style="width: 200px;"></div>
                                        <div class="col-6">@livewire('review-status',['review' => $review])</div>
                                    </div>

                                    <h3 class="text-xl font-semibold">{{ $review->name }}</h3>
                                    <p>{{  \App\Enums\MiddlemanTypeEnum::toSelectArray()[$review->category] }}</p>
                                    <p>{{ $review->link }}</p>
                                    <p>{{ $review->title }}</p>
                                    <p>{{ $review->description }}</p>
                                    <p>{{ $review->text }}</p>
                                    @livewire('chain-bad-items',['mainItem' => $review->id])
                                    @livewire('raleted-members',['reviewId' => $review->id])
                                    <button class="btn btn-primary mt-2 col-3" onclick="toggleForm('addCommentForm')">Add Comment</button>

{{--                                    <button class="btn btn-info php artisan view:clearmt-2" onclick="toggleForm('relatedParties')">Related parties</button>--}}
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
                                        <input type="text" name="text" placeholder="Enter comment text" class="form-control mt-3">
                                        <button type="submit" class="btn btn-success mt-2">Save Comment</button>
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
                                                            <button class="btn btn-primary ml-2" onclick="window.location.href='{{ route('show-comment',$comment->id) }}'">Edit</button>
                                                            <button class="btn btn-danger ml-2" onclick="window.location.href='{{ route('delete-comment',$comment->id) }}'">Delete</button>
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


