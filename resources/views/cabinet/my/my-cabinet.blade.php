<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4 text-dark">
            SuperAdmin's Cabinet
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="bg-white shadow-sm rounded p-4 mt-4">
                        <!-- Payments Table -->
                        <div class="border-bottom pb-4 mb-4">
                            <h3 class="h5 fw-bold mb-4">Payments</h3>
                            <!-- Your payments table goes here -->
                            <!-- Example: -->
                            <table class="table table-striped">
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
                                                <button class="btn btn-success" onclick="window.location.href='{{ route('unpaid-payment',$payment->id) }}'">
                                                    UNPAID
                                                </button>
                                            @else
                                                <button class="btn btn-success" onclick="window.location.href='{{ route('paid-payment',$payment->id) }}'">
                                                    CONFIRM
                                                </button>
                                            @endif
                                            <button class="btn btn-danger" onclick="window.location.href='{{ route('del-payment',$payment->id) }}'">
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
            </div>

            <div class="row">
                <div class="col">
                    <div class="bg-white shadow-sm rounded p-4 mt-4">
                        <!-- Partners Table -->
                        <div class="border-bottom pb-4 mb-4">
                            <h3 class="h5 fw-bold mb-4">Partners - {{$partners->total()}}</h3>
                            <!-- Your partners table with employee count goes here -->
                            <!-- Example: -->
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>type</th>
                                    <th>finish date of token</th>
                                    <th>created_at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($partners as $partner)
                                    <tr>
                                        <td>{{ $partner->id }}</td>
                                        <td>{{ $partner->name }}</td>
                                        <td>{{ $partnerTypes[$partner->type] }}</td>
                                        <td>@foreach($partner->currentTocken as $token) {{ $token->finish_date }} @endforeach</td>
                                        <td>{{ $partner->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <!-- Partner rows -->

                                <!-- Repeat for other partners -->
                            </table>
                            {{ $partners->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="bg-white shadow-sm rounded p-4 mt-4">
                        <!-- Checkusers and Checks Block -->
                        <div class="border-bottom pb-4 mb-4">
                            <h3 class="h5 fw-bold mb-4">Checkusers and Checks</h3>
                            <!-- Your block with checkusers and checks information goes here -->
                            <!-- Example: -->
                            <p>Users all: {{ $usersCount }}</p>
                            <p>Users verification: {{ $userVer }}</p>
                            <p>Users not verification: {{ $userNotVer }}</p>
                            <p>Checkusers: {{ $checkuserCount }}</p>
                            <p>Checks: {{ $checkCount }}</p>
                            <button class="btn btn-dark" onclick="window.location.href='{{route('reVerification')}}'">Send a letter to unverified users</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="bg-white shadow-sm rounded p-4 mt-4">
                        <!-- Negative Reviews and Comments Block -->
                        <div class="border-bottom pb-4 mb-4">
                            <h3 class="h5 fw-bold mb-4">Negative Reviews and Comments</h3>
                            <!-- Your block with negative reviews and comments information goes here -->
                            <!-- Example: -->
                            <p>Negative Reviews: {{ $negativeReviewCount }}</p>
                            <p>Comments: {{ $commentCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @livewire('input-user')

    @livewire('input-encrypt')

    @livewire('intermediaries')

        </div>
    </div>
</x-app-layout>

