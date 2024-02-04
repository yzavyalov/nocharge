<x-app-layout class="text-center">
    <!-- Контактная форма -->
    @if(isset($message))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col space-y-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8 rounded">
                    <div class="bg-green-200 border-l-4 border-green-500 p-4 mb-4">
                        <p class="text-green-700">Your message was sended!</p>
                        <p class="text-green-700">{{ $message->subject }}</p>
                        <p class="text-green-700">{{ $message->text }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="flex justify-center items-top h-1/2 mt-3">
        <form action="{{ route('send-message') }}" method="post" class="bg-white border-4 border-purple-500 p-8 rounded-lg w-192 md:w-384">
            @csrf
            <h3 class="text-lg font-semibold mb-6">Contact Us</h3>
            <p class="text-sm mb-6">You can write your message to the system administrator, and you will receive a response at the email you provided during registration.</p>
            <div class="mb-6">
                <input type="text" name="subject" placeholder="Subject" class="border-2 border-gray-400 p-3 w-full rounded">
            </div>
            <div class="mb-6">
                <textarea name="text" placeholder="Your Message" rows="6" class="border-2 border-gray-400 p-3 w-full rounded"></textarea>
            </div>
            <input name="user_id" value="{{$user->id}}" hidden>
            <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded">
                Submit
            </button>
        </form>
    </div>
</x-app-layout>
