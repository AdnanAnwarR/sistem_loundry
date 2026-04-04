@extends('layouts.cashier')

@section('title', 'Status Laundry - Fluid Ops')

@section('content')
        <div class="px-4 sm:px-8 py-5 sm:py-7">

            {{-- Page Title --}}
            <div class="mb-6">
                <h1 class="text-xl font-bold text-gray-900">Status Operasional</h1>
                <p class="text-sm text-gray-400 mt-0.5">Pantau alur kerja laundry secara real-time</p>
            </div>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-6 sm:mb-8">
                {{-- Menunggu --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-9 h-9 bg-orange-50 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wide text-orange-500 bg-orange-50 px-2 py-0.5 rounded-full">Prioritas</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['menunggu'] ?? 12 }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">Menunggu</p>
                    <p class="text-xs font-semibold text-orange-500 mt-1">Order</p>
                </div>

                {{-- Diproses --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-9 h-9 bg-blue-50 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['diproses'] ?? '08' }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">Diproses</p>
                    <p class="text-xs font-semibold text-blue-500 mt-1">Mesin</p>
                </div>

                {{-- Selesai Hari Ini --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-9 h-9 bg-green-50 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['selesai'] ?? 45 }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">Selesai Hari Ini</p>
                    <p class="text-xs font-semibold text-green-500 mt-1">Item</p>
                </div>

                {{-- Total Pendapatan --}}
                <div class="bg-blue-600 rounded-2xl shadow-sm p-5 relative overflow-hidden">
                    <div class="absolute -top-3 -right-3 w-20 h-20 bg-blue-500 rounded-full opacity-40"></div>
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-blue-700 rounded-full opacity-40"></div>
                    <div class="relative z-10">
                        <div class="w-9 h-9 bg-white/20 rounded-xl flex items-center justify-center mb-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-2xl font-bold text-white">Rp {{ number_format($stats['pendapatan'] ?? 2450000, 0, ',', '.') }}</p>
                        <p class="text-xs text-blue-200 mt-0.5">Total Pendapatan</p>
                        <p class="text-xs font-semibold text-blue-200 mt-1">Hari Ini</p>
                    </div>
                </div>
            </div>

            {{-- Table Card --}}
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                {{-- Table Header --}}
                <div class="px-4 sm:px-6 py-4 flex flex-col md:flex-row md:items-center justify-between border-b border-gray-50 gap-4 md:gap-0">
                    <div>
                        <p class="text-sm font-bold text-gray-900">Status Semua Laundry</p>
                        <p class="text-xs text-gray-400 mt-0.5">Daftar pemantauan aktif operasional toko</p>
                    </div>
                    <div class="flex items-center gap-2 sm:gap-3 w-full md:w-auto">
                        <div class="relative flex-1 md:flex-none">
                            <svg class="w-4 h-4 text-gray-300 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input type="text" placeholder="Cari nama atau ID..."
                                class="w-full md:w-48 pl-9 pr-4 py-2.5 sm:py-2 rounded-xl bg-gray-50 border border-gray-100 text-sm text-gray-600 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-100"/>
                        </div>
                        <button class="inline-flex items-center justify-center gap-2 px-3 sm:px-4 py-2.5 sm:py-2 text-xs sm:text-sm font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                            Filter
                        </button>
                    </div>
                </div>

                {{-- Table --}}
                <div class="overflow-x-auto w-full">
                    <table class="w-full min-w-[700px]">
                        <thead>
                            <tr class="bg-gray-50/60">
                                <th class="text-left px-6 py-3 text-[10px] font-bold uppercase tracking-widest text-gray-400">Customer</th>
                                <th class="text-left px-6 py-3 text-[10px] font-bold uppercase tracking-widest text-gray-400">Order ID</th>
                                <th class="text-left px-6 py-3 text-[10px] font-bold uppercase tracking-widest text-gray-400">Layanan</th>
                                <th class="text-left px-6 py-3 text-[10px] font-bold uppercase tracking-widest text-gray-400">Status</th>
                                <th class="text-left px-6 py-3 text-[10px] font-bold uppercase tracking-widest text-gray-400">Estimasi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($laundryItems ?? [] as $item)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-xs font-bold flex-shrink-0
                                            {{ $item->avatar_color ?? 'bg-blue-500' }}">
                                            {{ strtoupper(substr($item->customer->name ?? 'AN', 0, 2)) }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-gray-800">{{ $item->customer->name }}</p>
                                            <p class="text-xs text-gray-400">{{ $item->customer->phone }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-lg">{{ $item->order_code }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-700 font-medium">{{ $item->service_type }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    @if($item->status === 'menunggu')
                                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full">
                                        <span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span>
                                        Menunggu antrian
                                    </span>
                                    @elseif($item->status === 'diproses')
                                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full">
                                        <span class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-pulse"></span>
                                        Sedang diproses
                                    </span>
                                    @elseif($item->status === 'selesai')
                                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-green-600 bg-green-50 px-2.5 py-1 rounded-full">
                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                        Selesai
                                    </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-600 font-medium">{{ $item->estimated_time }}</p>
                                </td>
                            </tr>
                            @empty
                            {{-- Sample rows for preview --}}
                            @php
                            $samples = [
                                ['initials' => 'AN', 'color' => 'bg-blue-500', 'name' => 'Andi Nasution', 'phone' => '0812-3456-7890', 'code' => '#ORD-59213', 'service' => 'Cuci Kering Lipat', 'status' => 'menunggu', 'est' => '2 Jam'],
                                ['initials' => 'SM', 'color' => 'bg-pink-500', 'name' => 'Siti Maemurah', 'phone' => '0817-003-0006', 'code' => '#ORD-99211', 'service' => 'Cuci Setrika Express', 'status' => 'diproses', 'est' => '45 Menit'],
                                ['initials' => 'BW', 'color' => 'bg-teal-500', 'name' => 'Budi Waluyo', 'phone' => '0813-9999-0000', 'code' => '#ORD-99792', 'service' => 'Bedcover King Size', 'status' => 'selesai', 'est' => '-'],
                                ['initials' => 'RT', 'color' => 'bg-orange-500', 'name' => 'Rina Tan', 'phone' => '0852-6677-4435', 'code' => '#ORD-99115', 'service' => 'Cuci Sepatu Premium', 'status' => 'diproses', 'est' => '3 Har'],
                            ];
                            @endphp
                            @foreach($samples as $s)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-xs font-bold flex-shrink-0 {{ $s['color'] }}">
                                            {{ $s['initials'] }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-gray-800">{{ $s['name'] }}</p>
                                            <p class="text-xs text-gray-400">{{ $s['phone'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-lg">{{ $s['code'] }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-700 font-medium">{{ $s['service'] }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    @if($s['status'] === 'menunggu')
                                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full">
                                        <span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span>
                                        Menunggu antrian
                                    </span>
                                    @elseif($s['status'] === 'diproses')
                                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full">
                                        <span class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-pulse"></span>
                                        Sedang diproses
                                    </span>
                                    @elseif($s['status'] === 'selesai')
                                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-green-600 bg-green-50 px-2.5 py-1 rounded-full">
                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                        Selesai
                                    </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-600 font-medium">{{ $s['est'] }}</p>
                                </td>
                            </tr>
                            @endforeach
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="px-4 sm:px-6 py-4 border-t border-gray-50 flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-0">
                    <p class="text-xs text-gray-400 text-center sm:text-left">Menampilkan 4 dari 56 order aktif</p>
                    <div class="flex items-center justify-between sm:justify-start gap-2 w-full sm:w-auto">
                        <button class="w-full sm:w-auto justify-center px-4 py-2 sm:py-1.5 text-xs font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">
                            Sebelumnya
                        </button>
                        <button class="w-full sm:w-auto justify-center px-4 py-2 sm:py-1.5 text-xs font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-xl transition-colors">
                            Selanjutnya
                        </button>
                    </div>
                </div>
            </div>
        </div>
@endsection