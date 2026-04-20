@extends('layouts.admin')

@section('title', 'Orders Management - Fluid Ops')

@section('content')
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-8 gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Orders Management</h2>
                    <p class="text-gray-500 text-sm mt-1">Monitor and process real-time laundry logistics and customer requests.</p>
                </div>
                {{-- <button class="px-5 py-2.5 bg-blue-600 text-white rounded-xl text-sm font-medium hover:bg-blue-700 flex items-center gap-2 shadow-sm transition"><i class='bx bx-plus'></i> New Order</button> --}}
            </div>

            @php
                $pendingOrders = $orders->where('status', 'pending')->count();
                $inDelivery = $orders->where('status', 'proses')->count();
                $completedToday = $orders->where('status', 'selesai')->filter(function($q) { return $q->updated_at && $q->updated_at->isToday(); })->count();
                $revenue24h = $orders->where('status', 'selesai')->filter(function($q) { return $q->updated_at && $q->updated_at->isToday(); })->sum('total_harga');
            @endphp
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">PENDING ORDERS</p>
                    <div class="flex items-end gap-4">
                        <h3 class="text-3xl font-bold text-gray-800">{{ $pendingOrders }}</h3>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">IN DELIVERY</p>
                    <div class="flex items-end gap-4">
                        <h3 class="text-3xl font-bold text-gray-800">{{ $inDelivery }}</h3>
                    </div>
                    <i class='bx bxs-truck absolute right-[-10px] bottom-[-10px] text-6xl text-gray-50 opacity-50'></i>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">COMPLETED TODAY</p>
                    <div class="flex items-end gap-4">
                        <h3 class="text-3xl font-bold text-gray-800">{{ $completedToday }}</h3>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2">REVENUE (TODAY)</p>
                    <div class="flex items-end gap-4">
                        <h3 class="text-3xl font-bold text-gray-800">Rp {{ number_format($revenue24h, 0, ',', '.') }}</h3>
                    </div>
                </div>
            </div>

            <!-- Table Area -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                <!-- Toolbar -->
                <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-white">
                    <div class="flex gap-3">
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 flex items-center gap-2"><i class='bx bx-filter-alt'></i> All Statuses <i class='bx bx-chevron-down ml-2'></i></button>
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 flex items-center gap-2"><i class='bx bx-calendar'></i> Last 7 Days <i class='bx bx-chevron-down ml-2'></i></button>
                    </div>
                    <button class="px-4 py-2 text-sm font-medium text-gray-600 flex items-center gap-2 hover:bg-gray-50 rounded-lg"><i class='bx bx-sort-alt-2'></i> Sort by: Date (Newest) <i class='bx bx-chevron-down'></i></button>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[800px]">
                        <thead>
                            <tr class="text-xs text-gray-400 bg-gray-50 border-b border-gray-100">
                                <th class="py-3 px-6 font-semibold uppercase">Order ID</th>
                                <th class="py-3 px-6 font-semibold uppercase">Customer</th>
                                <th class="py-3 px-6 font-semibold uppercase">Service Type</th>
                                <th class="py-3 px-6 font-semibold uppercase">Weight (KG)</th>
                                <th class="py-3 px-6 font-semibold uppercase">Price</th>
                                <th class="py-3 px-6 font-semibold uppercase">Date</th>
                                <th class="py-3 px-6 font-semibold uppercase">Status</th>
                                <th class="py-3 px-6 font-semibold uppercase text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-700">
                            @forelse($orders as $pesanan)
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 px-6 font-medium text-blue-600">
                                    <div class="flex flex-col">
                                        <span>#{{ $pesanan->order_id ?? 'ORD-'.$pesanan->id }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 font-bold flex items-center justify-center text-xs">
                                            {{ strtoupper(substr($pesanan->pelanggan->name ?? 'User', 0, 2)) }}
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="font-medium text-gray-800">{{ $pesanan->pelanggan->name ?? 'Unknown' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    @foreach($pesanan->layanans as $lyn)
                                        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-medium mr-1">{{ $lyn->nama_layanan }}</span>
                                    @endforeach
                                </td>
                                <td class="py-4 px-6 text-gray-500">{{ $pesanan->berat }} kg</td>
                                <td class="py-4 px-6 font-medium">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                                <td class="py-4 px-6 text-gray-500 text-xs">{{ $pesanan->created_at->format('M d, Y') }}</td>
                                <td class="py-4 px-6">
                                    @if($pesanan->status == 'pending')
                                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-yellow-50 text-yellow-600 border border-yellow-100">PENDING</span>
                                    @elseif($pesanan->status == 'dikonfirmasi')
                                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-600 border border-blue-100">DIKONFIRMASI</span>
                                    @elseif($pesanan->status == 'proses')
                                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-purple-50 text-purple-600 border border-purple-100">PROSES</span>
                                    @elseif($pesanan->status == 'selesai')
                                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-50 text-green-600 border border-green-100">SELESAI</span>
                                    @elseif($pesanan->status == 'dibatalkan' || $pesanan->status == 'ditolak')
                                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-red-50 text-red-600 border border-red-100">{{ strtoupper($pesanan->status) }}</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-right flex flex-row items-center justify-end gap-2">
                                    <form action="{{ route('admin.orders.update', $pesanan->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" onchange="this.form.submit()" class="text-xs border border-gray-200 rounded-lg px-2 py-1.5 focus:outline-none focus:border-blue-400 bg-white shadow-sm cursor-pointer hover:bg-gray-50">
                                            <option value="pending" {{ $pesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="dikonfirmasi" {{ $pesanan->status == 'dikonfirmasi' ? 'selected' : '' }}>Konfirmasi</option>
                                            <option value="proses" {{ $pesanan->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                            <option value="selesai" {{ $pesanan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                            <option value="ditolak" {{ $pesanan->status == 'ditolak' ? 'selected' : '' }}>Tolak</option>
                                        </select>
                                    </form>
                                    <form action="{{ route('admin.orders.destroy', $pesanan->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus pesanan ini secara permanen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-8 h-8 rounded-lg text-gray-400 hover:text-red-600 hover:bg-red-50 flex items-center justify-center"><i class='bx bx-trash text-lg'></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="py-12 text-center text-gray-500">
                                    <i class='bx bx-receipt text-4xl mb-2 text-gray-300'></i>
                                    <p>Belum ada pesanan ditemukan.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Placeholder -->
                <div class="p-6 border-t border-gray-100 flex items-center justify-between">
                    <p class="text-sm text-gray-500">Menampilkan pesanan terbaru</p>
                </div>
            </div>

        </div>
@endsection
