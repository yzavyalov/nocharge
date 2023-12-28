<x-app-layout>
    <!-- Остальной код не изменен -->

    <div class="py-12 flex flex-row space-x-4 pl-4 pr-4">
        <!-- Блок 1 -->
        <div class="flex-grow border-4 border-blue-500 rounded-lg bg-white p-8 mx-auto text-center">
            <h3 class="text-lg font-semibold mb-4">Free - One Month</h3>
            <p>Upload your email<br> database containing clients,<br> who have initiated chargebacks<br> or refunds on your website.</p>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4" onclick="window.location.href='{{ route('payment-create',0) }}'">
                Free 1 month
            </button>
        </div>

        <!-- Блок 2 -->
        <div class="flex-grow border-4 border-green-500 rounded-lg bg-white p-8 mx-auto text-center">
            <h3 class="text-lg font-semibold mb-4">300 USDT for 1 Month</h3>
            <p>You can pay on a monthly basis.<br> Uploading your database<br> of unreliable users enables<br> all colleagues to avoid another issue.</p>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4" onclick="window.location.href='{{ route('payment-create',1) }}'">
                Pay 1 month
            </button>
        </div>

        <!-- Блок 3 -->
        <div class="flex-grow border-4 border-yellow-500 rounded-lg bg-white p-8 mx-auto text-center">
            <h3 class="text-lg font-semibold mb-4">850 USDT for 3 Months</h3>
            <p>If you pay for 3 months upfront,<br> you receive a benefit of 50 USDT.<br>Participation in our system<br> allows participants to save.</p>
            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mt-4" onclick="window.location.href='{{ route('payment-create',3) }}'">
                Pay 3 months
            </button>
        </div>

        <!-- Блок 4 -->
        <div class="flex-grow border-4 border-red-500 rounded-lg bg-white p-8 mx-auto text-center">
            <h3 class="text-lg font-semibold mb-4">3000 USDT for 12 Months</h3>
            <p>Paying for your annual participation<br> allows you to save 600 USDT upfront.<br>Participation in our system<br> allows participants to save.</p>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4" onclick="window.location.href='{{ route('payment-create',12) }}'">
                Pay 4 months
            </button>
        </div>
    </div>

    <!-- Горизонтальный блок -->
    <div class="flex border-t-4 border-blue-500 border-r-4 border-green-500 border-b-4 border-yellow-500 border-l-4 rounded-lg bg-white p-8 mx-auto text-center ml-4 mr-4">
        <p>Active participation in our program involves providing information about users who abuse refund policies, as well as details about intermediaries engaged in deception and theft of your money. This will help other participants avoid encounters with such individuals and spare you from potential issues with those flagged by other members of the system.</p>
    </div>

    <!-- Остальной код не изменен -->
</x-app-layout>
