<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold h4 text-dark">
            Partner's cabinet
        </h2>
    </x-slot>


    <div class="container mx-auto px-6 lg:px-8">
        @if (session('error-activity-token'))
            <div class="bg-red-200 border-l-4 border-red-500 p-4 mb-4">
                <p class="text-red-700">{{ session('error-activity-token') }}</p>
            </div>
        @endif
        @hasrole('user-admin')
        <div class="d-flex flex-column gap-4">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg p-4 mt-4 position-relative">
                <h2 class="text-center font-weight-bold h5 mb-4">
                    Your companies:
                </h2>
                <!-- Кнопка "Add company" в правом верхнем углу блока -->
                <button class="position-absolute top-0 end-0 bg-primary text-white font-weight-bold py-2 px-4 rounded" onclick="window.location.href = '{{ route('partner-form') }}'">
                    Add company
                </button>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-left">Name of company</th>
                            <th class="text-left">Token expiration date</th>
                            <th class="text-left">Balance, USDT</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->partners as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->token->first() ? $company->token->first()->finish_date : '' }}</td>
                                <td>{{ $company->balance ? $company->balance : '0.00' }}</td>
                                <td>
                                    <button class="btn btn-success" onclick="window.location.href = '{{ route('page-partner',$company->id) }}'">
                                        SELECT
                                    </button>
                                    <button class="btn btn-danger delete" onclick="confirmDelete('{{ route('del-partner', $company->id) }}')">
                                        DELETE
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="bg-white overflow-hidden shadow-xl rounded-lg p-4 mt-8 position-relative">
                <h2 class="text-center font-weight-bold h5 mb-4">
                    Claims for approval from employees
                </h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Employee's emails</th>
                            <th>Status</th>
                            <th>Choose a company for your employee</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->claimForMe as $claim)
                            <tr>
                                <form action="{{ route('claim-succsess',$claim->id) }}" method="post">
                                    @csrf
                                    <td>{{ \Carbon\Carbon::make($claim->created_at)->format('d-m-Y') }}</td>
                                    <td>{{ $claim->owner->email }}</td>
                                    <td>
                                        @if($claim->status == 1)
                                            <span class="badge bg-primary">Created</span>
                                        @elseif($claim->status == 2)
                                            <span class="badge bg-success">Agreed</span>
                                        @else
                                            <span class="badge bg-danger">Canceled</span>
                                        @endif
                                    </td>
                                    <td>
                                        <select id="company" name="company" class="form-select">
                                            @foreach($user->partners as $company)
                                                @if($claim->owner->partners->contains($company->id))
                                                    <option value="{{ $company->id }}" selected>{{ $company->name }}</option>
                                                @else
                                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                    <input type="hidden" name="status" value="{{ $claim->status }}">
                                    <td>
                                        @if($claim->status == 2)
                                            <button type="submit" class="btn btn-outline-success">Deactivate</button>
                                        @else
                                            <button type="submit" class="btn btn-success">Activate</button>
                                        @endif
                                        <button class="btn btn-danger" onclick="confirmAction('{{ route('del-partner', $company->id) }}')">Delete</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-xl rounded-lg p-8 mt-8">
                <h2 class="text-center font-weight-bold h5 mb-4">Your payments:</h2>
                <p class="text-center">We accept cryptocurrency payments directly and, therefore, do not have payment automation.<br> If you have made a payment that you see in the table, please press the 'Confirm' button.</p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr class="text-center">
                            <th>Created at</th>
                            <th>Company</th>
                            <th>Sum</th>
                            <th>Currency</th>
                            <th>Status</th>
                            <th>Updated at</th>
                            <th></th>
                        </tr>
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
                                            <button class="btn btn-success" onclick="window.location.href = '{{ route('oncheck-payment',$payment->id) }}'">CONFIRM</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @endhasrole
        </div>
    </div>
    <script>
        function copyToken() {
            var tokenField = document.getElementById('token');
            tokenField.select();
            document.execCommand('copy');
        }
    </script>

    <script>
        // Функция для отображения подтверждающего сообщения
        function confirmDelete(routeUrl) {
            var confirmation = confirm("Do you really want to delete the company? All payments, tokens and users are deleted along with it.");
            if (confirmation) {
                // Если пользователь выбрал "Да", перейти по указанному маршруту
                window.location.href = routeUrl;
            } else {
                // Если пользователь выбрал "Нет" или закрыл окно, ничего не делать
                console.log("Удаление отменено.");
            }
        }
    </script>

</x-app-layout>



