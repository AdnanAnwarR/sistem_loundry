<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - LaundrySwift</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f8fafd] flex min-h-screen">

    <aside class="w-64 bg-white border-r border-gray-100 p-6 flex flex-col justify-between">
        <div>
            <div class="flex items-center gap-3 mb-10 px-2">
                <div class="bg-[#3b82f6] p-2 rounded-lg text-white shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div>
                    <h1 class="font-extrabold text-base text-gray-800 leading-tight">LaundrySwift</h1>
                    <p class="text-[10px] text-gray-400 font-medium">Customer Portal</p>
                </div>
            </div>

            <nav class="space-y-1">
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 bg-blue-50 text-blue-600 rounded-xl transition font-semibold text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Dashboard
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-blue-600 hover:bg-gray-50 rounded-xl transition text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    New Order
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-blue-600 hover:bg-gray-50 rounded-xl transition text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Order History
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-gray-400 hover:text-blue-600 hover:bg-gray-50 rounded-xl transition text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Profile
                </a>
            </nav>
        </div>

        <button
            class="flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-50 rounded-xl transition text-sm font-bold border-t border-gray-100 pt-6">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            Logout
        </button>
    </aside>

    <main class="flex-1 p-10 overflow-y-auto">
        <header class="mb-10">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-1">Welcome back, Alex! 👋</h2>
            <p class="text-sm text-gray-400">Here's what's happening with your laundry today.</p>
        </header>

        <div class="grid grid-cols-12 gap-8">
            <div class="col-span-8 space-y-8">

                <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-50 relative overflow-hidden">
                    <div class="flex gap-8 items-start">
                        <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=400"
                            class="w-36 h-36 rounded-2xl object-cover shadow-sm">
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <span
                                        class="bg-blue-50 text-blue-600 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2 inline-block">Active
                                        Order</span>
                                    <h3 class="text-xl font-bold text-gray-800">Order #LS-8821</h3>
                                    <p class="text-xs text-gray-400 mt-1 font-medium">Estimated delivery: Tomorrow,
                                        10:00 AM</p>
                                </div>
                                <button
                                    class="bg-[#3b82f6] text-white px-5 py-2.5 rounded-xl font-bold text-xs shadow-md shadow-blue-100 hover:bg-blue-600 transition">View
                                    Details</button>
                            </div>

                            <div class="mt-8">
                                <div class="flex justify-between items-end mb-2">
                                    <p class="text-[11px] font-bold text-gray-800">Order Progress</p>
                                    <p class="text-[11px] font-extrabold text-blue-600">66%</p>
                                </div>
                                <div class="w-full bg-gray-100 h-2 rounded-full mb-3">
                                    <div class="bg-blue-500 h-2 rounded-full transition-all duration-1000"
                                        style="width: 66%"></div>
                                </div>
                                <div
                                    class="flex justify-between text-[10px] font-bold uppercase tracking-tighter text-gray-300">
                                    <span class="text-blue-400">Waiting</span>
                                    <span class="text-blue-400">Processing</span>
                                    <span>Delivered</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-white p-8 rounded-[2rem] border border-gray-50 shadow-sm">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="p-3 bg-green-50 text-green-500 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400">Total Spending</p>
                                <p class="text-2xl font-extrabold text-gray-800">$428.50</p>
                            </div>
                        </div>
                        <div class="w-full bg-gray-50 h-1.5 rounded-full">
                            <div class="bg-green-400 h-1.5 rounded-full w-[70%]"></div>
                        </div>
                        <p class="text-[10px] text-gray-400 mt-3 font-medium">+12% from last month</p>
                    </div>

                    <div class="bg-white p-8 rounded-[2rem] border border-gray-50 shadow-sm">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="p-3 bg-blue-50 text-blue-500 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400">Completed Orders</p>
                                <p class="text-2xl font-extrabold text-gray-800">24</p>
                            </div>
                        </div>
                        <div class="w-full bg-gray-50 h-1.5 rounded-full">
                            <div class="bg-blue-400 h-1.5 rounded-full w-[85%]"></div>
                        </div>
                        <p class="text-[10px] text-gray-400 mt-3 font-medium">All orders delivered on time</p>
                    </div>
                </div>
            </div>

            <div class="col-span-4 space-y-6">
                <div
                    class="bg-[#3b82f6] rounded-[2rem] p-8 text-white relative overflow-hidden shadow-xl shadow-blue-100 group">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16 blur-2xl group-hover:scale-150 transition-transform duration-700">
                    </div>
                    <h4 class="text-xl font-bold mb-2">Upgrade to Pro</h4>
                    <p class="text-blue-100 text-xs leading-relaxed mb-6 opacity-80">Get free express deliveries and
                        15% discount on all dry cleaning.</p>
                    <button
                        class="w-full bg-white text-blue-600 py-3.5 rounded-2xl font-bold text-sm shadow-sm hover:bg-blue-50 transition active:scale-95">Learn
                        More</button>
                </div>

                <div class="bg-white rounded-[2rem] p-8 border border-gray-50 shadow-sm">
                    <h4 class="font-extrabold text-gray-800 mb-6">Recent Activity</h4>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-800">Order #LS-8810 delivered</p>
                                <p class="text-[10px] text-gray-400 mt-1 font-medium">2 days ago</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div
                                class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 text-xs">
                                📄</div>
                            <div>
                                <p class="text-xs font-bold text-gray-800">New invoice generated</p>
                                <p class="text-[10px] text-gray-400 mt-1 font-medium">3 days ago</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div
                                class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400">
                                ⭐</div>
                            <div>
                                <p class="text-xs font-bold text-gray-800">Review submitted</p>
                                <p class="text-[10px] text-gray-400 mt-1 font-medium">1 week ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
