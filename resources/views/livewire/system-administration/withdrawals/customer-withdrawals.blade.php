<div class="sm:p-7 p-4">
    <div class="flex w-full items-center mb-7">
    </div>
    <table class="w-full text-left">
        <thead>
        <tr class="text-gray-400">
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">User</th>
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">Amount</th>
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">Address</th>
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">Fee</th>
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800 sm:text-gray-400 text-white">
                Date
            </th>
            <th class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-800">Action</th>
        </tr>
        </thead>
        <tbody class="text-gray-600 dark:text-gray-100">
        @foreach($customerWithdrawals as $customerWithdrawal)
            <tr class="bg-gray-200 dark:bg-gray-700' : 'bg-green-200 dark:bg-green-700">
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                    <div class="flex items-center">
                        <svg viewBox="0 0 24 24" class="w-4 mr-5 text-yellow-500" stroke="currentColor" stroke-width="3"
                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        {{ $customerWithdrawal->user->name }}
                    </div>
                </td>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                    <div class="flex items-center">
                        $ {{ number_format($customerWithdrawal->withdrawal_amount, 2) }}
                    </div>
                </td>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800 md:table-cell hidden">
                    {{ $customerWithdrawal->withdrawal_address }}
                </td>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800 md:table-cell hidden">
                    {{ $customerWithdrawal->withdrawal_fee }}
                </td>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                    <div class="flex items-center">
                        <div class="sm:flex hidden flex-col">
                            {{ \Carbon\Carbon::parse($customerWithdrawal->created_at)->format('d/m/Y') }}
                            <div class="text-gray-400 text-xs">{{ \Carbon\Carbon::parse($customerWithdrawal->created_at)->format('h:i A') }}</div>
                        </div>
                    </div>
                </td>
                <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800 md:table-cell hidden">
                    <a href="{{ route('complete-withdrawal', $customerWithdrawal->id) }}">
                        <button class="w-auto h-8 px-4 py-1 inline-flex items-center justify-center text-white ml-auto bg-blue-500 rounded-md hover:bg-blue-700 transition">
                            Complete Withdrawal
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
