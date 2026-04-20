@extends('layouts.admin')

@section('title', 'Jadwal Operasional - Fluid Ops')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row justify-between sm:items-end gap-4">
    <div>
        <h2 class="text-2xl font-black text-slate-800 tracking-tight">Manajemen Jadwal</h2>
        <p class="text-slate-500 mt-1">Kelola ketersediaan slot waktu dan kapasitas laundry.</p>
    </div>
    <button onclick="openModal('modal-add')" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class='bx bx-plus'></i> Tambah Jadwal
    </button>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden flex flex-col">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[800px]">
            <thead>
                <tr class="text-xs text-slate-400 bg-slate-50 border-b border-slate-100 uppercase tracking-wider">
                    <th class="py-4 px-6 font-bold">Tanggal</th>
                    <th class="py-4 px-6 font-bold">Slot Waktu</th>
                    <th class="py-4 px-6 font-bold text-center">Kapasitas Maks</th>
                    <th class="py-4 px-6 font-bold text-center">Terisi</th>
                    <th class="py-4 px-6 font-bold text-center">Status</th>
                    <th class="py-4 px-6 font-bold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm text-slate-700">
                @forelse($jadwals as $jadwal)
                <tr class="border-b border-slate-50 hover:bg-slate-50 transition">
                    <td class="py-4 px-6 font-bold text-slate-800">
                        {{ \Carbon\Carbon::parse($jadwal->tanggal)->isoFormat('dddd, D MMMM Y') }}
                    </td>
                    <td class="py-4 px-6">
                        <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-full text-xs font-bold">{{ $jadwal->slot_waktu }}</span>
                    </td>
                    <td class="py-4 px-6 text-center font-semibold">{{ $jadwal->kapasitas }}</td>
                    <td class="py-4 px-6 text-center font-semibold text-blue-600">{{ $jadwal->terisi }}</td>
                    <td class="py-4 px-6 text-center">
                        @if($jadwal->is_active)
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-green-100 text-green-700 uppercase">Aktif</span>
                        @else
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-500 uppercase">Nonaktif</span>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-right">
                        <button onclick="openEditModal({{ $jadwal->toJson() }})" class="w-9 h-9 flex justify-center items-center bg-amber-50 hover:bg-amber-100 text-amber-600 text-sm font-bold rounded-lg transition ml-auto">
                            <i class='bx bx-edit'></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-12 text-center text-slate-500">
                        <i class='bx bx-calendar-x text-4xl mb-2 text-slate-300'></i>
                        <p>Belum ada jadwal yang tersedia.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add -->
<div id="modal-add" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-2xl max-w-sm w-full shadow-xl overflow-hidden flex flex-col">
        <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
            <h3 class="font-bold text-slate-800">Tambah Jadwal Baru</h3>
            <button onclick="closeModal('modal-add')" class="text-slate-400 hover:text-slate-600"><i class='bx bx-x text-2xl'></i></button>
        </div>
        <form action="{{ route('admin.schedules.store') }}" method="POST" class="p-6">
            @csrf
            <div class="grid gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Tanggal</label>
                    <input type="date" name="tanggal" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Slot Waktu (Cth: 08:00 - 12:00)</label>
                    <input type="text" name="slot_waktu" required placeholder="08:00 - 12:00" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Kapasitas (Kg/Pcs Maksimal)</label>
                    <input type="number" name="kapasitas" min="1" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex items-center gap-2 mt-2">
                    <input type="checkbox" name="is_active" id="is_active_add" checked class="w-4 h-4 text-blue-600 rounded border-slate-300">
                    <label for="is_active_add" class="text-sm font-semibold text-slate-700">Aktif (Tersedia untuk Booking)</label>
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-3">
                <button type="button" onclick="closeModal('modal-add')" class="px-5 py-2 hover:bg-slate-50 text-slate-600 text-sm font-bold rounded-lg transition">Batal</button>
                <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-lg shadow-sm transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="modal-edit" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-2xl max-w-sm w-full shadow-xl overflow-hidden flex flex-col">
        <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
            <h3 class="font-bold text-slate-800">Edit Jadwal</h3>
            <button onclick="closeModal('modal-edit')" class="text-slate-400 hover:text-slate-600"><i class='bx bx-x text-2xl'></i></button>
        </div>
        <form id="editForm" method="POST" class="p-6">
            @csrf
            @method('PUT')
            <div class="grid gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Tanggal</label>
                    <input type="date" name="tanggal" id="edit_tanggal" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Slot Waktu</label>
                    <input type="text" name="slot_waktu" id="edit_slot_waktu" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Kapasitas</label>
                    <input type="number" name="kapasitas" id="edit_kapasitas" min="1" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex items-center gap-2 mt-2">
                    <input type="checkbox" name="is_active" id="edit_is_active" class="w-4 h-4 text-blue-600 rounded border-slate-300">
                    <label for="edit_is_active" class="text-sm font-semibold text-slate-700">Aktif</label>
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-3">
                <button type="button" onclick="closeModal('modal-edit')" class="px-5 py-2 hover:bg-slate-50 text-slate-600 text-sm font-bold rounded-lg transition">Batal</button>
                <button type="submit" class="px-5 py-2 bg-amber-500 hover:bg-amber-600 text-white text-sm font-bold rounded-lg shadow-sm transition">Update</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
    function openEditModal(jadwal) {
        document.getElementById('editForm').action = `/admin/schedules/${jadwal.id}`;
        document.getElementById('edit_tanggal').value = jadwal.tanggal;
        document.getElementById('edit_slot_waktu').value = jadwal.slot_waktu;
        document.getElementById('edit_kapasitas').value = jadwal.kapasitas;
        document.getElementById('edit_is_active').checked = jadwal.is_active;
        openModal('modal-edit');
    }
</script>
@endpush
@endsection
