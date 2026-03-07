<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaundrySwift - Choose Your Service</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafd] text-[#1e293b]">

    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-2">
                    <div class="bg-[#3b82f6] text-white p-1.5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <span class="font-bold text-xl tracking-tight">LaundrySwift</span>
                </div>
                <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-gray-500">
                    <a href="#" class="hover:text-blue-600">Services</a>
                    <a href="#" class="hover:text-blue-600">Pricing</a>
                    <a href="#" class="hover:text-blue-600">How it Works</a>
                    <a href="#" class="hover:text-blue-600">Contact</a>
                    <a href="#" class="bg-[#3b82f6] text-white px-6 py-2.5 rounded-full hover:bg-blue-700 transition">Get Started</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto text-center mt-16 px-4">
        <h1 class="text-4xl font-extrabold text-[#0f172a] mb-4">Choose Your Service</h1>
        <p class="text-gray-500 leading-relaxed max-w-2xl mx-auto">
            Transparent pricing for every need. No hidden fees, just professional care for your clothes.
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <div class="bg-white rounded-4xl] p-8 shadow-sm hover:shadow-xl transition-shadow border border-gray-50">
            <div class="bg-blue-50 w-full aspect-square rounded-3xl flex items-center justify-center mb-8">
                <div class="bg-white p-4 rounded-full shadow-sm">
                    <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-xl font-bold mb-2">Cuci</h3>
            <p class="text-gray-400 text-sm mb-12">Professional high-speed washing and sanitizing</p>
            <div class="flex justify-between items-end">
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Starting At</span>
                <span class="text-lg font-bold text-blue-500">Rp 8.000<span class="text-gray-400 font-normal text-sm">/kg</span></span>
            </div>
        </div>

        <div class="bg-white rounded-4xl p-8 shadow-sm hover:shadow-xl transition-shadow border border-gray-50">
            <div class="bg-blue-50 w-full aspect-square rounded-3xl flex items-center justify-center mb-8 text-blue-500">
                <div class="bg-white p-4 rounded-full shadow-sm">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-xl font-bold mb-2">Setrika</h3>
            <p class="text-gray-400 text-sm mb-12">Expert ironing for crisp, wrinkle-free garments</p>
            <div class="flex justify-between items-end">
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Starting At</span>
                <span class="text-lg font-bold text-blue-500">Rp 10.000<span class="text-gray-400 font-normal text-sm">/kg</span></span>
            </div>
        </div>

        <div class="bg-white rounded-4xl p-8 shadow-sm hover:shadow-xl transition-shadow border border-gray-50">
            <div class="bg-blue-50 w-full aspect-square rounded-3xl flex items-center justify-center mb-8 text-blue-500">
                <div class="bg-white p-4 rounded-full shadow-sm">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
            </div>
            <h3 class="text-xl font-bold mb-2">Packing</h3>
            <p class="text-gray-400 text-sm mb-12">Secure, eco-friendly packaging for safe travel</p>
            <div class="flex justify-between items-end">
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Starting At</span>
                <span class="text-lg font-bold text-blue-500">Rp 5.000<span class="text-gray-400 font-normal text-sm">/kg</span></span>
            </div>
        </div>

    </div>

    <div class="max-w-7xl mx-auto px-4 pb-24">
        <div class="bg-[#e7f1ff] rounded-3xl p-6 md:p-10 flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <h2 class="text-xl font-bold mb-2">Save 20% on your first order!</h2>
                <p class="text-gray-500">Use code <span class="text-blue-600 font-bold">SWIFTNEW</span> at checkout.</p>
            </div>
            <a href="#" class="bg-[#3b82f6] text-white px-8 py-3.5 rounded-2xl font-semibold hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                Claim Offer
            </a>
        </div>
    </div>

    <footer class="pb-12 text-center">
        <div class="flex justify-center space-x-8 text-sm text-gray-400 mb-6">
            <a href="#" class="hover:text-gray-600">Privacy Policy</a>
            <a href="#" class="hover:text-gray-600">Terms of Service</a>
            <a href="#" class="hover:text-gray-600">FAQs</a>
        </div>
        <p class="text-gray-300 text-xs">© 2024 LaundrySwift. All rights reserved.</p>
    </footer>

</body>
</html>