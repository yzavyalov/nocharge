<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create payment
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex flex-col space-y-4">
                <!-- Блок с компаниями -->


                <!-- Блок с текстом и QR-кодом -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8 relative">
                    <h2 class="text-center font-bold text-xl mb-4">
                        We accept funds through USDT or Ethereum.
                    </h2>

                    <div class="text-center">
                        @if($count == 0)
                            You may utilize all the features of the system for a month after entering a minimum of 100 client emails into the system. These are customers who have requested a refund or filed a chargeback request with the bank.
                        @elseif($count == 1)
                            To facilitate your participation in the system, it is required that you transfer funds to the wallet <strong>{{env('USDT_NUMBER')}} - 300USD</strong>.<br> From this point forward, you will gain access to all the functionalities of the system for a duration of 5 days. Within this 5-day period, kindly proceed to make the payment and press the confirmation button within your company's dashboard.
                        @elseif($count == 3)
                            To facilitate your participation in the system, it is required that you transfer funds to the wallet <strong>{{env('USDT_NUMBER')}} - 850USD</strong>.<br> From this point forward, you will gain access to all the functionalities of the system for a duration of 5 days. Within this 5-day period, kindly proceed to make the payment and press the confirmation button within your company's dashboard.
                        @elseif($count == 12)
                            To facilitate your participation in the system, it is required that you transfer funds to the wallet <strong>{{env('USDT_NUMBER')}} - 3000USD</strong>.<br> From this point forward, you will gain access to all the functionalities of the system for a duration of 5 days. Within this 5-day period, kindly proceed to make the payment and press the confirmation button within your company's dashboard.
                        @endif
                    </div>

                    <div class="text-center mt-4">
                        <img src="{{ asset('img/USDTwallet.png') }}" alt="usdt-wallet" style="width: 150px;" class="mx-auto">
                    </div>

                    <div class="text-center mt-4">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='{{ route('save-payment',$count) }}'">
                            To Company's Cabinet
                        </button>
                    </div>

                </div>

            </div>

        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var usdtNumber = document.getElementById('usdtNumber');

            usdtNumber.addEventListener('click', function () {
                // Создаем элемент для временного хранения значения
                var tempInput = document.createElement('input');
                tempInput.value = '{{ env('USDT_NUMBER') }}';

                // Добавляем элемент в DOM и выделяем его содержимое
                document.body.appendChild(tempInput);
                tempInput.select();

                // Копируем значение в буфер обмена
                document.execCommand('copy');

                // Удаляем временный элемент
                document.body.removeChild(tempInput);

                // Визуальное подтверждение для пользователя (можете изменить на свой стиль)
                alert('Value copied to clipboard: {{ env('USDT_NUMBER') }}');
            });
        });
    </script>

</x-app-layout>
