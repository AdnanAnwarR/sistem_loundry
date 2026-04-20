@extends('layouts.user')

@section('title', 'Booking Laundry - Fluid Ops')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Tiket Booking Aktif</h1>
        <p class="text-sm text-gray-500 mt-1">Buat tiket booking baru untuk hari ini, lalu timbang cucian Anda di Kasir.</p>
    </div>
    <button onclick="document.getElementById('modal-tambah').classList.remove('hidden')" class="bg-blue-600 text-white px-5 py-2.5 rounded-xl font-semibold text-sm hover:bg-blue-700 transition flex items-center gap-2 shadow-md hover:shadow-lg">
        <i class='bx bx-calendar-plus text-lg'></i> Buat Booking
    </button>
</div>

<!-- List of Active Orders (Read, Update, Delete) -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden mb-8">
    <div class="p-5 border-b border-gray-100 bg-gray-50 flex items-center justify-between">
        <h3 class="font-bold text-gray-900 text-sm md:text-base">Daftar Booking Belum Selesai</h3>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[700px]">
            <thead>
                <tr class="text-xs text-gray-400 border-b border-gray-100 bg-white">
                    <th class="py-4 px-6 font-bold uppercase tracking-wider">ID Booking</th>
                    <th class="py-4 px-6 font-bold uppercase tracking-wider">Layanan Booking</th>
                    <th class="py-4 px-6 font-bold uppercase tracking-wider">Tgl Kedatangan</th>
                    <th class="py-4 px-6 font-bold uppercase tracking-wider">Status & Total Tagihan</th>
                    <th class="py-4 px-6 font-bold uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700 divide-y divide-gray-50">
                
                @forelse($activeOrders as $order)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-6 font-black text-xl text-blue-600 tracking-wider tooltip relative group">
                        #{{ $order->order_id }}
                    </td>
                    <td class="py-4 px-6">
                        <p class="font-semibold text-gray-900 leading-tight">{{ $order->layanans->isEmpty() ? '-' : implode(', ', $order->layanans->pluck('nama_layanan')->toArray()) }}</p>
                        <p class="text-[11px] text-gray-400 mt-0.5">Catatan: {{ $order->catatan ?? '-' }}</p>
                    </td>
                    <td class="py-4 px-6 text-gray-500 font-semibold">{{ optional($order->jadwal)->tanggal ? \Carbon\Carbon::parse($order->jadwal->tanggal)->format('d M Y') : '-' }}</td>
                    <td class="py-4 px-6">
                        @if($order->status == 'pending')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-gray-100 text-gray-600 text-[10px] tracking-wide font-bold uppercase rounded border border-gray-200 mb-1">
                            <i class='bx bx-time-five'></i> Menunggu Ditimbang
                        </span>
                        <p class="text-xs font-semibold text-gray-400 italic">Harga dihitung di Kasir</p>
                        @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 text-amber-600 text-[10px] font-bold uppercase rounded border border-amber-100 tracking-wide mb-1">
                            Sedang Diproses
                        </span>
                        <p class="text-sm font-bold text-blue-600">Rp {{ number_format($order->total_harga, 0, ',', '.') }} 
                            <span class="text-[10px] {{ $order->status_pembayaran == 'sudah_dibayar' ? 'text-green-500 bg-green-50' : 'text-red-500 bg-red-50' }} px-1 py-0.5 rounded ml-1 font-bold">{{ strtoupper(str_replace('_', ' ', $order->status_pembayaran)) }}</span>
                        </p>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-right">
                        @if($order->status == 'pending')
                        <span class="text-xs text-gray-400 italic font-semibold">Tunggu Kasir</span>
                        @else
                        <span class="text-xs text-gray-400 italic font-semibold">Laundry Berjalan</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500">
                        Belum ada tiket booking yang aktif.
                    </td>
                </tr>
                @endforelse
                
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL TAMBAH PESANAN (Create) -->
<div id="modal-tambah" class="hidden fixed inset-0 bg-gray-900/60 backdrop-blur-sm flex items-center justify-center z-[100] p-4">
    <div class="bg-white rounded-2xl w-full max-w-2xl overflow-hidden shadow-2xl animate-fade-in-up">
        <div class="bg-blue-600 p-6 text-white flex justify-between items-center relative overflow-hidden">
            <i class='bx bx-receipt absolute -right-4 -bottom-4 text-9xl opacity-20'></i>
            <div class="relative z-10">
                <h2 class="text-xl font-bold">Form Rekaman Booking</h2>
                <p class="text-blue-100 text-sm mt-1">Isi detail servis, lalu bawa pakaian ke kios kami.</p>
            </div>
            <button onclick="document.getElementById('modal-tambah').classList.add('hidden')" class="relative z-10 w-8 h-8 flex items-center justify-center rounded-lg bg-blue-700 hover:bg-white hover:text-blue-600 transition">
                <i class='bx bx-x text-xl'></i>
            </button>
        </div>
        
        <form action="{{ route('user.order.store') }}" method="POST" class="p-6 md:p-8">
            @csrf
            <div class="mb-4 p-4 bg-orange-50 border border-orange-100 rounded-xl flex gap-3">
                <i class='bx bx-info-circle text-orange-500 text-xl flex-shrink-0'></i>
                <p class="text-[11px] md:text-xs text-orange-800 font-medium">Ini hanya form booking awal. Total tagihan akhir akan ditentukan setelah <strong>Kasir menimbang cucian Anda</strong> dan Anda menyetujuinya.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                
                <!-- Input: Waktu Kedatangan -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pilih Tanggal Kedatangan ke Toko <span class="text-red-500">*</span></label>
                    <input type="date" name="tanggal" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm font-semibold text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                </div>

                <!-- Input: Layanan -->
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pilih Servis yang Diinginkan <span class="text-red-500">*</span></label>
                    <p class="text-xs text-gray-400 mb-3 block">Anda bisa memilih lebih dari satu layanan pencucian.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach($layanans as $layanan)
                        <label class="cursor-pointer relative">
                            <input type="checkbox" name="services[]" value="{{ $layanan->id }}" class="peer sr-only" {{ $loop->first ? 'checked' : '' }}>
                            <div class="p-4 rounded-xl border-2 border-gray-100 peer-checked:border-blue-500 peer-checked:bg-blue-50 hover:bg-gray-50 transition flex items-center gap-3">
                                <i class='bx bx-water text-2xl text-gray-400 peer-checked:text-blue-600'></i>
                                <div>
                                    <p class="text-xs font-bold text-gray-900">{{ $layanan->nama_layanan }}</p>
                                    <p class="text-[10px] text-blue-600 font-semibold mt-0.5">Mulai Rp {{ number_format($layanan->harga, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>
                
                <!-- Input: Catatan -->
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Catatan Khusus (Opsional)</label>
                    <textarea rows="2" name="catatan" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition resize-none" placeholder="Cth: Tolong pisahkan pakaian putih karena luntur..."></textarea>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-100">
                <button type="button" onclick="document.getElementById('modal-tambah').classList.add('hidden')" class="px-6 py-2.5 rounded-xl font-bold text-gray-500 border border-gray-200 hover:bg-gray-50 transition text-sm">Batal</button>
                <button type="submit" class="px-6 py-2.5 rounded-xl font-bold text-white bg-blue-600 hover:bg-blue-700 transition shadow-md text-sm flex items-center gap-2">
                    <i class='bx bx-receipt'></i> Buat ID Booking
                </button>
            </div>
        </form>
    </div>
</div>

@push('styles')
<style>
    .animate-fade-in-up {
        animation: fadeInUp 0.4s ease-out forwards;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endpush
@endsection
