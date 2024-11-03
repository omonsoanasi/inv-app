<section class="flex justify-center items-center bg-gray-100">
    <div class="wrapper bg-white rounded-lg shadow-lg overflow-hidden max-w-sm relative">

        <!-- Back arrow section -->
        <div class="absolute top-4 left-4">
            <button onclick="window.history.back()" class="flex items-center text-gray-600 hover:text-teal-600 transition duration-300" aria-label="Go Back">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5" viewBox="0 0 16 16">
                    <path d="M.5 3.5A.5.5 0 0 1 1 4v3.248l6.267-3.636c.52-.302 1.233.043 1.233.696v2.94l6.267-3.636c.52-.302 1.233.043 1.233.696v7.384c0 .653-.713.998-1.233.696L8.5 8.752v2.94c0 .653-.713.998-1.233.696L1 8.752V12a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5m7 1.133L1.696 8 7.5 11.367zm7.5 0L9.196 8 15 11.367z"/>
                </svg>
            </button>
        </div>

        <!-- Main content -->
        <div class="flex justify-center p-4 bg-gray-50">
            <img src="{{ asset('img/trc20qrcode.png') }}" alt="TRC20 USDT QR Code" class="h-40 w-auto" />
        </div>

        <!-- Wallet address and copy button -->
        <div class="flex items-center justify-center space-x-2 my-2">
            <span id="wallet-address" class="text-gray-800 font-bold text-sm text-center">
                TBDrVr29z7XhXxBNrfBCVWnJQvwsqPutpc
            </span>
            <input type="text" id="wallet-address-input" value="TBDrVr29z7XhXxBNrfBCVWnJQvwsqPutpc" readonly class="hidden" />
            <button onclick="copyToClipboardInput()" class="flex items-center text-teal-600 hover:text-teal-500 transition duration-300" title="Copy Address">
                Copy
            </button>
        </div>

        <!-- Description section -->
        <p class="text-sm text-gray-600 leading-relaxed text-center px-4">
            Bienvenido a la montaña de Nepal, un maravilloso lugar donde podrás escalar y respirar aire limpio. Serás acompañado por profesionales en alpinismo.
        </p>

        <!-- Rating section -->
        <div class="flex justify-center space-x-1 py-2">
            <!-- Star SVGs for rating -->
            <svg fill="currentColor" viewBox="0 0 20 20" class="h-5 text-teal-600">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            <!-- Repeat or adjust SVGs for full rating as needed -->
            <svg fill="currentColor" viewBox="0 0 20 20" class="h-5 text-gray-200">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
        </div>

        <!-- Reservation button -->
        <button class="bg-teal-600 w-full flex justify-center py-3 text-white font-semibold transition duration-300 hover:bg-teal-500">
            <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 mr-1 text-white">
                <path d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" fill-rule="evenodd"></path>
                <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path>
            </svg>
            Reservation
        </button>
    </div>
</section>

<script>
    function copyToClipboardInput() {
        const input = document.getElementById("wallet-address-input");
        input.style.display = 'block'; // Show the input field
        input.select(); // Select the input field's content
        navigator.clipboard.writeText(input.value).then(() => {
            alert("Copied to clipboard!");
            input.style.display = 'none'; // Hide the input field after copying
        }).catch(err => {
            console.error('Failed to copy text: ', err);
        });
    }
</script>

