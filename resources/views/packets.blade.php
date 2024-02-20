<x-app-layout>
    <!-- Остальной код не изменен -->

    <div class="d-flex flex-column gap-4">
        <div class="container">
            <div class="row">

            <!-- Block 1 -->
{{--            <div class="col-md-6">--}}
{{--                <div class="rounded-lg bg-white p-4 text-center" style="border:5px solid blue;">--}}
{{--                    <h3 class="text-lg font-semibold mb-3">Free - One Month</h3>--}}
{{--                    <p>Upload your email<br> database containing clients,<br> who have initiated chargebacks<br> or refunds on your website.</p>--}}
{{--                    <button class="btn btn-primary mt-3" onclick="window.location.href='{{ route('payment-create',0) }}'">Free 1 month</button>--}}
{{--                </div>--}}
{{--            </div>--}}

            <!-- Block 2 -->
                <div class="col-md-4">
                    <div class="rounded-lg bg-white p-4 text-center" style="border:5px solid green;">
                        <h3 class="text-lg font-semibold mb-3">300 USDT for 1 Month</h3>
                        <p>You can pay on a monthly basis.<br> Uploading your database<br> of unreliable users enables<br> all colleagues to avoid another issue.</p>
                        <button class="btn btn-success mt-3" onclick="window.location.href='{{ route('payment-create',1) }}'">Pay 1 month</button>
                    </div>
             </div>

            <!-- Block 3 -->
                <div class="col-md-4">
                    <div class="rounded-lg bg-white p-4 text-center"  style="border:5px solid orange;">
                        <h3 class="text-lg font-semibold mb-3">850 USDT for 3 Months</h3>
                        <p>If you pay for 3 months upfront,<br> you receive a benefit of 50 USDT.<br>Participation in our system<br> allows participants to save.</p>
                        <button class="btn btn-warning mt-3" onclick="window.location.href='{{ route('payment-create',3) }}'">Pay 3 months</button>
                    </div>
                </div>

            <!-- Block 4 -->
                <div class="col-md-4">
                    <div class="rounded-lg bg-white p-4 text-center" style="border:5px solid red;">
                        <h3 class="text-lg font-semibold mb-3">3000 USDT for 12 Months</h3>
                        <p>Paying for your annual participation<br> allows you to save 600 USDT upfront.<br>Participation in our system<br> allows participants to save.</p>
                        <button class="btn btn-danger mt-3" onclick="window.location.href='{{ route('payment-create',12) }}'">Pay 12 months</button>
                    </div>
                </div>
        </div>

    </div>

    <!-- Горизонтальный блок -->
    <div class="col-10 rounded-lg bg-white p-4 text-center mx-auto" style="border: 4px solid; border-image: linear-gradient(to right,
    blue 20%,  /* Синий цвет на 20% */
    blue 40%,  /* Синий цвет на 40% */
    green 40%, /* Зелёный цвет на 40% */
    green 60%, /* Зелёный цвет на 60% */
    orange 60%, /* Жёлтый цвет на 60% */
    orange 80%, /* Жёлтый цвет на 80% */
    red 80%, /* Красный цвет на 80% */
    red 100% /* Красный цвет на 100% */
) 1;">
        <p>Active participation in our program involves providing information about users who abuse refund policies, as well as details about intermediaries engaged in deception and theft of your money. This will help other participants avoid encounters with such individuals and spare you from potential issues with those flagged by other members of the system.</p>
    </div>




    <!-- Остальной код не изменен -->
</x-app-layout>
