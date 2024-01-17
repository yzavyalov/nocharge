<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Membership
        </h2>
    </x-slot>

    <div class="flex border-t-4 border-blue-500 border-r-4 border-green-500 border-b-4 border-yellow-500 border-l-4 rounded-lg bg-white p-8 mx-auto text-center ml-4 mr-4">
        <p>
            Our system is a hub for communication among companies engaged in online business. The success of our system directly correlates with the success of each participant because active interaction between participants brings benefits to everyone involved. We also analyze other systems focused on preventing chargeback cases and incorporate their experiences.

            Participation in our system starts at $250 per month, which is more cost-effective than hiring an employee and significantly less than the money you'll save by exchanging information with other participants.

            It's important to note that your customers' data is not shared with other participants. Before storing them in our database, we encrypt the data using the SHA256 protocol. For example, the email <strong>test@test.com</strong> in the database looks like <strong>f660ab912ec121d1b1e928a0bb4bc61b15f5ad44d5efdc4e1c92a25e99b8e44a</strong>. Most importantly, this protocol doesn't allow for reverse decryption of the data. Thus, even if someone hacks our database, they won't be able to obtain your users' emails. This operates solely in a data comparison mode.

            You can cross-reference your data with our database both through your dashboard and via requests and responses to our API.

            The system also includes a section on unscrupulous intermediaries. This information is accessible to all participants, and participants can add their comments to both their own messages and those of other system participants. This not only protects other participants from dishonest intermediaries but also gives you leverage over those intermediaries considering violating your agreements. Knowing that you can quickly spread negative information among other market participants.
        </p>
    </div>

    <div class="py-12 flex flex-row space-x-4 pl-4 pr-4">
        <!-- Блок 1 -->
        <div class="flex-grow border-4 border-blue-500 rounded-lg bg-white p-8 mx-auto text-center">
            <h3 class="text-lg font-semibold mb-4">Free - One Month</h3>
            <p>Upload your email<br> database containing clients,<br> who have initiated chargebacks<br> or refunds on your website.</p>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                Free 1 month
            </button>
        </div>

        <!-- Блок 2 -->
        <div class="flex-grow border-4 border-green-500 rounded-lg bg-white p-8 mx-auto text-center">
            <h3 class="text-lg font-semibold mb-4">300 USDT for 1 Month</h3>
            <p>You can pay on a monthly basis.<br> Uploading your database<br> of unreliable users enables<br> all colleagues to avoid another issue.</p>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">
                Pay 1 month
            </button>
        </div>

        <!-- Блок 3 -->
        <div class="flex-grow border-4 border-yellow-500 rounded-lg bg-white p-8 mx-auto text-center">
            <h3 class="text-lg font-semibold mb-4">850 USDT for 3 Months</h3>
            <p>If you pay for 3 months upfront,<br> you receive a benefit of 50 USDT.<br>Participation in our system<br> allows participants to save.</p>
            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mt-4">
                Pay 3 months
            </button>
        </div>

        <!-- Блок 4 -->
        <div class="flex-grow border-4 border-red-500 rounded-lg bg-white p-8 mx-auto text-center">
            <h3 class="text-lg font-semibold mb-4">3000 USDT for 12 Months</h3>
            <p>Paying for your annual participation<br> allows you to save 600 USDT upfront.<br>Participation in our system<br> allows participants to save.</p>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4">
                Pay 12 months
            </button>
        </div>
    </div>

    <!-- Горизонтальный блок -->
    <div class="flex border-t-4 border-blue-500 border-r-4 border-green-500 border-b-4 border-yellow-500 border-l-4 rounded-lg bg-white p-8 mx-auto text-center ml-4 mr-4">
        <p>Active participation in our program involves providing information about users who abuse refund policies, as well as details about intermediaries engaged in deception and theft of your money. This will help other participants avoid encounters with such individuals and spare you from potential issues with those flagged by other members of the system.</p>
    </div>


</x-app-layout>
