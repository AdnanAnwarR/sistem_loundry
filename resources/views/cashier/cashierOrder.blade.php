@extends('layouts.cashier')

@section('title', 'Manajemen Order - Fluid Ops')

@section('header_search')
                <div class="relative max-w-xs">
                    <svg class="w-4 h-4 text-gray-300 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" placeholder="Cari ID Order atau Nama Customer..." class="w-full pl-9 pr-4 py-2 rounded-xl bg-gray-50 border border-gray-100 text-sm text-gray-600 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-100"/>
                </div>
@endsection

@section('content')
@php
    $orders = collect([
        (object) [
            'order_code' => 'ORD-10023',
            'created_at' => now()->subHours(2),
            'customer' => (object) ['name' => 'Adnan Anwar', 'phone' => '081234567890'],
            'status' => 'diproses',
            'payment_status' => 'lunas',
            'total_price' => 75000,
            'weight' => 5.2,
            'service_type' => 'Cuci Lipat Premium',
            'packing_type' => 'Tas Kotak',
            'payment_method' => 'QRIS',
            'operator' => 'Darma',
        ],
        (object) [
            'order_code' => 'ORD-10024',
            'created_at' => now()->subMinutes(45),
            'customer' => (object) ['name' => 'Siti Nurhaliza', 'phone' => '081200001111'],
            'status' => 'menunggu',
            'payment_status' => 'belum_lunas',
            'total_price' => 45000,
            'weight' => 3.0,
            'service_type' => 'Cuci Setrika Reguler',
            'packing_type' => 'Plastik Bening',
            'payment_method' => 'Tunai (COD)',
            'queue_info' => 'Antrian #05',
        ],
        (object) [
            'order_code' => 'ORD-10025',
            'created_at' => now()->subDays(1),
            'customer' => (object) ['name' => 'Budi Santoso', 'phone' => '081299998888'],
            'status' => 'selesai',
            'payment_status' => 'lunas',
            'total_price' => 120000,
            'weight' => 8.5,
            'service_type' => 'Express 1 Hari',
            'packing_type' => 'Tas Premium Pouch',
            'payment_method' => 'Transfer Bank',
        ],
    ]);
