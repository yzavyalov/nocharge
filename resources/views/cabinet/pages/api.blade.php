<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="col title">Api documentation</div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col space-y-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8 rounded">
                    <div>The Bearer Token – your company's special key. This token will pop up in your company dashboard after you've signed up.</div>
                    <table class="border-collapse border">
                        <thead>
                        <tr>
                            <th class="border p-2">Point</th>
                            <th class="border p-2">Method</th>
                            <th class="border p-2">Request - example</th>
                            <th class="border p-2">Response</th>
                            <th class="border p-2">Comment</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="border p-2">{{env('APP_URL')}}/api/upload-users</td>
                            <td class="border p-2">POST</td>
                            <td class="border p-2 code-cell">
                                <code>
                                    {
                                    "user1":{
                                    "email":"test@test.com",
                                    "agent":"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36",
                                    "platform":"dfsdfsdfsf"
                                    },
                                    "user2":{
                                    "email":"test@test.com",
                                    "ip":"127.0.0.5",
                                    "browser":"Opera",
                                    "agent":"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36",
                                    "platform":"dfsdfsdfsf"
                                    },
                                    "user3":{
                                    "email":"test@test.com",
                                    "ip":"127.0.0.5",
                                    "browser":"Opera"
                                    }
                                    }
                                </code>
                            </td>
                            <td class="border p-2 code-cell">
                                <code>
                                    {
                                    "message": "Users successfully saved"
                                    }
                                </code>
                            </td>
                            <td class="border p-2">
                                This route is designed for fetching users who have initiated a refund situation in your system after receiving services. You can upload either a single user or multiple users. The mandatory field for uploading is the 'email.' The email value can be provided either as a regular email or in the form of an encrypted string using the SHA256 algorithm.
                            </td>
                        </tr>

                        <tr>
                            <td class="border p-2">{{env('APP_URL')}}/api/check-user</td>
                            <td class="border p-2">POST</td>
                            <td class="border p-2 code-cell">
                                <code>
                                    {
                                    "user":{
                                    "email":"8540462111@gmail.com",
                                    "agent":"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36",
                                    "platform":"dfsdfsdfsf"
                                    }
                                    }
                                </code>
                            </td>
                            <td class="border p-2 code-cell">
                                <code>
                                    {
                                    "message": "This user is not in our base"
                                    }
                                </code>
                            </td>
                            <td class="border p-2">
                                This route is specifically for checking just one user. If you need to verify a single user and get a quick response, you can provide the email key with either the plain email or as an encrypted string using the SHA256 algorithm.
                            </td>
                        </tr>

                        <tr>
                            <td class="border p-2">{{env('APP_URL')}}/api/check-group-users</td>
                            <td class="border p-2">POST</td>
                            <td class="border p-2 code-cell">
                                <code>
                                    {
                                    "user3":{
                                    "email":"85sdfsdf40462@gmail.com",
                                    "agent":"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36",
                                    "platform":"dfsdfsdfsf"
                                    },
                                    "user4":{
                                    "email":"8540462@gmail.com",
                                    "agent":"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36",
                                    "platform":"dfsdfsdfsf"
                                    }
                                    }
                                </code>
                            </td>
                            <td class="border p-2 code-cell">
                                <code>
                                    {
                                    "coincidence": [
                                    {
                                    "email": "8540462@gmail.com",
                                    "agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36",
                                    "platform": "dfsdfsdfsf"
                                    }
                                    ],
                                    "mismatch": [
                                    {
                                    "email": "85sdfsdf40462@gmail.com",
                                    "agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36",
                                    "platform": "dfsdfsdfsf"
                                    }
                                    ]
                                    }
                                </code>
                            </td>
                            <td class="border p-2">
                                With this route, you can submit more than one user for verification. The system will check all users and present the results in two sections: 'coincidence' and 'mismatch'.
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
