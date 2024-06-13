<x-app-layout>
    <x-slot name="header">
        <div class="card text-center p-4 bg-white shadow rounded-lg">
            <h2 class="text-2xl font-bold text-gray-800 leading-tight">
                API Documentation
            </h2>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="container mx-auto">
            <div class="bg-white shadow-md rounded-lg p-6">
                <p class="mb-4 text-gray-700">
                    The Bearer Token is your company's special key. This token will appear in your company dashboard after you've signed up.
                </p>
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse border">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2 text-left">Point</th>
                            <th class="border p-2 text-left">Method</th>
                            <th class="border p-2 text-left">Request - Example</th>
                            <th class="border p-2 text-left">Response</th>
                            <th class="border p-2 text-left">Comment</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="border p-2">{{ env('APP_URL') }}/api/upload-users</td>
                            <td class="border p-2">POST</td>
                            <td class="border p-2">
                                    <pre><code class="json">
{
    "user1": {
        "email": "test@test.com",
        "agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36",
        "platform": "example_platform"
    },
    "user2": {
        "email": "769f3adc9bd04653195dd1e92f16f753e420ee1c869c1699264c86c8282b3643"
    },
    "user3": {
        "email": "test@test.com",
        "ip": "127.0.0.5",
        "browser": "Opera"
    }
}
                                    </code></pre>
                            </td>
                            <td class="border p-2">
                                    <pre><code class="json">
{
    "message": "Users successfully saved"
}
                                    </code></pre>
                            </td>
                            <td class="border p-2">
                                This route is designed for fetching users who have initiated a refund situation in your system after receiving services. You can upload either a single user or multiple users. The mandatory field for uploading is the "email." The email value can be provided either as a regular email or in the form of an encrypted string using the SHA256 algorithm.
                            </td>
                        </tr>

                        <tr>
                            <td class="border p-2">{{ env('APP_URL') }}/api/check-user</td>
                            <td class="border p-2">POST</td>
                            <td class="border p-2">
                                    <pre><code class="json">
{
    "user": {
        "email": "8540462111@gmail.com",
        "agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36",
        "platform": "example_platform"
    }
}
                                    </code></pre>
                            </td>
                            <td class="border p-2">
                                    <pre><code class="json">
{
    "data": [
        {
            "email": "8546234@gmail.com",
            "chargeback_initiator": 0,
            "gambler": 0
        }
    ]
}
                                    </code></pre>
                            </td>
                            <td class="border p-2">
                                This endpoint is specifically designed for verifying a single user. If you need to confirm one user and obtain a quick response, you can provide the email key either as a plain email address or as a SHA256 encrypted string. The response will include the following keys:

                                "email": containing the value you provided,
                                "chargeback_initiator": with a value of 1 or 0, where 1 indicates the user is in the chargeback database and 0 indicates absence,
                                "gambler": with a value of 0 indicating the user is not in the gambler database, or 1 if the user is in the gambler database. If the value is 1, a "limit" key may also appear, specifying the user's self-imposed monthly gambling loss limit in USD.
                                Additionally, you have the option to include a "request_id" key in your query with a custom value. This value will be returned in the response to facilitate your further processing of the data.
                            </td>
                        </tr>

                        <tr>
                            <td class="border p-2">{{ env('APP_URL') }}/api/check-group-users</td>
                            <td class="border p-2">POST</td>
                            <td class="border p-2">
                                    <pre><code class="json">
{
    "user3": {
        "request_id": "dasfewfwef1233",
        "email": "f660ab912ec121d1b1e928a0bb4bc61b15f5ad44d5efdc4e1c92a25e99b8e44a",
        "agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36",
        "platform": "example_platform"
    },
    "user4": {
        "email": "06e7947cd43cc1f36dce2f6a649ab97b946b3f9642861828a0efdc269f1962c9",
        "agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36",
        "platform": "example_platform"
    }
}
                                    </code></pre>
                            </td>
                            <td class="border p-2">
                                    <pre><code class="json">
{
    "data": [
        {
            "request_id": "dasfewfwef1233",
            "email": "f660ab912ec121d1b1e928a0bb4bc61b15f5ad44d5efdc4e1c92a25e99b8e44a",
            "agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36",
            "platform": "example_platform",
            "chargeback_initiator": 1,
            "gambler": 0
        },
        {
            "email": "06e7947cd43cc1f36dce2f6a649ab97b946b3f9642861828a0efdc269f1962c9",
            "agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36",
            "platform": "example_platform",
            "chargeback_initiator": 1,
            "gambler": 0
        }
    ]
}
                                    </code></pre>
                            </td>
                            <td class="border p-2">
                                You may submit more than one user and their associated data. The only required field is the email address; all other fields are optional. In the response, each user will have "chargeback_initiator" and "gambler" keys added, with values of 1 or 0. These values indicate whether each user is present in our database. If the "gambler" key has a value of 1, an additional "limit" key may appear, reflecting the user’s self-imposed monthly gambling loss limit.
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

