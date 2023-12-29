<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Partner's cabinet
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @hasrole('user-admin')

            <div class="flex flex-col space-y-4">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8 relative">
                        <h2 class="text-center font-bold text-xl mb-4">
                            Your companies:
                        </h2>
                        <!-- Кнопка "Add company" в правом верхнем углу блока -->
                        <button class="absolute top-24 right-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href = '{{ route('partner-form') }}'">
                            Add company
                        </button>

                        <table>
                            <thead>
                            <tr>
                                <th>Name of company</th>
                            </tr>
                            <tr></tr>
                            </thead>
                            <tbody>
                            @foreach($user->partners as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td>
                                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href = '{{ route('page-partner',$company->id) }}'">
                                        SELECT
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8 relative">
                    <h2 class="text-center font-bold text-xl mb-4">
                        Claims for approval from employees
                    </h2>
                    <!-- Кнопка "Add company" в правом верхнем углу блока -->

                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Date</th>
                                <th class="py-2 px-4 border-b">Employee's emails</th>
                                <th class="py-2 px-4 border-b">Status</th>
                                <th>Choose a company for your employee</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($user->claimForMe as $claim)
                                <form action="{{ route('claim-succsess',$claim->id) }}" method="post">
                                    @csrf
                                    <tr>
                                        <td>{{ \Carbon\Carbon::make($claim->created_at)->format('d-m-Y') }}</td>
                                        <td>{{ $claim->owner->email }}</td>
                                        <td class="py-2 px-4">
                                            @if($claim->status == 1)
                                                <span class="bg-blue-200 text-blue-800 py-1 px-2 rounded-full">Created</span>
                                            @elseif($claim->status == 2)
                                                <span class="bg-green-200 text-green-800 py-1 px-2 rounded-full">Agreed</span>
                                            @else
                                                <span class="bg-red-200 text-red-800 py-1 px-2 rounded-full">Canceled</span>
                                            @endif
                                        </td>
                                        <td>
                                            <select id="company" name="company" class="rounded-full">
                                                @foreach($user->partners as $company)
                                                    @if( $claim->owner->partners->where('id',$company->id)->first() && $claim->owner->partners->where('id',$company->id)->first()->id == $company->id )
                                                        <option value="{{ $company->id }}" selected>{{ $company->name }}</option>
                                                    @else
                                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <input type="text" name="status" value="{{$claim->status}}" hidden>
                                        <td>
                                            @if($claim->status == 2)
                                                <button type="submit" class="w-32 bg-white hover:bg-green-700 text-green-500 border border-green-500 font-bold py-2 px-4 rounded">Deactivate</button>

                                            @else
                                                <button type="submit" class="w-32 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Activate</button>
                                            @endif
                                </form>
                                            <button class="w-32 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='{{route('del-claim',$claim->id)}}'">Delete</button>
                                        </td>
                                    </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8 relative">
                    <h2 class="text-center font-bold text-xl mb-4">
                        Your payments:
                    </h2>
                    <p class="text-center">We accept cryptocurrency payments directly and, therefore, do not have payment automation.</br> If you have made a payment that you see in the table, please press the 'Confirm' button.</p>
                    <!-- Кнопка "Add company" в правом верхнем углу блока -->

                    <table class="w-full">
                        <thead>
                        <tr class="text-center">
                            <th>created_at</th>
                            <th>Company</th>
                            <th>Sum</th>
                            <th>Currency</th>
                            <th>Status</th>
                            <th>updated_at</th>
                            <th></th>
                        </tr>
                        <tr></tr>
                        </thead>
                        <tbody>
                        @foreach($user->partners as $company)
                            @foreach($company->threemonthspayments as $payment)
                            <tr class="text-center">
                                <td>{{ \Carbon\Carbon::make($payment->created_at)->format('d-m-Y') }}</td>
                                <td>{{ $payment->partner->name }}</td>
                                <td>{{ $payment->sum }}</td>
                                <td>{{ $payment->currency }}</td>
                                <td>
                                    @if($payment->status == 1)
                                        TEST PERIOD
                                    @elseif($payment->status == 2)
                                        PAID
                                    @elseif($payment->status == 3)
                                        UNPAID
                                    @elseif($payment->status == 4)
                                        CHECK
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::make($payment->updated_at)->format('d-m-Y') }}</td>
                                <td>
                                    @if($payment->status == 1)
                                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href = '{{ route('oncheck-payment',$payment->id) }}'">
                                            CONFIRM
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <script>
                function copyToken() {
                    var tokenField = document.getElementById('token');
                    tokenField.select();
                    document.execCommand('copy');
                }
            </script>


            @endhasrole


        </div>
    </div>
</x-app-layout>



