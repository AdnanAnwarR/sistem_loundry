@extends('layouts.admin')

@section('title', 'Customer Base - Fluid Ops')

@section('content')
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-8 gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Customer Base</h2>
                    <p class="text-gray-500 text-sm mt-1">Manage your high-end clientele and monitor their operational engagement.</p>
                </div>
                {{-- <button class="px-5 py-2.5 bg-blue-600 text-white rounded-xl text-sm font-medium hover:bg-blue-700 flex items-center gap-2 shadow-sm transition"><i class='bx bx-plus'></i> Add Customer</button> --}}
            </div>

            @php
                $totalClients = $customers->count();
                $activeNow = $customers->where('is_active', true)->count();
            @endphp
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">TOTAL CLIENTS</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-bold text-gray-800">{{ $totalClients }}</h3>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">ACTIVE CUSTOMERS</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-bold text-gray-800">{{ $activeNow }}</h3>
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
                            @forelse($customers as $customer)
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-blue-100 overflow-hidden flex items-center justify-center text-blue-600 font-bold">
                                            {{ strtoupper(substr($customer->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800">{{ $customer->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-gray-800">{{ $customer->email }}</p>
                                    <p class="text-xs text-gray-500">{{ $customer->no_hp ?? '-' }}</p>
                                </td>
                                <td class="py-4 px-6 text-center font-semibold text-blue-600">{{ $customer->pesanans_count ?? 0 }}</td>
                                <td class="py-4 px-6 text-gray-500">{{ $customer->created_at->diffForHumans() }}</td>
                                <td class="py-4 px-6">
                                    @if($customer->is_active)
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-50 text-green-600 flex inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> ACTIVE</span>
                                    @else
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-500 flex inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span> BANNED</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-right flex flex-row items-center justify-end gap-2">
                                    <form action="{{ route('admin.users.toggle', $customer->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin mengubah status pengguna ini?');">
                                        @csrf
                                        @method('PUT')
                                        @if($customer->is_active)
                                            <button type="submit" class="px-3 py-1.5 rounded-lg text-red-600 bg-red-50 hover:bg-red-100 text-xs font-bold transition">Block</button>
                                        @else
                                            <button type="submit" class="px-3 py-1.5 rounded-lg text-green-600 bg-green-50 hover:bg-green-100 text-xs font-bold transition">Unblock</button>
                                        @endif
                                    </form>
                                    <form action="{{ route('admin.users.destroy', $customer->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus pelanggan ini secara permanen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-8 h-8 rounded-lg text-gray-400 hover:text-red-600 hover:bg-red-50 flex items-center justify-center"><i class='bx bx-trash text-lg'></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-gray-500">
                                    <i class='bx bx-user text-4xl mb-2 text-gray-300'></i>
                                    <p>Belum ada data pelanggan.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Placeholder -->
                <div class="p-6 border-t border-gray-100 flex items-center justify-between">
                    <p class="text-sm text-gray-500">Menampilkan pelanggan terbaru</p>
                </div>
            </div>

        </div>
@endsection
