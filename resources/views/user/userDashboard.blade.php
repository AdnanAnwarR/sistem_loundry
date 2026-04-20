@extends('layouts.user')

@section('title', 'Customer Dashboard - Fluid Ops')

@section('content')
<!-- Welcome Banner -->
<div class="bg-gradient-to-r from-blue-700 to-indigo-800 rounded-3xl p-6 md:p-10 text-white shadow-lg mb-8 relative overflow-hidden">
    <div class="absolute top-0 right-0 opacity-10 transform translate-x-1/4 -translate-y-1/4">
        <i class='bx bx-barcode-reader text-[200px]'></i>
    </div>
    <div class="relative z-10">
        <h2 class="text-sm font-semibold text-blue-100 mb-1">Selamat datang kembali,</h2>
        <h1 class="text-3xl md:text-4xl font-bold mb-4">Budi Santoso</h1>
        <p class="text-blue-100 mb-6 max-w-lg text-sm leading-relaxed">Booking dari rumah sekarang makin gampang! Cukup buat tiket booking, bawa pakaian ke kasir kami untuk ditimbang, dan bayar dengan mudah menggunakan Tunai atau QRIS.</p>
        <a href="/user/order" class="inline-flex items-center gap-2 bg-white text-blue-700 px-6 py-3 rounded-xl font-bold text-sm hover:bg-gray-50 transition-colors shadow-sm">
            <i class='bx bx-calendar-plus'></i> Buat Booking Sekarang
        </a>
    </div>
</div>

<h3 class="text-lg font-bold text-gray-900 mb-4">Pesanan / Booking Aktif</h3>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    @forelse($activeOrders as $order)
    <div class="bg-white p-6 rounded-2xl border-2 border-dashed border-blue-200 hover:border-blue-400 shadow-sm relative transition-colors overflow-hidden">
        @if(in_array($order->status, ['proses', 'dikonfirmasi']))
        <div class="absolute top-0 left-0 w-1.5 h-full bg-orange-400"></div>
        @endif

        <div class="flex justify-between items-start mb-4">
            @if($order->status == 'pending')
            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-blue-50 text-blue-700 text-xs font-bold rounded-full border border-blue-100">
                <i class='bx bx-store-alt'></i> Menunggu di Kasir
            </span>
            @else
            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-orange-50 text-orange-600 text-xs font-bold rounded-full">
                <span class="w-1.5 h-1.5 bg-orange-500 rounded-full animate-pulse"></span> Diproses Owner
            </span>
            @endif
        </div>
        
        <div class="text-center mb-6">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">ID Booking</p>
            <h4 class="text-3xl font-black text-gray-900 tracking-wider">#{{ $order->order_id }}</h4>
        </div>

        <div class="bg-gray-50 rounded-xl p-4 mb-4 text-sm">
            <div class="flex justify-between mb-2">
                <span class="text-gray-500">Tanggal Kedatangan</span>
                <span class="font-bold text-gray-900">{{ optional($order->jadwal)->tanggal ? \Carbon\Carbon::parse($order->jadwal->tanggal)->format('d M Y') : '-' }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Layanan Dipilih</span>
                <span class="font-bold text-gray-900">{{ $order->layanans->isEmpty() ? '-' : implode(', ', $order->layanans->pluck('nama_layanan')->toArray()) }}</span>
            </div>
        </div>
        
        @if($order->status == 'pending')
        <div class="flex items-center gap-3 bg-blue-50 p-3 rounded-xl border border-blue-100">
            <i class='bx bx-info-circle text-blue-600 text-xl flex-shrink-0'></i>
            <p class="text-[11px] text-blue-800 leading-tight">Tunjukkan ID Booking ini ke kasir. Harga final akan ditentukan setelah kasir menimbang pakaian Anda.</p>
        </div>
        @else
        <!-- Progress Bar untuk pesanan diproses -->
        <div class="mt-4">
            <div class="w-full bg-gray-100 rounded-full h-1.5 mb-2">
                <div class="bg-orange-400 h-1.5 rounded-full" style="width: 50%"></div>
            </div>
            <div class="flex justify-between text-[11px] font-bold">
                <span class="text-orange-500">Sedang Dicuci</span>
                <span class="text-gray-300">Siap Ambil</span>
            </div>
        </div>
        @endif
    </div>
    @empty
    <div class="col-span-full border-2 border-dashed border-gray-200 rounded-2xl p-10 text-center">
        <div class="mx-auto w-16 h-16 bg-gray-50 text-gray-400 rounded-full flex items-center justify-center mb-4">
            <i class='bx bx-list-ul text-3xl'></i>
        </div>
        <h4 class="text-gray-900 font-bold mb-1">Belum Ada Pesanan Aktif</h4>
        <p class="text-gray-500 text-sm">Silakan buat tiket booking baru untuk mulai menggunakan layanan kami.</p>
    </div>
    @endforelse
</div>

<!-- Quick Timeline Instructions -->
<div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm mb-8">
    <h3 class="text-base font-bold text-gray-900 mb-6">Cara Kerja Booking Kami</h3>
    <div class="flex flex-col md:flex-row gap-6 justify-between relative">
        <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-gray-100 -z-10 -translate-y-1/2"></div>
        
        <div class="flex flex-col items-center text-center bg-white">
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-bold text-xl mb-3 shadow-sm shadow-blue-100">1</div>
            <h4 class="font-bold text-gray-900 text-sm">Buat Booking</h4>
            <p class="text-xs text-gray-500 mt-1 max-w-[150px]">Pilih tanggal & layanan dari rumah via aplikasi.</p>
        </div>
        <div class="flex flex-col items-center text-center bg-white">
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-bold text-xl mb-3 shadow-sm shadow-blue-100">2</div>
            <h4 class="font-bold text-gray-900 text-sm">Timbang di Kasir</h4>
            <p class="text-xs text-gray-500 mt-1 max-w-[150px]">Kasir menimbang cucian dan menghitung total harga.</p>
        </div>
        <div class="flex flex-col items-center text-center bg-white">
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-bold text-xl mb-3 shadow-sm shadow-blue-100">3</div>
            <h4 class="font-bold text-gray-900 text-sm">Bayar (Cash/QRIS)</h4>
            <p class="text-xs text-gray-500 mt-1 max-w-[150px]">Status pesanan Anda akan berubah menjadi "Diproses".</p>
        </div>
        <div class="flex flex-col items-center text-center bg-white">
            <div class="w-12 h-12 bg-green-50 text-green-500 rounded-full flex items-center justify-center font-bold text-xl mb-3 shadow-sm shadow-green-100">
                <i class='bx bx-check'></i>
            </div>
            <h4 class="font-bold text-gray-900 text-sm">Selesai & Info WA</h4>
            <p class="text-xs text-gray-500 mt-1 max-w-[150px]">Anda akan menerima WA saat cucian wangi & siap diambil.</p>
        </div>
    </div>
</div>
@endsection
