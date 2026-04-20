@extends('layouts.admin')

@section('title', 'Admin Dashboard - Fluid Ops')

@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-black text-slate-800 tracking-tight">Executive Dashboard</h2>
    <p class="text-slate-500 mt-1">Ringkasan performa dan data laundry Anda hari ini.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Revenue -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative overflow-hidden group hover:border-emerald-300 transition-colors">
        <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center text-2xl mb-4 group-hover:bg-emerald-600 group-hover:text-white transition-colors shadow-sm">
            <i class='bx bx-money'></i>
        </div>
        <h3 class="text-3xl font-black text-slate-800 mb-1">Rp {{ number_format($totalIncome, 0, ',', '.') }}</h3>
        <p class="text-sm font-semibold text-slate-500">Total Pendapatan Bersih</p>
    </div>

    <!-- Bookings -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative overflow-hidden group hover:border-blue-300 transition-colors">
        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-2xl mb-4 group-hover:bg-blue-600 group-hover:text-white transition-colors shadow-sm">
            <i class='bx bx-receipt'></i>
        </div>
        <h3 class="text-3xl font-black text-slate-800 mb-1">{{ $totalBookings }}</h3>
        <p class="text-sm font-semibold text-slate-500">Total Tiket Booking</p>
    </div>

    <!-- Active Customers -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative overflow-hidden group hover:border-violet-300 transition-colors">
        <div class="w-12 h-12 bg-violet-50 text-violet-600 rounded-xl flex items-center justify-center text-2xl mb-4 group-hover:bg-violet-600 group-hover:text-white transition-colors shadow-sm">
            <i class='bx bx-user'></i>
        </div>
        <h3 class="text-3xl font-black text-slate-800 mb-1">{{ $activeCustomers }}</h3>
        <p class="text-sm font-semibold text-slate-500">Pelanggan Aktif</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Top Services -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
            <i class='bx bx-trending-up text-indigo-500'></i> Layanan Terpopuler
        </h3>
        
        <div class="space-y-4">
            @forelse($topServices as $idx => $service)
            <div class="flex items-center gap-4 p-3 hover:bg-slate-50 rounded-xl transition">
                <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-500">
                    {{ $idx + 1 }}
                </div>
                <div class="flex-1">
                    <p class="font-bold text-slate-800">{{ $service->nama_layanan }}</p>
                    <p class="text-xs text-slate-500">Rp {{ number_format($service->harga, 0, ',', '.') }} • {{ $service->durasi }} Menit</p>
                </div>
                <div class="text-right">
                    <span class="inline-block bg-indigo-50 text-indigo-600 px-3 py-1 rounded-lg text-xs font-bold">{{ $service->pesanans_count }} Order</span>
                </div>
            </div>
            @empty
            <p class="text-sm text-slate-500 italic text-center py-4">Belum ada data pesanan</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
