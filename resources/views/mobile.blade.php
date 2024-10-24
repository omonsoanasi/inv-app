<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlanUSDT Mobile Landing Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @media (min-width: 640px) {
            body {
                display: none; /* Hide design on larger screens */
            }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

<!-- Header Section -->
<header class="bg-white shadow-md">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <a href="#" class="text-2xl font-bold text-blue-600">PlanUSDT</a>
        <nav class="flex space-x-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">Register</a>
                @endif
            @endauth
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section class="py-12 px-6 text-center">
    <h1 class="text-4xl font-extrabold text-gray-900 leading-tight">Take Control of Your Financial Future</h1>
    <p class="text-lg text-gray-600 mt-4">We help you build your wealth with powerful financial tools.</p>
    <a href="#" class="mt-6 inline-block px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700">Get Started Today</a>
    <nav class="flex space-x-4">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">Log in</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">Register</a>
            @endif
        @endauth
    </nav>
    <div class="mt-10">
        <img src="https://source.unsplash.com/featured/?finance" alt="PlanUSDT Hero" class="w-full rounded-lg shadow-lg">
    </div>
</section>

<!-- Features Section -->
<section class="bg-white py-8 px-6">
    <h2 class="text-2xl font-bold text-center text-gray-900">How It Works</h2>
    <div class="mt-8 grid gap-8">
        <div class="text-center">
            <img src="https://source.unsplash.com/50x50/?planning" alt="Personalized Planning" class="mx-auto">
            <h3 class="text-lg font-semibold text-gray-800 mt-4">Personalized Planning</h3>
            <p class="text-gray-600 mt-2">Get tailored advice to meet your financial goals.</p>
        </div>
        <div class="text-center">
            <img src="https://source.unsplash.com/50x50/?growth" alt="Growth Potential" class="mx-auto">
            <h3 class="text-lg font-semibold text-gray-800 mt-4">Growth Potential</h3>
            <p class="text-gray-600 mt-2">Maximize your wealth with expert strategies.</p>
        </div>
        <div class="text-center">
            <img src="https://source.unsplash.com/50x50/?automation" alt="Automated Tools" class="mx-auto">
            <h3 class="text-lg font-semibold text-gray-800 mt-4">Automated Tools</h3>
            <p class="text-gray-600 mt-2">Let automation handle the heavy lifting for you.</p>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="bg-gray-50 py-8 px-6">
    <h2 class="text-2xl font-bold text-center text-gray-900">What Our Clients Say</h2>
    <div class="mt-8 grid gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p class="text-gray-600">"PlanUSDT made it easy for me to manage my investments and grow my wealth."</p>
            <p class="mt-4 font-semibold text-gray-800">John Doe</p>
            <p class="text-sm text-gray-500">Investor</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p class="text-gray-600">"Their automated tools are fantastic. I can trust that my money is in good hands."</p>
            <p class="mt-4 font-semibold text-gray-800">Jane Smith</p>
            <p class="text-sm text-gray-500">Entrepreneur</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p class="text-gray-600">"The personalized financial planning helped me stay on track towards my goals."</p>
            <p class="mt-4 font-semibold text-gray-800">David Lee</p>
            <p class="text-sm text-gray-500">Engineer</p>
        </div>
    </div>
</section>

</body>
</html>
