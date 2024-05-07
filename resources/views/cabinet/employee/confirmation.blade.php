<x-app-layout>
    <!-- Остальной код не изменен -->

    <div class="py-12">
        <div class="container">
            <div class="bg-white shadow-lg p-4">
                <!-- Остальной код не изменен -->

                <div class="mt-4">
                    <h3 class="text-lg font-semibold mb-4">{{ $message }}</h3>

                    <!-- Блок для ввода email и кнопки "Send Response" -->
                    @if($status == 1)
                        <form action="{{ route('send-claim') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="emailConfirmation">You confirm sending the request by email - {{ $email }}</label>
                                <input type="hidden" name="email" class="form-control" id="emailConfirmation" value="{{ $email }}">
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary mr-2">
                                    Send Response
                                </button>
                                <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('dashboard') }}'">
                                    Return
                                </button>
                            </div>

                        </form>

                        @if(session('error'))
                            <div class="text-danger">{{ session('error') }}</div>
                        @endif

                    @elseif($status == 2 || $status == 3)
                        <div>{{ $email }}</div>
                        <button type="submit" class="btn btn-primary mt-4" onclick="window.location.href='{{ route('dashboard') }}'">Return</button>
                    @endif

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
