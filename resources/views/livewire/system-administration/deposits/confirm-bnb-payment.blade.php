<!-- component -->
<div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
        <div>
            <h2 class="font-semibold text-xl text-gray-600">Is the amount in the account <span class="font-bold">$ {{ number_format($bnbDeposit->amount,2) }}?</span></h2>
            <p class="text-gray-500 mb-6">Confirm the payment for {{ $bnbDeposit->user->name }} - {{ $bnbDeposit->user->email }}.</p>

            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-600">
                        <p class="font-medium text-lg">Enter the deposited amount</p>
                        <p>to update {{ $bnbDeposit->user->name }}'s account balance .</p>
                    </div>
                    <form wire:submit="confirmBnbPayment">
                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-5">
                                    <label for="full_name">Amount Received</label>
                                    <input type="text" wire:model="confirmed_amount" id="confirmed_amount" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                                </div>

                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cofirm</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