@endphp
        <div class="px-4 sm:px-8 py-5 sm:py-7 mb-20 lg:mb-0">

            {{-- Page Header --}}
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-xl font-bold text-gray-900">Manajemen Order</h1>
                    <p class="text-sm text-gray-400 mt-0.5">Pantau dan kelola semua antrian cucian hari ini secara real-time.</p>
                </div>
                {{-- Tabs --}}
                <div class="flex items-center bg-gray-100 rounded-xl p-1 gap-1 overflow-x-auto hide-scrollbar w-full lg:w-auto">
                    @foreach(['semua' => 'Semua', 'menunggu' => 'Menunggu', 'diproses' => 'Diproses', 'selesai' => 'Selesai'] as $key => $label)
                    <a href="#"
                        class="whitespace-nowrap flex-shrink-0 px-4 py-2 sm:py-1.5 rounded-lg text-sm font-medium transition-colors
                        {{ (request('tab', 'semua') === $key) ? 'bg-white text-gray-900 shadow-sm' : 'text-gray-500 hover:text-gray-700' }}">
                        {{ $label }}
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Order Cards --}}
            <div class="space-y-4 max-w-3xl">

                @forelse($orders ?? [] as $order)
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden text-left">
                    {{-- Card Header --}}
                    <div class="px-4 sm:px-5 pt-4 pb-3 flex flex-col sm:flex-row sm:items-start justify-between border-b border-gray-50 gap-3 sm:gap-0">
                        <div class="flex items-center gap-3">
                            {{-- Date badge --}}
                            <div class="text-center bg-gray-50 rounded-xl px-3 py-2 flex-shrink-0">
                                <p class="text-[10px] font-bold text-gray-400 uppercase">{{ $order->created_at->format('M') }}</p>
                                <p class="text-lg font-bold text-gray-800 leading-none">{{ $order->created_at->format('d') }}</p>
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <p class="text-sm font-bold text-gray-900">{{ $order->customer->name }}</p>
                                    <span class="text-xs text-blue-500 font-semibold bg-blue-50 px-2 py-0.5 rounded-lg">{{ $order->order_code }}</span>
                                </div>
                                <div class="flex items-center gap-3 text-xs text-gray-400 mt-0.5">
                                    <span>{{ $order->customer->phone }}</span>
                                    <span>• Booking: {{ $order->created_at->format('H:i') }} WIB</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-left sm:text-right w-full sm:w-auto mt-2 sm:mt-0 pt-3 sm:pt-0 border-t sm:border-transparent border-gray-100">
                            @if($order->status === 'diproses')
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1.5 rounded-full">
                                <span class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-pulse"></span>
                                Sedang Diproses
                            </span>
                            @elseif($order->status === 'menunggu')
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-600 bg-amber-50 px-3 py-1.5 rounded-full">
                                <span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span>
                                Menunggu Antrian
                            </span>
                            @elseif($order->status === 'selesai')
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-green-600 bg-green-50 px-3 py-1.5 rounded-full">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                Diambil / Selesai
                            </span>
                            @endif
                            <p class="text-base font-bold text-gray-900 mt-1">Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                @if($order->payment_status === 'belum_lunas')
                                <span class="text-[10px] font-normal text-orange-500 ml-1">(Belum Lunas)</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Order Details --}}
                    <div class="px-4 sm:px-5 py-3 grid grid-cols-2 lg:grid-cols-4 gap-2 sm:gap-3 border-b border-gray-50">
                        <div class="bg-gray-50 rounded-xl p-3">
                            <p class="text-[10px] text-gray-400 uppercase font-semibold tracking-wide mb-1">Berat</p>
                            <p class="text-sm font-bold text-gray-700">{{ $order->weight }} Kg</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-3">
                            <p class="text-[10px] text-gray-400 uppercase font-semibold tracking-wide mb-1">Layanan</p>
                            <p class="text-sm font-bold text-gray-700">{{ $order->service_type }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-3">
                            <p class="text-[10px] text-gray-400 uppercase font-semibold tracking-wide mb-1">Packing</p>
                            <p class="text-sm font-bold text-gray-700">{{ $order->packing_type }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-3">
                            <p class="text-[10px] text-gray-400 uppercase font-semibold tracking-wide mb-1">Metode</p>
                            <p class="text-sm font-bold text-gray-700">{{ $order->payment_method }}</p>
                        </div>
                    </div>

                    {{-- Card Footer --}}
                    <div class="px-4 sm:px-5 py-3 md:py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-0">
                        @if($order->status === 'diproses')
                        <div class="flex items-center gap-2 text-xs text-gray-400">
                            <div class="w-6 h-6 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 font-bold text-[10px]">
                                {{ strtoupper(substr($order->operator ?? 'OP', 0, 2)) }}
                            </div>
                            <span>{{ $order->operator ?? '~91 Tim Washing & Ironing' }}</span>
                        </div>
                        <div class="flex flex-col md:flex-row items-stretch md:items-center gap-2 w-full sm:w-auto mt-2 sm:mt-0">
                            <button class="w-full md:w-auto justify-center px-4 py-2 text-xs font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">
                                Update Progress
                            </button>
                            <button class="w-full md:w-auto justify-center px-4 py-2 text-xs font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-xl transition-colors flex items-center gap-2">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Tandai Selesai & Kirim WA
                            </button>
                        </div>
                        @elseif($order->status === 'menunggu')
                        <div class="flex items-center gap-2 text-xs text-gray-400">
                            <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ $order->queue_info ?? 'Cucian ditinggal 3 hari' }}</span>
                        </div>
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2 w-full sm:w-auto mt-2 sm:mt-0">
                            <a href="#" class="w-full sm:w-auto justify-center text-center px-4 py-2 text-xs font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">
                                Lihat Detail
                            </a>
                            <a href="#" class="w-full sm:w-auto justify-center px-4 py-2 text-xs font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-xl transition-colors flex items-center gap-2">
                                Mulai Proses Sekarang
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                        @elseif($order->status === 'selesai')
                        <div class="flex items-center gap-2 text-xs text-gray-400">
                            <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Notifikasi WhatsApp terkirim ✓</span>
                        </div>
                        <div></div>
                        @endif
                    </div>
                </div>
                @empty
                {{-- Empty state --}}
                <div class="text-center py-16 text-gray-400">
                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <p class="text-sm font-medium">Belum ada order hari ini</p>
                </div>
                @endforelse

            </div>
        </div>

        {{-- BOTTOM BAR --}}
        <div class="fixed bottom-0 left-0 lg:left-56 right-0 bg-white border-t border-gray-100 px-4 sm:px-8 py-3 sm:py-4 flex flex-col sm:flex-row items-center justify-between z-40 gap-3 sm:gap-0 shadow-[0_-8px_15px_-3px_rgba(0,0,0,0.05)]">
            <div class="text-xs sm:text-sm text-gray-500 font-medium whitespace-nowrap w-full sm:w-auto text-left">
                Total Antrian: <span class="font-bold text-gray-900">{{ $totalOrders ?? 24 }} Orders</span>
            </div>
            <div class="flex items-center gap-2 sm:gap-3 w-full sm:w-auto">
                <button class="flex-1 sm:flex-none justify-center inline-flex items-center gap-1 sm:gap-2 px-3 sm:px-5 py-2.5 text-[11px] sm:text-sm font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors whitespace-nowrap">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    Muat Lebih Banyak Order
                </button>
                <a href="#" class="flex-1 sm:flex-none justify-center inline-flex items-center gap-1 sm:gap-2 px-3 sm:px-5 py-2.5 text-[11px] sm:text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-xl transition-colors whitespace-nowrap">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Order Baru
                </a>
            </div>
        </div>
@endsection