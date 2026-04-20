@extends('layouts.staff')

@section('title', 'Dashboard Teknisi - Fluid Ops')

@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-black text-slate-800 tracking-tight">Halo, Teknisi! 👋</h2>
    <p class="text-slate-500 mt-1">Berikut adalah ringkasan pekerjaan Anda hari ini.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Card 1 -->
    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative overflow-hidden group hover:border-blue-300 transition-colors">
        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-24 h-24 rounded-full bg-slate-50 border-4 border-slate-100 group-hover:bg-blue-50 group-hover:border-blue-100 transition-colors"></div>
        <div class="relative z-10">
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-2xl mb-4 group-hover:bg-blue-600 group-hover:text-white transition-colors shadow-sm">
                <i class='bx bx-list-plus'></i>
            </div>
            <h3 class="text-4xl font-black text-slate-800 mb-1">{{ $availableTasks }}</h3>
            <p class="text-sm font-semibold text-slate-500">Tugas Baru Tersedia</p>
            <p class="text-[10px] text-slate-400 mt-2 flex items-center gap-1"><i class='bx bx-info-circle'></i> Siap diambil & dikerjakan</p>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-white rounded-2xl p-6 border border-amber-200 shadow-sm relative overflow-hidden group hover:border-amber-300 transition-colors">
        <div class="absolute top-0 left-0 w-1.5 h-full bg-amber-400"></div>
        <div class="relative z-10 pl-2">
            <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center text-2xl mb-4 group-hover:bg-amber-500 group-hover:text-white transition-colors shadow-sm">
                <i class='bx bx-loader-circle bx-spin'></i>
            </div>
            <h3 class="text-4xl font-black text-slate-800 mb-1">{{ $processingTasks }}</h3>
            <p class="text-sm font-semibold text-slate-500">Sedang Dikerjakan (Anda)</p>
            <p class="text-[10px] text-amber-600 font-medium mt-2 bg-amber-50 inline-block px-2 py-0.5 rounded">Dalam pantauan sistem</p>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-gradient-to-br from-blue-900 to-blue-800 rounded-2xl p-6 border border-blue-700 shadow-md relative overflow-hidden text-white">
        <!-- SVG Pattern -->
        <svg class="absolute bottom-0 right-0 opacity-10" width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M60 120C93.1371 120 120 93.1371 120 60C120 26.8629 93.1371 0 60 0C26.8629 0 0 26.8629 0 60C0 93.1371 26.8629 120 60 120Z" fill="currentColor"/>
        </svg>
        <div class="relative z-10">
            <div class="w-12 h-12 bg-white/10 backdrop-blur-sm text-blue-200 rounded-xl flex items-center justify-center text-2xl mb-4 border border-white/10 shadow-sm">
                <i class='bx bx-check-double'></i>
            </div>
            <h3 class="text-4xl font-black text-white mb-1">{{ $completedTasks }}</h3>
            <p class="text-sm font-semibold text-blue-200">Selesai Hari Ini</p>
            
            <a href="{{ route('staff.history') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-white mt-4 hover:underline">
                Lihat Riwayat <i class='bx bx-right-arrow-alt text-lg'></i>
            </a>
        </div>
    </div>
</div>

<!-- Shortcuts -->
<h3 class="text-lg font-bold text-slate-800 mb-4">Aksi Cepat</h3>
<div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col sm:flex-row gap-4 items-center justify-between">
    <div>
        <p class="font-bold text-slate-800">Cek Antrean Pekerjaan</p>
        <p class="text-sm text-slate-500">Lihat detail tugas baru yang siap Anda eksekusi.</p>
    </div>
    <a href="{{ route('staff.tasks') }}" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-xl shadow-md transition whitespace-nowrap">
        Buka Jadwal Tugas
    </a>
</div>
@endsection
