@extends('layouts.admin')

@section('title', 'Service Catalog - Fluid Ops')

@section('content')
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-8 gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Service Catalog</h2>
                    <p class="text-gray-500 text-sm mt-1">Configure and manage your operational service offerings.</p>
                </div>
                <button class="px-5 py-2.5 bg-blue-600 text-white rounded-xl text-sm font-medium hover:bg-blue-700 flex items-center gap-2 shadow-sm transition"><i class='bx bx-plus'></i> New Service</button>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">ACTIVE SERVICES</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-bold text-blue-600">24</h3>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">AVERAGE MARGIN</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-bold text-gray-800">32%</h3>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">SERVICE CATEGORIES</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-bold text-gray-800">05</h3>
                    </div>
                </div>
            </div>

            <!-- Table Area -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[700px]">
                        <thead>
                            <tr class="text-xs text-gray-400 border-b border-gray-100">
                                <th class="py-4 px-6 font-semibold uppercase tracking-wider">Service Detail</th>
                                <th class="py-4 px-6 font-semibold uppercase tracking-wider">Category</th>
                                <th class="py-4 px-6 font-semibold uppercase tracking-wider">Base Price</th>
                                <th class="py-4 px-6 font-semibold uppercase tracking-wider">Turnaround</th>
                                <th class="py-4 px-6 font-semibold uppercase tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-700">
                            <!-- Row 1 -->
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center text-xl"><i class='bx bx-closet'></i></div>
                                        <div>
                                            <p class="font-bold text-gray-800">Premium Wash & Fold</p>
                                            <p class="text-xs text-gray-500">Everyday clean and precise folding</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-600 border border-blue-100">WASH & FOLD</span>
                                </td>
                                <td class="py-4 px-6 font-semibold text-blue-600">$1.99 <span class="text-xs text-gray-400 font-normal">/ lb</span></td>
                                <td class="py-4 px-6 text-gray-500 flex items-center gap-2"><i class='bx bx-time-five'></i> 24 Hours</td>
                                <td class="py-4 px-6 text-right">
                                    <button class="w-8 h-8 rounded-lg text-gray-400 hover:text-blue-600 hover:bg-blue-50 mr-1"><i class='bx bx-edit text-lg'></i></button>
                                    <button class="w-8 h-8 rounded-lg text-gray-400 hover:text-gray-800 hover:bg-gray-100"><i class='bx bx-menu text-lg'></i></button>
                                </td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center text-xl"><i class='bx bx-wind'></i></div>
                                        <div>
                                            <p class="font-bold text-gray-800">EcoDry Clean</p>
                                            <p class="text-xs text-gray-500">Solvent-free chemical cleaning</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-purple-50 text-purple-600 border border-purple-100">SPECIALTY</span>
                                </td>
                                <td class="py-4 px-6 font-semibold text-blue-600">$6.50 <span class="text-xs text-gray-400 font-normal">/ unit</span></td>
                                <td class="py-4 px-6 text-gray-500 flex items-center gap-2"><i class='bx bx-time-five'></i> 48 Hours</td>
                                <td class="py-4 px-6 text-right">
                                    <button class="w-8 h-8 rounded-lg text-gray-400 hover:text-blue-600 hover:bg-blue-50 mr-1"><i class='bx bx-edit text-lg'></i></button>
                                    <button class="w-8 h-8 rounded-lg text-gray-400 hover:text-gray-800 hover:bg-gray-100"><i class='bx bx-menu text-lg'></i></button>
                                </td>
                            </tr>
                            <!-- Row 3 -->
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center text-xl"><i class='bx bx-stopwatch'></i></div>
                                        <div>
                                            <p class="font-bold text-gray-800">SteamPress Only</p>
                                            <p class="text-xs text-gray-500">Professional crisp press finish</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-orange-50 text-orange-600 border border-orange-100">IRONING</span>
                                </td>
                                <td class="py-4 px-6 font-semibold text-blue-600">$3.80 <span class="text-xs text-gray-400 font-normal">/ unit</span></td>
                                <td class="py-4 px-6 text-gray-500 flex items-center gap-2"><i class='bx bx-time-five'></i> Same Day</td>
                                <td class="py-4 px-6 text-right">
                                    <button class="w-8 h-8 rounded-lg text-gray-400 hover:text-blue-600 hover:bg-blue-50 mr-1"><i class='bx bx-edit text-lg'></i></button>
                                    <button class="w-8 h-8 rounded-lg text-gray-400 hover:text-gray-800 hover:bg-gray-100"><i class='bx bx-menu text-lg'></i></button>
                                </td>
                            </tr>
                            <!-- Row 4 -->
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-lg bg-teal-50 text-teal-600 flex items-center justify-center text-xl"><i class='bx bx-bed'></i></div>
                                        <div>
                                            <p class="font-bold text-gray-800">Comforter & Bedding</p>
                                            <p class="text-xs text-gray-500">Heavy-duty large item wash</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-teal-50 text-teal-600 border border-teal-100">HEAVY ITEMS</span>
                                </td>
                                <td class="py-4 px-6 font-semibold text-blue-600">$25.00 <span class="text-xs text-gray-400 font-normal">/ load</span></td>
                                <td class="py-4 px-6 text-gray-500 flex items-center gap-2"><i class='bx bx-time-five'></i> 72 Hours</td>
                                <td class="py-4 px-6 text-right">
                                    <button class="w-8 h-8 rounded-lg text-gray-400 hover:text-blue-600 hover:bg-blue-50 mr-1"><i class='bx bx-edit text-lg'></i></button>
                                    <button class="w-8 h-8 rounded-lg text-gray-400 hover:text-gray-800 hover:bg-gray-100"><i class='bx bx-menu text-lg'></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-6 border-t border-gray-100 flex items-center justify-between">
                    <p class="text-sm text-gray-500">Showing 4 of 24 services</p>
                    <div class="flex gap-1">
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:bg-gray-50"><i class='bx bx-chevron-left'></i></button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center bg-blue-600 text-white font-medium text-sm">1</button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-50 font-medium text-sm">2</button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-50"><i class='bx bx-chevron-right'></i></button>
                    </div>
                </div>
            </div>

        </div>
@endsection
