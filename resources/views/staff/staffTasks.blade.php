@extends('layouts.staff')

@section('title', 'Tugas Harian Teknisi - Fluid Ops')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
    <div>
        <h2 class="text-2xl font-black text-slate-800 tracking-tight">Jadwal Tugas Harian</h2>
        <p class="text-slate-500 mt-1">Daftar pekerjaan laundry yang dialokasikan dan sedang Anda kerjakan.</p>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
    
    <!-- Kolom Kiri: Pekerjaan Anda (Sedang Diproses) -->
    <div>
        <div class="flex items-center gap-2 mb-4">
            <div class="w-8 h-8 rounded bg-amber-100 text-amber-600 flex items-center justify-center font-black">
                <i class='bx bx-loader-circle bx-spin text-xl'></i>
            </div>
            <h3 class="text-lg font-bold text-slate-800">Sedang Anda Kerjakan</h3>
            <span class="ml-auto bg-slate-200 text-slate-700 text-xs font-bold px-2 py-0.5 rounded-full">{{ $myTasks->count() }}</span>
        </div>

        <div class="space-y-4">
            @forelse($myTasks as $task)
            <div class="bg-white p-5 rounded-2xl border-2 border-amber-200 shadow-sm relative group transition-all">
                <div class="absolute top-0 left-0 w-1.5 h-full bg-amber-400"></div>
                
                <div class="flex justify-between items-start mb-3">
                    <span class="bg-amber-100 text-amber-700 text-[10px] font-bold uppercase px-2 py-0.5 rounded tracking-wider border border-amber-200">
                        Diproses
                    </span>
                    <span class="text-xs font-bold text-slate-400">ID: #{{ $task->order_id }}</span>
                </div>

                <div class="mb-4">
                    <p class="text-sm font-semibold text-slate-800 mb-1">
                        {{ $task->layanans->isEmpty() ? 'Layanan Tidak Diketahui' : implode(' + ', $task->layanans->pluck('nama_layanan')->toArray()) }}
                    </p>
                    <p class="text-xs text-slate-500"><i class='bx bx-user mr-1'></i> {{ optional($task->pelanggan)->name ?? 'Anonim' }}</p>
                    @if($task->catatan)
                    <p class="text-[10px] italic text-slate-400 mt-1 bg-slate-50 p-1.5 rounded border border-slate-100">"{{ $task->catatan }}"</p>
                    @endif
                </div>

                <div class="flex items-center justify-between pt-3 border-t border-slate-100">
                    <span class="text-[10px] font-semibold text-slate-400 uppercase tracking-widest flex items-center gap-1">
                        <i class='bx bx-time-five'></i> Sejak {{ $task->updated_at->diffForHumans() }}
                    </span>
                    
                    <form action="{{ route('staff.updateStatus', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="selesai">
                        <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-xs font-bold rounded-lg shadow-sm transition flex items-center gap-1.5">
                            <i class='bx bx-check-double text-base'></i> Tandai Selesai
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="border-2 border-dashed border-slate-200 rounded-2xl p-8 text-center bg-slate-50">
                <div class="w-12 h-12 bg-white text-slate-300 rounded-full flex items-center justify-center mx-auto mb-3 shadow-sm border border-slate-100">
                    <i class='bx bx-check-shield text-2xl'></i>
                </div>
                <p class="text-sm font-bold text-slate-600 mb-1">Semua beres!</p>
                <p class="text-[11px] text-slate-400">Anda tidak memiliki pekerjaan yang sedang diproses.</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Kolom Kanan: Pekerjaan Tersedia -->
    <div>
        <div class="flex items-center gap-2 mb-4">
            <div class="w-8 h-8 rounded bg-blue-100 text-blue-600 flex items-center justify-center font-black">
                <i class='bx bx-list-check text-xl'></i>
            </div>
            <h3 class="text-lg font-bold text-slate-800">Tugas Tersedia</h3>
            <span class="ml-auto bg-slate-200 text-slate-700 text-xs font-bold px-2 py-0.5 rounded-full">{{ $availableTasks->count() }}</span>
        </div>

        <div class="space-y-4">
            @forelse($availableTasks as $task)
            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow relative group transition-all hover:border-blue-200">
                
                <div class="flex justify-between items-start mb-3">
                    <span class="bg-slate-100 text-slate-600 text-[10px] font-bold uppercase px-2 py-0.5 rounded tracking-wider border border-slate-200">
                        {{ $task->status == 'pending' ? 'Belum Dikonfirmasi Kasir' : 'Siap Dikerjakan' }}
                    </span>
                    <span class="text-xs font-bold text-slate-400">ID: #{{ $task->order_id }}</span>
                </div>

                <div class="mb-4">
                    <p class="text-sm font-semibold text-slate-800 mb-1">
                        {{ $task->layanans->isEmpty() ? 'Layanan Tidak Diketahui' : implode(' + ', $task->layanans->pluck('nama_layanan')->toArray()) }}
                    </p>
                    <p class="text-xs text-slate-500"><i class='bx bx-user mr-1'></i> {{ optional($task->pelanggan)->name ?? 'Anonim' }}</p>
                </div>

                <div class="flex justify-end pt-3 border-t border-slate-100">
                    <form action="{{ route('staff.updateStatus', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="proses">
                        <button type="submit" class="px-4 py-2 bg-blue-50 border border-blue-200 hover:bg-blue-600 hover:text-white text-blue-700 text-xs font-bold rounded-lg transition flex items-center gap-1.5 w-full sm:w-auto" {{ $task->status == 'pending' ? 'disabled title="Masih Pending"' : '' }}>
                            <i class='bx bx-play-circle text-base'></i> Ambil Tugas Ini
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="border-2 border-dashed border-slate-200 rounded-2xl p-8 text-center bg-slate-50">
                <p class="text-sm font-bold text-slate-500">Tidak ada antrean tugas baru saat ini.</p>
            </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
