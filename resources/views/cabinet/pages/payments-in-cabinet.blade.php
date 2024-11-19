<x-app-layout>
    <x-slot name="header">
        <div class="card text-center p-4 mb-4">
            <h2 class="text-xl text-gray-800 leading-tight">
                Your company's payments:
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <h4>Your companies:</h4>
            @foreach($userCompanies as $company)
                <div class="card mb-3">
                    <div class="card-body">
                        <!-- Table for Company Information -->
                        <table class="table table-borderless mb-0">
                            <tbody>
                            <tr>
                                <td><strong>Company:</strong> {{ $company->name }}</td>
                                <td><strong>Balance:</strong> {{ $company->balance ? $company->balance : '0.00' }}</td>
                                <td>
                                    <strong>Token Information:</strong>
                                    @foreach($company->currentTocken as $token)
                                        <div class="text-wrap">
                                            <span>Token: {{ $token->token }}</span><br>
                                            <span>
                                                Active:
                                                @if($token->active == 1)
                                                    <span class="text-success">active</span>
                                                @else
                                                    <span class="text-danger">no active</span>
                                                @endif
                                            </span><br>
                                            <span>Finish Date: {{ $token->finish_date }}</span><br>
                                        </div>
                                        <div class="col">
                                            <form action="{{ route('token-extend',$token->id) }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <span>Check period:</span>
                                                    <select name="period">
                                                        <option value="1" selected>1</option>
                                                        <option value="3">3</option>
                                                        <option value="12">12</option>
                                                    </select>
                                                    <span>months</span>
                                                </div>
                                                <button class="btn btn-danger" type="submit">Extend token validity</button>
                                            </form>
                                        </div>
                                    @endforeach
                                </td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#payments-{{ $company->id }}">
                                        View Payments
                                    </button>
                                </td>
                                <td>
                                    <!-- Top Up Balance Button -->
                                    <button class="btn btn-success" onclick="location.href = '{{ route('payment-create',1) }}'">Top Up Balance</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <!-- Collapsible Payments Section -->
                        <div class="collapse mt-3" id="payments-{{ $company->id }}">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Currency</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($company->threemonthspayments as $payment)
                                    <tr>
                                        <td>{{ $payment->created_at }}</td>
                                        <td>{{ $payment->sum }}</td>
                                        <td>{{ $payment->currency }}</td>
                                        <td>@if($payment->status == 1)
                                                test period
                                            @elseif($payment->status == 2)
                                                paid
                                            @elseif($payment->status == 3)
                                                unpaid
                                            @else
                                                check
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

