@extends('layouts.admin')

@section('title', 'Orders Management - Fluid Ops')

@section('content')
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-8 gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Orders Management</h2>
                    <p class="text-gray-500 text-sm mt-1">Monitor and process real-time laundry logistics and customer requests.</p>
                </div>
                <button class="px-5 py-2.5 bg-blue-600 text-white rounded-xl text-sm font-medium hover:bg-blue-700 flex items-center gap-2 shadow-sm transition"><i class='bx bx-plus'></i> New Order</button>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">PENDING ORDERS</p>
                    <div class="flex items-end gap-4">
                        <h3 class="text-3xl font-bold text-gray-800">24</h3>
                        <span class="text-xs font-semibold text-green-600 flex items-center mb-1"><i class='bx bx-trending-up mr-1'></i>+12%</span>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">IN DELIVERY</p>
                    <div class="flex items-end gap-4">
                        <h3 class="text-3xl font-bold text-gray-800">58</h3>
                        <span class="text-xs font-semibold text-gray-400 flex items-center mb-1">Stable</span>
                    </div>
                    <i class='bx bxs-truck absolute right-[-10px] bottom-[-10px] text-6xl text-gray-50 opacity-50'></i>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">COMPLETED TODAY</p>
                    <div class="flex items-end gap-4">
                        <h3 class="text-3xl font-bold text-gray-800">112</h3>
                        <span class="text-xs font-semibold text-green-600 flex items-center mb-1"><i class='bx bx-trending-up mr-1'></i>+8%</span>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">REVENUE (24H)</p>
                    <div class="flex items-end gap-4">
                        <h3 class="text-3xl font-bold text-gray-800">$3,420</h3>
                        <span class="text-xs font-semibold text-red-500 flex items-center mb-1"><i class='bx bx-trending-down mr-1'></i>-3%</span>
                    </div>
                </div>
            </div>

            <!-- Table Area -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                <!-- Toolbar -->
                <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-white">
                    <div class="flex gap-3">
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 flex items-center gap-2"><i class='bx bx-filter-alt'></i> All Statuses <i class='bx bx-chevron-down ml-2'></i></button>
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 flex items-center gap-2"><i class='bx bx-calendar'></i> Last 7 Days <i class='bx bx-chevron-down ml-2'></i></button>
                    </div>
                    <button class="px-4 py-2 text-sm font-medium text-gray-600 flex items-center gap-2 hover:bg-gray-50 rounded-lg"><i class='bx bx-sort-alt-2'></i> Sort by: Date (Newest) <i class='bx bx-chevron-down'></i></button>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[800px]">
                        <thead>
                            <tr class="text-xs text-gray-400 bg-gray-50 border-b border-gray-100">
                                <th class="py-3 px-6 font-semibold uppercase">Order ID</th>
                                <th class="py-3 px-6 font-semibold uppercase">Customer</th>
                                <th class="py-3 px-6 font-semibold uppercase">Service Type</th>
                                <th class="py-3 px-6 font-semibold uppercase">Weight (KG)</th>
                                <th class="py-3 px-6 font-semibold uppercase">Price</th>
                                <th class="py-3 px-6 font-semibold uppercase">Date</th>
                                <th class="py-3 px-6 font-semibold uppercase">Status</th>
                                <th class="py-3 px-6 font-semibold uppercase text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-700">
                            <!-- Row 1 -->
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 px-6 font-medium text-blue-600">
                                    <div class="flex flex-col">
                                        <span>#ORD-</span><span>8642</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 font-bold flex items-center justify-center text-xs">SM</div>
                                        <div class="flex flex-col">
                                            <span class="font-medium text-gray-800">Sarah Mitchell</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6"><span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-medium">Wash & Fold</span></td>
                                <td class="py-4 px-6 text-gray-500">8.5 kg</td>
                                <td class="py-4 px-6 font-medium">$42.50</td>
                                <td class="py-4 px-6 text-gray-500 text-xs">Oct 26,<br>2023</td>
                                <td class="py-4 px-6"><span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-600 border border-blue-100">PROCESSING</span></td>
                                <td class="py-4 px-6 text-right">
                                    <button class="text-gray-400 hover:text-blue-600 mr-2"><i class='bx bx-edit text-lg'></i></button>
                                    <button class="text-gray-400 hover:text-red-600"><i class='bx bx-trash text-lg'></i></button>
                                </td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 px-6 font-medium text-blue-600">
                                    <div class="flex flex-col">
                                        <span>#ORD-</span><span>8641</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-gray-100 text-gray-600 font-bold flex items-center justify-center text-xs">RK</div>
                                        <div class="flex flex-col">
                                            <span class="font-medium text-gray-800">Robert King</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6"><span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-medium">Dry Cleaning</span></td>
                                <td class="py-4 px-6 text-gray-500">1.2 kg</td>
                                <td class="py-4 px-6 font-medium">$18.00</td>
                                <td class="py-4 px-6 text-gray-500 text-xs">Oct 26,<br>2023</td>
                                <td class="py-4 px-6"><span class="px-3 py-1 rounded-full text-xs font-medium bg-green-50 text-green-600 border border-green-100">READY</span></td>
                                <td class="py-4 px-6 text-right">
                                    <button class="text-gray-400 hover:text-blue-600 mr-2"><i class='bx bx-edit text-lg'></i></button>
                                    <button class="text-gray-400 hover:text-red-600"><i class='bx bx-trash text-lg'></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-6 border-t border-gray-100 flex items-center justify-between">
                    <p class="text-sm text-gray-500">Showing 1 to 10 of 256 orders</p>
                    <div class="flex gap-1">
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:bg-gray-50"><i class='bx bx-chevron-left'></i></button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center bg-blue-600 text-white font-medium text-sm">1</button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-50 font-medium text-sm">2</button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-50 font-medium text-sm">3</button>
                        <span class="w-8 h-8 flex items-center justify-center text-gray-400">...</span>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-50 font-medium text-sm">26</button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-50"><i class='bx bx-chevron-right'></i></button>
                    </div>
                </div>
            </div>

        </div>
@endsection
