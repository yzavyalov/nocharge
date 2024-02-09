<x-app-layout class="text-center">
    <!-- Контактная форма -->
    @if(isset($message))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border border-success shadow-lg rounded-lg mt-5">
                        <div class="card-body">
                            <div class="bg-success border-left-4 border-success p-4 mb-4">
                                <p class="text-success">Your message was sent!</p>
                                <p class="text-success">{{ $message->subject }}</p>
                                <p class="text-success">{{ $message->text }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-lg-6">
                <form action="{{ route('send-message') }}" method="post" class="card border border-purple shadow-lg rounded-lg p-4">
                    @csrf
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <p class="text-sm mb-4">You can write your message to the system administrator, and you will receive a response at the email you provided during registration.</p>
                    <div class="mb-4">
                        <input type="text" name="subject" placeholder="Subject" class="form-control">
                    </div>
                    <div class="mb-4">
                        <textarea name="text" placeholder="Your Message" rows="6" class="form-control"></textarea>
                    </div>
                    <input name="user_id" value="{{$user->id}}" hidden>
                    <button type="submit" class="btn btn-purple btn-block">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
