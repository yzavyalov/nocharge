<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create payment
        </h2>
    </x-slot>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="flex flex-col space-y-4">
                    <!-- Блок с компаниями -->

                    <!-- Блок с текстом и QR-кодом -->
                    <div class="card bg-white shadow-xl sm:rounded-lg p-8 mt-8">
                        <h2 class="text-center font-bold text-xl mb-4">
                            We accept funds through USDT or Ethereum.
                        </h2>

                        <div class="text-center">
                            @if($count == 0)
                                You may utilize all the features of the system for a month after entering a minimum of 100 client emails into the system. These are customers who have requested a refund or filed a chargeback request with the bank.
                            @elseif($count == 1)
                                To facilitate your participation in the system, it is required that you transfer funds to the wallet <strong>{{env('USDT_NUMBER')}} - 300USD</strong>.<br> From this point forward, you will gain access to all the functionalities of the system for a duration of 5 days. Within this 5-day period, kindly proceed to make the payment and press the confirmation button within your company's dashboard.
                            @elseif($count == 3)
                                To facilitate your participation in the system, it is required that you transfer funds to the wallet <strong>{{env('USDT_NUMBER')}} - 850USD</strong>.<br> From this point forward, you will gain access to all the functionalities of the system for a duration of 5 days.
                            @endif
                            <div class="mt-4">
                                <!-- Кнопка для копирования номера кошелька -->
                                <button id="copyButton" class="btn btn-primary">COPY WALLET'S NUMBER</button>
                                <button class="btn btn-success" onclick=window.location.href='{{ route('save-payment',$count) }}'>Ok I'll pay</button>
                            </div>
                            <div class="mt-4">
                                <!-- QR-код с номером кошелька -->
                                <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ env('USDT_NUMBER') }}&size=200x200" alt="QR Code" class="mt-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Кнопка "Ok I'll pay" -->


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var copyButton = document.getElementById('copyButton');

            copyButton.addEventListener('click', function () {
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

                // Визуальное подтверждение для пользователя
                alert('Value copied to clipboard: {{ env('USDT_NUMBER') }}');
            });
        });
    </script>

</x-app-layout>
