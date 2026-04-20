@extends('layouts.user')

@section('title', 'Riwayat Pesanan - Fluid Ops')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Riwayat Pesanan</h1>
        <p class="text-sm text-gray-500 mt-1">Daftar cucian yang telah selesai diproses dan diambil.</p>
    </div>
</div>

<!-- Detailed History Settings / Filters -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm mb-6 flex items-center gap-4 p-4">
    <div class="relative flex-1">
        <i class='bx bx-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400'></i>
        <input type="text" placeholder="Cari ID Booking..." class="w-full bg-gray-50 border border-gray-200 rounded-xl py-2.5 pl-11 pr-4 text-sm focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition">
    </div>
    <div class="hidden md:flex gap-2">
        <select class="bg-gray-50 border border-gray-200 text-gray-600 rounded-xl text-sm py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-500 appearance-none pr-8">
            <option>Bulan Ini</option>
            <option>3 Bulan Terakhir</option>
            <option>6 Bulan Terakhir</option>
            <option>Tahun Ini</option>
        </select>
    </div>
</div>

<!-- History Cards (Read) -->
<div class="space-y-4">
    
    @forelse($historyOrders as $order)
    <!-- History Item -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 sm:p-6 lg:p-8 flex flex-col items-center justify-between hover:shadow-md transition-shadow">
        
        <div class="w-full flex flex-col sm:flex-row sm:justify-between items-start mb-4 border-b border-gray-100 pb-4 gap-3 sm:gap-0">
            <div>
                <span class="bg-green-100 text-green-700 text-[10px] uppercase font-bold px-2.5 py-1 rounded inline-block mb-2">Selesai & Diambil</span>
                <h3 class="font-black text-xl text-gray-900 tracking-wide">#{{ $order->order_id }}</h3>
                <p class="text-xs text-gray-500 mt-1 font-semibold">Tgl Selesai: {{ $order->updated_at->format('d M Y') }}</p>
            </div>
            <div class="text-left sm:text-right">
                <p class="text-xs text-gray-400 font-bold uppercase mb-1">Status Bayar</p>
                <span class="inline-flex items-center gap-1 {{ $order->status_pembayaran == 'sudah_dibayar' ? 'bg-green-50 text-green-600 border-green-200' : 'bg-red-50 text-red-600 border-red-200' }} px-2.5 py-1 rounded font-bold text-xs border">
                    <i class='bx {{ $order->status_pembayaran == 'sudah_dibayar' ? 'bx-check' : 'bx-x' }}'></i> {{ strtoupper(str_replace('_', ' ', $order->status_pembayaran)) }} ({{ $order->metode_bayar ?? '-' }})
                </span>
            </div>
        </div>

        <div class="w-full flex flex-col md:flex-row gap-4 md:gap-12 text-sm bg-gray-50/50 p-4 rounded-xl border border-gray-50">
            <div class="flex-1 w-full overflow-hidden">
                <p class="font-bold text-gray-900 text-[11px] uppercase tracking-wider mb-3 text-blue-600">Rincian Layanan:</p>
                <ul class="space-y-2 text-gray-600 font-medium text-xs">
                    @forelse($order->layanans as $layanan)
                    <li class="flex justify-between">
                        <span><i class='bx bx-water mr-1 text-gray-400'></i> {{ $layanan->nama_layanan }}</span>
                        <span>-</span>
                    </li>
                    @empty
                    <li class="flex justify-between">
                        <span><i class='bx bx-water mr-1 text-gray-400'></i> Layanan tidak diketahui</span>
                        <span>-</span>
                    </li>
                    @endforelse
                    @if($order->catatan)
                    <li class="mt-2 text-[10px] text-gray-400 italic">"{{ $order->catatan }}"</li>
                    @endif
                </ul>
            </div>
            
            <div class="flex-1 border-t md:border-t-0 md:border-l border-gray-200 pt-4 md:pt-0 md:pl-8 flex flex-col justify-end">
                <div class="flex justify-between items-end mb-2">
                    <span class="text-gray-500 font-medium">Tanggal Masuk</span>
                    <span class="font-bold text-gray-900 text-sm">{{ optional($order->jadwal)->tanggal ? \Carbon\Carbon::parse($order->jadwal->tanggal)->format('d M Y') : '-' }}</span>
                </div>
                <div class="flex justify-between items-end">
                    <span class="text-gray-500 font-bold uppercase text-[11px] tracking-widest mt-1">Total Biaya Akhir</span>
                    <span class="font-black text-blue-600 text-xl md:text-2xl tracking-tight">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <div class="w-full mt-6 flex justify-end">
            <button class="w-full sm:w-auto px-5 py-2 sm:py-2.5 bg-white border border-gray-200 text-gray-600 text-xs font-bold rounded-xl hover:bg-gray-50 transition shadow-sm items-center justify-center flex gap-2 w-auto">
                <i class='bx bx-download text-base'></i> Unduh Nota (.PDF)
            </button>
        </div>

    </div>
    @empty
    <div class="border-2 border-dashed border-gray-200 rounded-2xl p-10 text-center col-span-full">
        <div class="mx-auto w-16 h-16 bg-gray-50 text-gray-400 rounded-full flex items-center justify-center mb-4">
            <i class='bx bx-history text-3xl'></i>
        </div>
        <h4 class="text-gray-900 font-bold mb-1">Belum Ada Riwayat Pesanan</h4>
        <p class="text-gray-500 text-sm">Pesanan yang sudah selesai dan diambil akan muncul di sini.</p>
    </div>
    @endforelse

</div>
@endsection
