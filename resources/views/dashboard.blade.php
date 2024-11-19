<x-app-layout>
    <!-- Остальной код не изменен -->

    <div class="py-12">
        <div class="container">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg p-8">
                <!-- Остальной код не изменен -->

                <div class="mt-8 row">
                    <!-- Левая часть -->
                    <div class="col-md mb-4 mb-md-0">
                        <h3 class="h5 font-weight-bold mb-4">Enter Manager's Email</h3>
                        <form action="{{ route('submit-email') }}" method="post" class="d-flex flex-column flex-md-row align-items-center">
                            @csrf
                            <input type="email" name="email" class="form-control py-2 px-4 mb-2 mb-md-0 mr-md-2" placeholder="Your manager's email">
                            <button type="submit" class="btn btn-primary py-2 px-4">
                                Submit
                            </button>
                        </form>

                        @if(session('error'))
                            <div class="text-danger">{{ session('error') }}</div>
                        @endif
                    </div>

                    <!-- Правая часть -->
                    <div class="col-md d-flex justify-content-md-end">
                        <button class="btn btn-success py-2 px-4" onclick="window.location.href = '{{ route('partner-form') }}'">
                            Add company
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @livewire('input-encrypt')
    </div>
</x-app-layout>
