<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlanUSDT Landing Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100">

<!-- Header Section -->
<header class="bg-white shadow-md">
    <div class="container mx-auto flex justify-between items-center py-4">
        <a href="#" class="text-xl font-bold text-gray-900">PlanUSDT</a>
        <nav class="space-x-6">
            <a href="#" class="text-gray-600 hover:text-gray-900">Products</a>
            <a href="#" class="text-gray-600 hover:text-gray-900">Learn</a>
            <a href="#" class="text-gray-600 hover:text-gray-900">Pricing</a>
            <a href="#" class="text-gray-600 hover:text-gray-900">Support</a>
        </nav>
        @if (Route::has('login'))
            <livewire:welcome.navigation />
        @endif
        <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Get Started</a>
    </div>
</header>

<!-- Hero Section -->
<section class="bg-gray-100 py-16">
    <div class="container mx-auto flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 text-center md:text-left space-y-4">
            <h1 class="text-4xl font-bold text-gray-900 leading-tight">Take control of your financial future.</h1>
            <p class="text-lg text-gray-600">We help you build your wealth with powerful financial tools.</p>
            <a href="#" class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700">
                Get Started Today
            </a>
        </div>
        <div class="md:w-1/2 mt-8 md:mt-0">
            <img src="https://source.unsplash.com/featured/?finance" alt="PlanUSDT Hero" class="w-full rounded-lg shadow-lg">
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="bg-white py-12">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center text-gray-900">How It Works</h2>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <img src="https://source.unsplash.com/50x50/?planning" alt="Feature Icon" class="mx-auto">
                <h3 class="text-xl font-semibold text-gray-800 mt-4">Personalized Planning</h3>
                <p class="text-gray-600 mt-2">Get tailored advice to meet your financial goals.</p>
            </div>
            <div class="text-center">
                <img src="https://source.unsplash.com/50x50/?growth" alt="Feature Icon" class="mx-auto">
                <h3 class="text-xl font-semibold text-gray-800 mt-4">Growth Potential</h3>
                <p class="text-gray-600 mt-2">Maximize your wealth with expert investment strategies.</p>
            </div>
            <div class="text-center">
                <img src="https://source.unsplash.com/50x50/?finance" alt="Feature Icon" class="mx-auto">
                <h3 class="text-xl font-semibold text-gray-800 mt-4">Automated Tools</h3>
                <p class="text-gray-600 mt-2">Let automation handle the heavy lifting for you.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="bg-gray-50 py-12">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center text-gray-900">What Our Clients Say</h2>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <p class="text-gray-600">"PlanUSDT made it easy for me to manage my investments and grow my wealth."</p>
                <div class="mt-4">
                    <p class="font-semibold text-gray-800">John Doe</p>
                    <p class="text-sm text-gray-500">Investor</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <p class="text-gray-600">"Their automated tools are fantastic. I can trust that my money is in good hands."</p>
                <div class="mt-4">
                    <p class="font-semibold text-gray-800">Jane Smith</p>
                    <p class="text-sm text-gray-500">Entrepreneur</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <p class="text-gray-600">"The personalized financial planning helped me stay on track towards my goals."</p>
                <div class="mt-4">
                    <p class="font-semibold text-gray-800">David Lee</p>
                    <p class="text-sm text-gray-500">Engineer</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer Section -->
<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
            <h3 class="text-lg font-semibold">PlanUSDT</h3>
            <p class="mt-4 text-gray-400">Building your future, one smart financial decision at a time.</p>
        </div>
        <div>
            <h3 class="text-lg font-semibold">Products</h3>
            <ul class="mt-4 space-y-2">
                <li><a href="#" class="text-gray-400 hover:text-white">Investing</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">Cash Account</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">Loans</a></li>
            </ul>
        </div>
        <div>
            <h3 class="text-lg font-semibold">Learn</h3>
            <ul class="mt-4 space-y-2">
                <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">Resources</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
            </ul>
        </div>
        <div>
            <h3 class="text-lg font-semibold">Follow Us</h3>
            <div class="flex space-x-4 mt-4">
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>



