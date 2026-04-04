@extends('layouts.admin')

@section('title', 'Customer Base - Fluid Ops')

@section('content')
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-8 gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Customer Base</h2>
                    <p class="text-gray-500 text-sm mt-1">Manage your high-end clientele and monitor their operational engagement.</p>
                </div>
                <button class="px-5 py-2.5 bg-blue-600 text-white rounded-xl text-sm font-medium hover:bg-blue-700 flex items-center gap-2 shadow-sm transition"><i class='bx bx-plus'></i> Add Customer</button>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">TOTAL CLIENTS</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-bold text-gray-800">1,284</h3>
                        <span class="text-xs font-semibold text-green-600 bg-green-50 px-2 py-1 rounded-lg">+12%</span>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">ACTIVE NOW</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-bold text-gray-800">942</h3>
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-blue-100"></div>
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-green-100"></div>
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-xs text-gray-600">+4</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">CHURN RISK</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-bold text-gray-800">3.2%</h3>
                        <span class="text-xs font-semibold text-red-500"><i class='bx bx-trending-down text-lg'></i></span>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">AVG. VALUE</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-bold text-gray-800">$142</h3>
                        <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded-lg">Top 5%</span>
                    </div>
                </div>
            </div>

            <!-- Table Area -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                <!-- Toolbar -->
                <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-white">
                    <div class="flex gap-3">
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 flex items-center gap-2"><i class='bx bx-filter'></i> Filters</button>
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 flex items-center gap-2"><i class='bx bx-sort-down'></i> Sort by: Newest</button>
                    </div>
                    <div class="flex gap-3">
                        <button class="w-10 h-10 border border-gray-200 rounded-lg text-gray-500 hover:bg-gray-50 flex items-center justify-center"><i class='bx bx-download text-lg'></i></button>
                        <button class="w-10 h-10 border border-gray-200 rounded-lg text-gray-500 hover:bg-gray-50 flex items-center justify-center"><i class='bx bx-dots-vertical-rounded text-lg'></i></button>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[900px]">
                        <thead>
                            <tr class="text-xs text-gray-400 border-b border-gray-100">
                                <th class="py-4 px-6 font-semibold uppercase tracking-wider">Customer Name</th>
                                <th class="py-4 px-6 font-semibold uppercase tracking-wider">Contact Details</th>
                                <th class="py-4 px-6 font-semibold uppercase tracking-wider text-center">Total Orders</th>
                                <th class="py-4 px-6 font-semibold uppercase tracking-wider">Last Active</th>
                                <th class="py-4 px-6 font-semibold uppercase tracking-wider">Status</th>
                                <th class="py-4 px-6 font-semibold uppercase tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-700">
                            <!-- Row 1 -->
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-blue-100 overflow-hidden">
                                           <img src="https://ui-avatars.com/api/?name=Julian+Montgomery&background=ebf8ff&color=2b6cb0" alt="Avatar" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800">Julian Montgomery</p>
                                            <p class="text-xs text-gray-500">Premium Member</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-gray-800">julian.m@outlook.com</p>
                                    <p class="text-xs text-gray-500">+1 (555) 012-3456</p>
                                </td>
                                <td class="py-4 px-6 text-center font-semibold text-blue-600">48</td>
                                <td class="py-4 px-6 text-gray-500">2 hours ago</td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-50 text-green-600 flex inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> ACTIVE</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="w-8 h-8 rounded-lg text-gray-400 hover:text-blue-600 hover:bg-blue-50 mr-1"><i class='bx bx-edit'></i></button>
                                    <button class="w-8 h-8 rounded-lg text-gray-400 hover:text-red-600 hover:bg-red-50"><i class='bx bx-trash'></i></button>
                                </td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-green-100 overflow-hidden">
                                           <img src="https://ui-avatars.com/api/?name=Elena+Rodriguez&background=f0fff4&color=2f855a" alt="Avatar" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800">Elena Rodriguez</p>
                                            <p class="text-xs text-gray-500">Standard Tier</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-gray-800">elena.rod@gmail.com</p>
                                    <p class="text-xs text-gray-500">+1 (555) 098-7654</p>
                                </td>
                                <td class="py-4 px-6 text-center font-semibold text-blue-600">12</td>
                                <td class="py-4 px-6 text-gray-500">Yesterday</td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-500 flex inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span> INACTIVE</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="w-8 h-8 rounded-lg text-gray-400 hover:text-blue-600 hover:bg-blue-50 mr-1"><i class='bx bx-edit'></i></button>
                                    <button class="w-8 h-8 rounded-lg text-gray-400 hover:text-red-600 hover:bg-red-50"><i class='bx bx-trash'></i></button>
                                </td>
                            </tr>
                             <!-- Row 3 -->
                             <tr class="hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-purple-100 overflow-hidden">
                                           <img src="https://ui-avatars.com/api/?name=Marcus+Thorne&background=faf5ff&color=6b46c1" alt="Avatar" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800">Marcus Thorne</p>
                                            <p class="text-xs text-gray-500">VIP Concierge</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-gray-800">m.thorne@corporate.com</p>
                                    <p class="text-xs text-gray-500">+1 (555) 234-5678</p>
                                </td>
                                <td class="py-4 px-6 text-center font-semibold text-blue-600">156</td>
                                <td class="py-4 px-6 text-gray-500">Just now</td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-50 text-green-600 flex inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> ACTIVE</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="w-8 h-8 rounded-lg text-gray-400 hover:text-blue-600 hover:bg-blue-50 mr-1"><i class='bx bx-edit'></i></button>
                                    <button class="w-8 h-8 rounded-lg text-gray-400 hover:text-red-600 hover:bg-red-50"><i class='bx bx-trash'></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-6 border-t border-gray-100 flex items-center justify-between">
                    <p class="text-sm text-gray-500">Showing 1 to 10 of 1,284 customers</p>
                    <div class="flex gap-1">
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:bg-gray-50"><i class='bx bx-chevron-left'></i></button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center bg-blue-600 text-white font-medium text-sm">1</button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-50 font-medium text-sm">2</button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-50 font-medium text-sm">3</button>
                        <span class="w-8 h-8 flex items-center justify-center text-gray-400">...</span>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-50 font-medium text-sm">129</button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-50"><i class='bx bx-chevron-right'></i></button>
                    </div>
                </div>
            </div>

        </div>
@endsection
