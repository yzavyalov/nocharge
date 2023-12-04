<x-app-layout>
    <!-- Остальной код не изменен -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <!-- Остальной код не изменен -->

                <div class="mt-8">
                    <h3 class="text-lg font-semibold mb-4">Enter Manager's Email</h3>
                    <form action="{{ route('submit-email') }}" method="post">
                        @csrf

                        <div class="flex items-center mb-4">
                            <input type="email" name="email" class="py-2 px-4 border border-blue-500 rounded flex-grow" placeholder="Your manager's email">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href">
                                Submit
                            </button>
                        </div>
                    </form>

                    @if(session('error'))
                        <div class="text-red-500">{{ session('error') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
