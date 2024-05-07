<x-app-layout>
    <x-slot name="header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                        Reviews of those you shouldn't work with
                    </h2>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="border p-4 mb-4">
                <h3 class="text-xl font-semibold">{{ $comment->baditem->name }}</h3>
                <p>{{  \App\Enums\MiddlemanTypeEnum::toSelectArray()[$comment->baditem->category] }}</p>
                <p>{{ $comment->baditem->link }}</p>
                <p>{{ $comment->baditem->text }}</p>

                <form id="addCommentForm" method="post" action="{{ route('update-comment',$comment->id) }}">
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
                    <input type="text" name="text" placeholder="Enter comment text" class="form-control mt-3" value="{{ $comment->text }}">
                    <button type="submit" class="btn btn-warning mt-2">
                        Update Comment
                    </button>
                </form>

                <!-- Comments Section -->
            </div>
        </div>
    </div>

</x-app-layout>
