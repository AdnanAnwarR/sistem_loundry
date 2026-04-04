@extends('layouts.admin')

@section('title', 'Employee Directory - Fluid Ops')

@section('content')
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-8 gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Employee Directory</h2>
                    <p class="text-gray-500 text-sm mt-1">Manage your service staff, monitor real-time availability, and coordinate operational flow.</p>
                </div>
                <button class="px-5 py-2.5 bg-blue-600 text-white rounded-xl text-sm font-medium hover:bg-blue-700 flex items-center gap-2 shadow-sm transition"><i class='bx bx-plus'></i> Add Employee</button>
            </div>

            <!-- Stats -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-8 flex justify-between items-center">
                <div>
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2 uppercase">Total Workforce</p>
                    <h3 class="text-4xl font-bold text-gray-800">42</h3>
                </div>
                <div class="flex gap-8">
                    <div class="text-right">
                        <p class="text-xs text-gray-400 font-bold tracking-wider mb-2 uppercase">Active Now</p>
                        <h3 class="text-2xl font-bold text-blue-600">31</h3>
                    </div>
                    <div class="text-right border-l pl-8 border-gray-100">
                        <p class="text-xs text-gray-400 font-bold tracking-wider mb-2 uppercase">Break Time</p>
                        <h3 class="text-2xl font-bold text-gray-500">11</h3>
                    </div>
                </div>
            </div>

            <!-- Table Area -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                <!-- Toolbar -->
                <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-white">
                    <div class="relative w-64">
                         <i class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400'></i>
                         <input type="text" placeholder="Search employees..." class="w-full bg-gray-50 border border-gray-200 rounded-lg py-2 pl-9 pr-4 text-sm focus:outline-none focus:border-blue-400">
                    </div>
                    <div class="flex gap-3">
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 flex items-center gap-2"><i class='bx bx-filter'></i> Filters</button>
                        <button class="px-4 py-2 border border-blue-50 text-blue-600 rounded-lg text-sm font-medium hover:bg-blue-50 flex items-center gap-2 bg-white"><i class='bx bx-sort'></i> Sorted by: Recently Active</button>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[800px]">
                        <thead>
                            <tr class="text-xs text-gray-400 border-b border-gray-100 uppercase">
                                <th class="py-4 px-6 font-semibold tracking-wider">Employee Name</th>
                                <th class="py-4 px-6 font-semibold tracking-wider">Role</th>
                                <th class="py-4 px-6 font-semibold tracking-wider">Contact Info</th>
                                <th class="py-4 px-6 font-semibold tracking-wider">Status</th>
                                <th class="py-4 px-6 font-semibold tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-700">
                            <!-- Row 1 -->
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-blue-100 overflow-hidden">
                                           <img src="https://ui-avatars.com/api/?name=Elena+Rodriguez&background=ebf8ff&color=2b6cb0" alt="Avatar" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800">Elena Rodriguez</p>
                                            <p class="text-xs text-gray-500">Employee ID: #FL-2054</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-medium">Ironing Specialist</span>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-gray-800 text-sm">elena.r@fluid.com</p>
                                    <p class="text-xs text-gray-500">+1 (555) 302-3481</p>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold text-green-600 flex inline-flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-green-500"></span> On Duty</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="w-8 h-8 rounded-lg text-blue-600 bg-blue-50 hover:bg-blue-100 mr-2"><i class='bx bx-message-rounded-dots text-lg'></i></button>
                                    <button class="w-8 h-8 rounded-lg text-red-600 bg-red-50 hover:bg-red-100"><i class='bx bx-power-off text-lg'></i></button>
                                </td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-orange-100 overflow-hidden">
                                           <img src="https://ui-avatars.com/api/?name=Marcus+Chen&background=ffedd5&color=c05621" alt="Avatar" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800">Marcus Chen</p>
                                            <p class="text-xs text-gray-500">Employee ID: #FL-1988</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-medium">Courier</span>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-gray-800 text-sm">m.chen@fluid.com</p>
                                    <p class="text-xs text-gray-500">+1 (555) 128-4490</p>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold text-gray-400 flex inline-flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-gray-300"></span> Offline</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="w-8 h-8 rounded-lg text-blue-600 bg-blue-50 hover:bg-blue-100 mr-2"><i class='bx bx-message-rounded-dots text-lg'></i></button>
                                    <button class="w-8 h-8 rounded-lg text-red-600 bg-red-50 hover:bg-red-100 opacity-50"><i class='bx bx-power-off text-lg'></i></button>
                                </td>
                            </tr>
                             <!-- Row 3 -->
                             <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gray-100 text-gray-700 font-bold flex flex-col items-center justify-center">
                                           JB
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800">Jordan Banks</p>
                                            <p class="text-xs text-gray-500">Employee ID: #FL-2210</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 bg-teal-50 text-teal-600 rounded-full text-xs font-medium">Washer</span>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-gray-800 text-sm">j.banks@fluid.com</p>
                                    <p class="text-xs text-gray-500">+1 (555) 773-1022</p>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold text-green-600 flex inline-flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-green-500"></span> On Duty</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="w-8 h-8 rounded-lg text-blue-600 bg-blue-50 hover:bg-blue-100 mr-2"><i class='bx bx-message-rounded-dots text-lg'></i></button>
                                    <button class="w-8 h-8 rounded-lg text-red-600 bg-red-50 hover:bg-red-100"><i class='bx bx-power-off text-lg'></i></button>
                                </td>
                            </tr>
                            <!-- Row 4 -->
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-green-100 overflow-hidden">
                                           <img src="https://ui-avatars.com/api/?name=Sarah+Miller&background=f0fff4&color=2f855a" alt="Avatar" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800">Sarah Miller</p>
                                            <p class="text-xs text-gray-500">Employee ID: #FL-1542</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 bg-purple-50 text-purple-600 rounded-full text-xs font-medium">Packing Specialist</span>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-gray-800 text-sm">s.miller@fluid.com</p>
                                    <p class="text-xs text-gray-500">+1 (555) 441-9923</p>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold text-yellow-500 flex inline-flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-yellow-400"></span> On Break</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <button class="w-8 h-8 rounded-lg text-blue-600 bg-blue-50 hover:bg-blue-100 mr-2"><i class='bx bx-message-rounded-dots text-lg'></i></button>
                                    <button class="w-8 h-8 rounded-lg text-red-600 bg-red-50 hover:bg-red-100 opacity-50"><i class='bx bx-power-off text-lg'></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-6 border-t border-gray-100 flex items-center justify-between">
                    <p class="text-sm text-gray-500">Showing 4 of 42 employees</p>
                    <div class="flex gap-1">
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:bg-gray-50"><i class='bx bx-chevron-left'></i></button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center bg-blue-600 text-white font-medium text-sm">1</button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-50 font-medium text-sm">2</button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-50 font-medium text-sm">3</button>
                        <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-50"><i class='bx bx-chevron-right'></i></button>
                    </div>
                </div>
            </div>

        </div>
@endsection
