<x-app-layout>
    <x-slot name="header">
            <div class="card text-center p-4">
                <h2 class="text-xl text-gray-800 leading-tight">
                    About our system
                </h2>
            </div>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card bg-white overflow-hidden shadow-lg rounded-lg p-4 mt-8">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{asset('img/exchange.png')}}" alt="Image Description" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <div class="text-justify">
                                    <p>
                                        Hey there! We've been in the payment systems for high-risk businesses for over 5 years now. Throughout this time, we've witnessed how folks in this industry navigate through various challenges in processing payments from customers. We've identified two interconnected issues that cost businesses a significant amount of money:
                                    </p>

                                    <p>
                                        <strong>The first problem is the "initial traffic."</strong> Payment systems are hesitant to serve customers who haven't had a successful history with their platforms. These customers are unfamiliar with the system and might file complaints with the bank, causing problems for everyone involved in the transaction. This often leads to hefty fines. However, these customers need to be served because among them are "new" clients who later interact seamlessly with the business.
                                    </p>

                                    <p>
                                        <strong>The second problem is dishonest "payment systems."</strong> Businesses generate revenue by incurring expenses on attracting traffic, customer service, and providing a full range of services. The customer has honestly paid for these services, but the money doesn't reach the recipient because there are unscrupulous intermediaries. These intermediaries may come up with various excuses to not return all or part of the money to the business, and sometimes they disappear with substantial sums.
                                    </p>

                                    <p>
                                        In light of this, we've decided to create a system that, if not entirely eliminating these problems, at least minimizes the losses from them. We've realized that the key to solving these issues lies in the hands of the businesses themselves. Establishing quality information exchange can:
                                    </p>

                                    <ul>
                                        <li>Reduce the number of encounters with customers who engage in chargebacks and refunds.</li>
                                        <li>Avoid collaboration with unreliable intermediaries in payment organization.</li>
                                        <li>Provide a "pressure lever" on intermediaries contemplating fraudulent activities and persuade them to cooperate within agreed-upon terms.</li>
                                    </ul>

                                    <p>
                                        We've built this website as an opportunity for efficient and quick interaction between systems by using a unified database. Moreover, data theft between participants is impossible because we store it only in encrypted form without the possibility of decryption.
                                    </p>

                                    <p>
                                        We invite you to become an active participant in the system, reducing your expenses and enabling your colleagues to do the same. We anticipate that soon the cumulative savings of system participants will far exceed their costs for participating in the system.
                                    </p>

                                    <p>
                                        We don't want to charge participants based on the number of transactions or have any direct impact on your turnover. You can see the cost of participation on the <b><a href="{{route('cabinet-membership')}}">"Packages" page</a></b> – it's a fixed subscription fee.
                                    </p>

                                    <p>
                                        For now, we've decided not to display our contacts to avoid unnecessary publicity, but you can always send us a message from the system's dashboard, and we'll promptly respond.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
