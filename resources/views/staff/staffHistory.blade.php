@extends('layouts.staff')

@section('title', 'Riwayat Pekerjaan - Fluid Ops')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row justify-between sm:items-end gap-4">
    <div>
        <h2 class="text-2xl font-black text-slate-800 tracking-tight">Riwayat Kinerja Anda</h2>
        <p class="text-slate-500 mt-1">Seluruh pesanan laundry yang telah tuntas Anda kerjakan.</p>
    </div>
    
    <div class="bg-blue-50 border border-blue-100 rounded-xl px-4 py-2 flex items-center gap-3">
        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center text-blue-600 font-bold shadow-sm border border-blue-100">
            <i class='bx bx-check-double text-xl'></i>
        </div>
        <div>
            <p class="text-[10px] uppercase font-bold text-blue-400 tracking-wider">Total Tuntas</p>
            <p class="text-xl font-black text-blue-700 leading-tight">{{ $historyTasks->count() }} <span class="text-sm font-medium">Tugas</span></p>
        </div>
    </div>
</div>

<div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500">
                    <th class="py-4 px-6 font-bold">Waktu Selesai</th>
                    <th class="py-4 px-6 font-bold">ID Pesanan</th>
                    <th class="py-4 px-6 font-bold">Layanan</th>
                    <th class="py-4 px-6 font-bold text-center">Status Akhir</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse($historyTasks as $task)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="py-4 px-6 text-slate-600 font-medium">
                        {{ $task->updated_at->format('d M Y') }}
                        <span class="block text-[11px] text-slate-400">{{ $task->updated_at->format('H:i') }} WIB</span>
                    </td>
                    <td class="py-4 px-6 font-bold text-slate-800">
                        #{{ $task->order_id }}
                    </td>
                    <td class="py-4 px-6">
                        <p class="font-semibold text-slate-700">{{ $task->layanans->isEmpty() ? 'Layanan Tidak Diketahui' : implode(' + ', $task->layanans->pluck('nama_layanan')->toArray()) }}</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Pelanggan: {{ optional($task->pelanggan)->name ?? '-' }}</p>
                    </td>
                    <td class="py-4 px-6 text-center">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-green-50 text-green-700 text-[10px] font-bold uppercase rounded-full border border-green-200">
                            <i class='bx bx-check-shield'></i> Selesai
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-12 text-center">
                        <div class="w-16 h-16 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class='bx bx-history text-3xl'></i>
                        </div>
                        <p class="text-sm font-bold text-slate-600">Belum Ada Riwayat Pekerjaan</p>
                        <p class="text-xs text-slate-400 mt-1">Riwayat akan muncul setelah Anda menuntaskan tugas.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
