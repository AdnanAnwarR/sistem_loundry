@extends('layouts.admin')

@section('title', 'Dashboard - Fluid Ops')

@section('content')
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-8 gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Good morning, Operator.</h2>
                    <p class="text-gray-500 text-sm mt-1">System status: <span class="text-blue-600 font-medium">Fluid</span>. All stations operational.</p>
                </div>
                <button class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50 flex items-center gap-2 shadow-sm transition"><i class='bx bx-export'></i> Export Data</button>
            </div>

            <!-- Stat Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl"><i class='bx bx-receipt'></i></div>
                        <span class="text-xs font-semibold text-green-600 bg-green-50 px-2 py-1 rounded-lg">+12.5%</span>
                    </div>
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-1">TOTAL ORDERS</p>
                    <h3 class="text-2xl font-bold text-gray-800">1,482</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl"><i class='bx bx-wallet'></i></div>
                        <span class="text-xs font-semibold text-green-600 bg-green-50 px-2 py-1 rounded-lg">+8.2%</span>
                    </div>
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-1">REVENUE</p>
                    <h3 class="text-2xl font-bold text-gray-800">$24,850</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-xl bg-green-50 text-green-600 flex items-center justify-center text-xl"><i class='bx bx-user'></i></div>
                        <span class="text-xs font-semibold text-gray-500 bg-gray-50 px-2 py-1 rounded-lg">Steady</span>
                    </div>
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-1">ACTIVE CUSTOMERS</p>
                    <h3 class="text-2xl font-bold text-gray-800">892</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-xl bg-red-50 text-red-600 flex items-center justify-center text-xl"><i class='bx bx-task'></i></div>
                        <span class="text-xs font-semibold text-red-600 bg-red-50 px-2 py-1 rounded-lg">High</span>
                    </div>
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-1">PENDING TASKS</p>
                    <h3 class="text-2xl font-bold text-gray-800">14</h3>
                </div>
            </div>

            <!-- Chart Section Placeholder -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="font-bold text-gray-800">Operational Revenue</h3>
                        <p class="text-xs text-gray-400">Daily transaction volume across all services.</p>
                    </div>
                    <div class="flex border border-gray-200 rounded-lg overflow-hidden">
                        <button class="px-3 py-1 text-xs font-medium text-gray-500 hover:bg-gray-50">7D</button>
                        <button class="px-3 py-1 text-xs font-medium text-white bg-blue-600">30D</button>
                        <button class="px-3 py-1 text-xs font-medium text-gray-500 hover:bg-gray-50">YTD</button>
                    </div>
                </div>
                <div class="h-64 w-full bg-gradient-to-b from-blue-50 to-white flex items-center justify-center rounded-xl border border-dashed border-blue-200 relative">
                    <!-- Placeholder for Chart -->
                    <div class="absolute bottom-0 left-0 w-full h-1/2 flex items-end px-4">
                         <svg class="w-full h-full text-blue-400 drop-shadow-md pb-4" preserveAspectRatio="none" viewBox="0 0 100 100">
                             <path d="M0,100 C20,80 30,120 50,60 C70,0 80,90 100,20 L100,100 Z" fill="currentColor" fill-opacity="0.2" stroke="currentColor" stroke-width="2"></path>
                         </svg>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-bold text-gray-800">Recent Operational Flow</h3>
                    <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-700">View All Orders</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-xs text-gray-400 border-b border-gray-100">
                                <th class="pb-3 font-semibold uppercase">Order ID</th>
                                <th class="pb-3 font-semibold uppercase">Customer</th>
                                <th class="pb-3 font-semibold uppercase">Service</th>
                                <th class="pb-3 font-semibold uppercase">Status</th>
                                <th class="pb-3 font-semibold uppercase">Value</th>
                                <th class="pb-3 font-semibold uppercase text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-700">
                            <!-- Row 1 -->
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 font-medium text-blue-600">#94021</td>
                                <td class="py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 font-bold flex items-center justify-center text-xs">SM</div>
                                        <span class="font-medium text-gray-800">Sarah Miller</span>
                                    </div>
                                </td>
                                <td class="py-4 text-gray-500">Deluxe Dry Clean</td>
                                <td class="py-4"><span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-600 flex inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span> Processing</span></td>
                                <td class="py-4 font-medium">$124.50</td>
                                <td class="py-4 text-right"><button class="text-gray-400 hover:text-gray-800"><i class='bx bx-dots-vertical-rounded text-lg'></i></button></td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 font-medium text-blue-600">#94022</td>
                                <td class="py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-green-100 text-green-600 font-bold flex items-center justify-center text-xs">JW</div>
                                        <span class="font-medium text-gray-800">James Wilson</span>
                                    </div>
                                </td>
                                <td class="py-4 text-gray-500">Bulk Wash & Fold</td>
                                <td class="py-4"><span class="px-3 py-1 rounded-full text-xs font-medium bg-green-50 text-green-600 flex inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-green-600"></span> Ready</span></td>
                                <td class="py-4 font-medium">$45.00</td>
                                <td class="py-4 text-right"><button class="text-gray-400 hover:text-gray-800"><i class='bx bx-dots-vertical-rounded text-lg'></i></button></td>
                            </tr>
                            <!-- Row 3 -->
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-4 font-medium text-blue-600">#94023</td>
                                <td class="py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 font-bold flex items-center justify-center text-xs">EH</div>
                                        <span class="font-medium text-gray-800">Elena Hadic</span>
                                    </div>
                                </td>
                                <td class="py-4 text-gray-500">Silk Press Room</td>
                                <td class="py-4"><span class="px-3 py-1 rounded-full text-xs font-medium bg-indigo-50 text-indigo-600 flex inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-indigo-600"></span> In Transit</span></td>
                                <td class="py-4 font-medium">$280.80</td>
                                <td class="py-4 text-right"><button class="text-gray-400 hover:text-gray-800"><i class='bx bx-dots-vertical-rounded text-lg'></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
@endsection
