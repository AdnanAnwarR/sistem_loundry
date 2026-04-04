@extends('layouts.cashier')

@section('title', 'Kasir - Fluid Ops')

@section('content')
        <div class="px-4 sm:px-8 py-5 sm:py-7 max-w-3xl mx-auto lg:mx-0">

            {{-- Tips Banner --}}
            <div class="flex items-start gap-3 bg-blue-50 border border-blue-100 rounded-2xl px-5 py-4 mb-8">
                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-blue-800 mb-0.5">Tips Operasional</p>
                    <p class="text-xs text-blue-600 leading-relaxed">Minta customer menyebutkan ID order atau nama lengkap untuk mempercepat proses pencarian di sistem pembayaran.</p>
                </div>
            </div>

            {{-- Search --}}
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 sm:p-6 mb-6">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Cari Order Booking</p>
                <p class="text-[11px] text-gray-400 mb-4">Masukkan ID atau nama customer</p>
                <form method="GET" action="#">
                    <div class="relative">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2">
                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Ketik ID order atau nama customer..."
                            class="w-full pl-11 pr-4 py-3.5 rounded-xl bg-gray-50 border border-gray-100 text-sm text-gray-700 font-medium placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-300 transition-all"/>
                    </div>
                </form>
            </div>

            {{-- Results --}}
            @if(isset($orders) && $orders->count() > 0)
            <div class="mb-3 flex items-center justify-between">
                <p class="text-xs text-gray-400 font-medium">Hasil Pencarian ({{ $orders->count() }})</p>
                <a href="#" class="text-xs text-blue-600 font-semibold hover:underline">Lihat Semua</a>
            </div>
            <div class="space-y-3">
                @foreach($orders as $order)
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm px-4 sm:px-5 py-4 flex flex-col sm:flex-row sm:items-center gap-4 hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-4 w-full sm:w-auto">
                        <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-wrap items-center gap-2 mb-1">
                            <span class="text-sm font-bold text-gray-900">{{ $order->order_code }} - <span class="break-words">{{ $order->customer->name }}</span></span>
                            @if($order->payment_status === 'menunggu_bayar')
                            <span class="px-2 py-0.5 rounded-md text-[10px] font-bold uppercase bg-orange-100 text-orange-600">Menunggu Bayar</span>
                            @elseif($order->payment_status === 'lunas')
                            <span class="px-2 py-0.5 rounded-md text-[10px] font-bold uppercase bg-green-100 text-green-600">Lunas</span>
                            @endif
                        </div>
                        <div class="flex items-center gap-3 text-xs text-gray-400">
                            <span>{{ $order->created_at->format('d/m/Y, H:i') }}</span>
                            <span>{{ $order->weight }} Kg</span>
                        </div>
                    </div>
                    </div>
                    <div class="flex items-center justify-between sm:justify-end gap-4 w-full sm:w-auto mt-2 sm:mt-0 pt-3 sm:pt-0 border-t border-gray-50 sm:border-0 flex-shrink-0">
                        <div class="text-left sm:text-right">
                            <p class="text-[10px] text-gray-400 mb-0.5">Total Tagihan</p>
                            <p class="text-base font-bold text-gray-900">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                        </div>
                        <a href="#" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs sm:text-sm font-semibold px-4 sm:px-5 py-2.5 rounded-xl transition-colors">
                            Bayar
                            <svg class="w-4 h-4 hidden sm:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @elseif(request('search'))
            <div class="text-center py-12 text-gray-400 text-sm">Tidak ada order ditemukan untuk "{{ request('search') }}"</div>
            @endif

            <p class="text-center text-xs text-gray-400 mt-8">
                Ingin membuat order baru? <a href="#" class="text-blue-600 font-semibold hover:underline">Klik di sini</a>
            </p>
        </div>
@endsection