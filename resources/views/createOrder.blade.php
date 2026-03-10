<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Order - LaundrySwift</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
             body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafd] flex min-h-screen">

    <aside class="w-64 bg-white border-r border-gray-100 p-6 flex flex-col justify-between">
        <div>
            <div class="flex items-center gap-3 mb-10 px-2">
                <div class="bg-[#3b82f6] p-2 rounded-lg text-white shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <div>
                    <h1 class="font-extrabold text-base text-gray-800 leading-tight">CleanWash</h1>
                    <p class="text-[10px] text-gray-400 font-medium">Laundry Service</p>
                </div>
            </div>

            <nav class="space-y-1">
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-blue-600 hover:bg-gray-50 rounded-xl transition text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    Dashboard
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 bg-blue-50 text-blue-600 rounded-xl transition font-semibold text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                   Order
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-blue-600 hover:bg-gray-50 rounded-xl transition text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Princing
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-blue-600 hover:bg-gray-50 rounded-xl transition text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Settings
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-blue-600 hover:bg-gray-50 rounded-xl transition text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Help Center
                </a>
            </nav>
        </div>

        <button class="w-full bg-[#3b82f6] text-white py-3 rounded-xl font-bold text-sm shadow-lg shadow-blue-100">
            + New Order
        </button>
    </aside>

    <main class="flex-1 p-8">
        <header class="flex justify-between items-center mb-8">
            <div class="flex items-center gap-2 text-sm text-gray-400">
                <span>Oerdeers</span>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span class="text-gray-800 font-medium">New Order</span>
            </div>
            <div class="flex items-center gap-4">
                <button class="p-2 text-gray-400 bg-white rounded-full shadow-sm border border-gray-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-width="2"/></svg>
                </div>
            </div>
        </header>

        <section class="max-w-4xl">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Create New Order</h2>
            <p class="text-gray-400 text-sm mb-10">Fill in the details below to schedule your laundry pickup.</p>

            <div class="mb-10">
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-sm">1</span>
                    <h3 class="font-bold text-gray-800">Select Service Type</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-blue-50 border-2 border-blue-500 p-6 rounded-[1.5rem] relative cursor-pointer">
                        <div class="bg-white p-2 w-10 h-10 rounded-lg shadow-sm mb-4 flex items-center justify-center text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-width="2"/></svg>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-1">Wash & Fold</h4>
                        <p class="text-xs text-gray-500 mb-4 leading-relaxed">Everyday clothes, bedding, towels.</p>
                        <p class="text-blue-600 font-bold text-sm">$2.50 / kg</p>
                    </div>

                    <div class="bg-white border border-gray-100 p-6 rounded-[1.5rem] hover:border-blue-200 transition cursor-pointer">
                        <div class="bg-gray-50 p-2 w-10 h-10 rounded-lg mb-4 flex items-center justify-center text-gray-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 7l1 4h5l-4 3 2 5-4-3-4 3 2-5-4-3h5l1-4z" stroke-width="2"/></svg>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-1">Dry Cleaning</h4>
                        <p class="text-xs text-gray-400 mb-4 leading-relaxed">Suits, dresses, delicate fabrics.</p>
                        <p class="text-gray-900 font-bold text-sm">$5.00 / item</p>
                    </div>

                    <div class="bg-white border border-gray-100 p-6 rounded-[1.5rem] hover:border-blue-200 transition cursor-pointer">
                        <div class="bg-gray-50 p-2 w-10 h-10 rounded-lg mb-4 flex items-center justify-center text-gray-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-width="2"/></svg>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-1">Iron Only</h4>
                        <p class="text-xs text-gray-400 mb-4 leading-relaxed">Professional pressing and folding.</p>
                        <p class="text-gray-900 font-bold text-sm">$1.50 / item</p>
                    </div>
                </div>
            </div>

            <div class="mb-10">
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-sm">2</span>
                    <h3 class="font-bold text-gray-800">Order Details</h3>
                </div>

                <div class="bg-white rounded-[2rem] p-8 border border-gray-50 shadow-sm flex flex-col md:flex-row gap-10">
                    <div class="flex-1 space-y-6">
                        <div>
                            <label class="text-xs font-bold text-gray-500 mb-2 block ml-1">Estimated Weight (kg)</label>
                            <div class="relative">
                                <input type="text" placeholder="0.0" class="w-full bg-gray-50 border-none rounded-2xl px-5 py-4 text-sm focus:ring-2 focus:ring-blue-100 transition">
                                <span class="absolute right-5 top-4 text-gray-400 text-sm">kg</span>
                            </div>
                            <p class="text-[10px] text-gray-300 mt-2 ml-1 italic">Final weight will be measured at our facility</p>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-500 mb-2 block ml-1">Special Instructions</label>
                            <textarea placeholder="Any stains or specific detergent preferences?" class="w-full bg-gray-50 border-none rounded-2xl px-5 py-4 text-sm focus:ring-2 focus:ring-blue-100 transition h-24 resize-none"></textarea>
                        </div>
                    </div>

                    <div class="w-full md:w-80 bg-blue-50/50 rounded-2xl p-6 border border-blue-100">
                        <h5 class="text-[10px] font-bold text-blue-600 uppercase tracking-widest mb-4">Price Breakdown</h5>
                        <div class="space-y-3 border-b border-blue-100 pb-4 mb-4">
                            <div class="flex justify-between text-xs">
                                <span class="text-gray-500">Wash & Fold (5 kg x $2.50)</span>
                                <span class="text-gray-800 font-semibold">$12.50</span>
                            </div>
                            <div class="flex justify-between text-xs">
                                <span class="text-gray-500">Pickup & Delivery</span>
                                <span class="text-green-500 font-bold uppercase">Free</span>
                            </div>
                            <div class="flex justify-between text-xs">
                                <span class="text-gray-500">Service Fee</span>
                                <span class="text-gray-800 font-semibold">$2.00</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-bold text-gray-800">Total Estimated</span>
                            <span class="text-2xl font-extrabold text-blue-600">$14.50</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end items-center gap-6 pt-4">
                <button class="text-sm font-bold text-gray-400 hover:text-gray-600 transition">Save as Draft</button>
                <button class="bg-[#3b82f6] text-white px-10 py-4 rounded-2xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 transition">
                    Schedule Pickup
                </button>
            </div>
        </section>
    </main>

</body>
</html>