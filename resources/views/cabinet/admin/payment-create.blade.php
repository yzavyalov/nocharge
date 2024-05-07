<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold h4 text-dark">
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

                            <div class="text-center">
                                <div class="card bg-white shadow-xl sm:rounded-lg p-8 mt-8">
                                    <h2 class="text-center font-bold text-xl mb-4">
                                        We accept funds through USDT
                                    </h2>

                                    <div class="text-center">
                                        You have chosen to make a payment of
                                        @if($count == 1)
                                            <strong>300 USDT</strong>
                                        @elseif($count == 3)
                                            <strong>850 USDT</strong>
                                        @elseif($count == 12)
                                            <strong>3000 USDT</strong>
                                        @endif
                                        . If you have decided to proceed with this payment, please press the button <strong>"Ok, I'll pay"</strong>. Alternatively, you can confirm the payment execution in the admin's cabinet later. After making the payment, please inform our manager and provide them with the transaction hash.

                                        <div class="mt-4">
                                            <div class="row">
                                                <div class="col">
                                                    <!-- Первый кошелек TRC20 -->
                                                    <div><strong>USDT wallet TRC20 Network</strong></div>
                                                    <div>{{ env('USDT_NUMBER_TRC') }}</div>
                                                    <div>
                                                        <button class="btn btn-primary copyWalletButton" data-wallet="{{ env('USDT_NUMBER_TRC') }}">COPY TRC20 Wallet</button>
                                                        <!-- QR-код с номером кошелька TRC20 -->
                                                        <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ env('USDT_NUMBER_TRC') }}&size=200x200" alt="TRC20 Wallet QR Code" class="mt-4">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <!-- Второй кошелек ERC20 -->
                                                    <div><strong>USDT wallet ERC20 Network</strong></div>
                                                    <div>{{ env('USDT_NUMBER_ERC') }}</div>
                                                    <div>
                                                        <button class="btn btn-primary copyWalletButton" data-wallet="{{ env('USDT_NUMBER_ERC') }}">COPY ERC20 Wallet</button>
                                                        <!-- QR-код с номером кошелька ERC20 -->
                                                        <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ env('USDT_NUMBER_ERC') }}&size=200x200" alt="ERC20 Wallet QR Code" class="mt-4">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mt-4">
                                                    <!-- Кнопка я заплачу -->
                                                    <button class="btn btn-success" onclick=window.location.href='{{ route('save-payment',$count) }}'>Ok I'll pay</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
            var copyButtons = document.querySelectorAll('.copyWalletButton');

            copyButtons.forEach(function(button) {
                button.addEventListener('click', function () {
                    var walletNumber = this.getAttribute('data-wallet');
                    // Создаем элемент для временного хранения значения
                    var tempInput = document.createElement('input');
                    tempInput.value = walletNumber;

                    // Добавляем элемент в DOM и выделяем его содержимое
                    document.body.appendChild(tempInput);
                    tempInput.select();

                    try {
                        // Пытаемся скопировать значение в буфер обмена
                        document.execCommand('copy');

                        // Визуальное подтверждение для пользователя
                        alert('Wallet number copied to clipboard: ' + walletNumber);
                    } catch (err) {
                        console.error('Unable to copy to clipboard:', err);
                    } finally {
                        // Удаляем временный элемент
                        document.body.removeChild(tempInput);
                    }
                });
            });

            var payButton = document.getElementById('payButton');

            payButton.addEventListener('click', function () {
                // Здесь можете добавить дополнительный код для обработки нажатия кнопки "Ok I'll pay"
                // Например, перенаправление на страницу оплаты
            });
        });
    </script>



</x-app-layout>
