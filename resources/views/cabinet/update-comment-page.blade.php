<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reviews of those you shouldn't work with
        </h2>
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
                    <input type="text" name="text" placeholder="Enter comment text" class="w-full mt-3" value="{{ $comment->text }}">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mt-2">
                        Update Comment
                    </button>
                </form>

                <!-- Comments Section -->
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
