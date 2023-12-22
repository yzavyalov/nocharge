<x-app-layout>
    <!-- Остальной код не изменен -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <!-- Остальной код не изменен -->

                <div class="mt-8">
                    <h3 class="text-lg font-semibold mb-4">Cabinet</h3>
                    <!-- Блок для ввода email и кнопки "Send Response" -->
                       <div>
                           <h3>Your claim:</h3>
                       </div>
                        <div>
                            <table class="min-w-full bg-white border border-gray-300">
                                <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">Date</th>
                                    <th class="py-2 px-4 border-b">Admin email</th>
                                    <th class="py-2 px-4 border-b">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->claims as $claim)
                                    <tr class="text-center">
                                        <td class="py-2 px-4">{{ \Carbon\Carbon::make($claim->created_at)->format('d-m-Y') }}</td>
                                        <td class="py-2 px-4">{{ $claim->admin->email }}</td>
                                        <td class="py-2 px-4">
                                            @if($claim->status == 1)
                                                <span class="bg-blue-200 text-blue-800 py-1 px-2 rounded-full">Created</span>
                                            @elseif($claim->status == 2)
                                                <span class="bg-green-200 text-green-800 py-1 px-2 rounded-full">Agreed</span>
                                            @else
                                                <span class="bg-red-200 text-red-800 py-1 px-2 rounded-full">Canceled</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if(session('error'))
                            <div class="text-red-500">{{ session('error') }}</div>
                        @endif
                </div>
            </div>

            @livewire('input-user')

            @livewire('input-encrypt')

            @livewire('intermediaries')

        </div>
    </div>
</x-app-layout>
