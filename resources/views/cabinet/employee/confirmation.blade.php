<x-app-layout>
    <!-- Остальной код не изменен -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <!-- Остальной код не изменен -->

                <div class="mt-8">
                    <h3 class="text-lg font-semibold mb-4">{{ $message }}</h3>

                    <!-- Блок для ввода email и кнопки "Send Response" -->
                    @if($status == 1)
                        <form action="{{ route('send-claim') }}" method="post">
                            @csrf
                            <div class="flex items-start mb-4">
                                <div class="mt-4">You confirm sending the request by email - {{ $email }}</div>
                                <input type="hidden" name="email" class="py-2 px-4 border border-blue-500 rounded" value="{{ $email }}">
                            </div>
                            <div class="flex mt-4">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4">
                                    Send Response
                                </button>
                                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='{{ route('dashboard') }}'">
                                    Return
                                </button>
                            </div>

                        </form>

                        @if(session('error'))
                            <div class="text-red-500">{{ session('error') }}</div>
                        @endif

                    @elseif($status == 2 || $status == 3)
                        <div>{{ $email }}</div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-4 rounded" onclick="window.location.href='{{ route('dashboard') }}'">Return</button>
                    @endif

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
