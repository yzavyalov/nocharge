<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            SuperAdmin's Cabinet
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col space-y-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8">
            <!-- Payments Table -->
            <div class="border p-4 mb-4">
                <h3 class="text-xl font-semibold">Payments</h3>
                <!-- Your payments table goes here -->
                <!-- Example: -->
                <table class="text-center w-full">
                    <!-- Payment rows with CONFIRM button -->
                    <thead>
                        <tr>
                            <th>partner_id</th>
                            <th>sum</th>
                            <th>currency</th>
                            <th>status</th>
                            <th>created_at</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->partner->name }}</td>
                            <td>{{ $payment->sum }}</td>
                            <td>{{ $payment->currency }}</td>
                            <td>{{ $paymentTypes[$payment->status] }}</td>
                            <td>{{ $payment->created_at }}</td>
                            <td>
                                @if($payment->status == \App\Enums\PaymentTypeEnum::PAID)
                                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='{{ route('unpaid-payment',$payment->id) }}'">
                                        UNPAID
                                    </button>
                                @else
                                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='{{ route('paid-payment',$payment->id) }}'">
                                        CONFIRM
                                    </button>
                                @endif
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='{{ route('del-payment',$payment->id) }}'">
                                    DELETE
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <!-- Repeat for other payments -->
                </table>
                <div> {{ $payments->links() }}  </div>
            </div>
        </div>
    </div>

            <div class="flex flex-col space-y-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8">

                    <!-- Partners Table -->
                    <div class="border p-4 mb-4">
                        <h3 class="text-xl font-semibold">Partners</h3>
                        <!-- Your partners table with employee count goes here -->
                        <!-- Example: -->
                        <table>
                            <!-- Partner rows -->
                            <tr>
                                <td>Partner 1</td>
                                <td>Employee Count 1</td>
                            </tr>
                            <!-- Repeat for other partners -->
                        </table>
                    </div>
                </div>
            </div>


            <!-- Checkusers and Checks Block -->
            <div class="flex flex-col space-y-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8">

                    <div class="border p-4 mb-4">
                        <h3 class="text-xl font-semibold">Checkusers and Checks</h3>
                        <!-- Your block with checkusers and checks information goes here -->
                        <!-- Example: -->
                        <p>Checkusers: {{ $checkuserCount }}</p>
                        <p>Checks: {{ $checkCount }}</p>
                    </div>
                </div>
            </div>

            <!-- Negative Reviews and Comments Block -->
            <div class="flex flex-col space-y-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8">

                    <div class="border p-4 mb-4">
                        <h3 class="text-xl font-semibold">Negative Reviews and Comments</h3>
                        <!-- Your block with negative reviews and comments information goes here -->
                        <!-- Example: -->
                        <p>Negative Reviews: {{ $negativeReviewCount }}</p>
                        <p>Comments: {{ $commentCount }}</p>
                    </div>

                </div>
            </div>


            @livewire('input-user')

            @livewire('input-encrypt')

            @livewire('intermediaries')

        </div>
    </div>
</x-app-layout>

