@extends('layouts.admin')

@section('title', 'Manajemen Layanan - Fluid Ops')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row justify-between sm:items-end gap-4">
    <div>
        <h2 class="text-2xl font-black text-slate-800 tracking-tight">Manajemen Layanan</h2>
        <p class="text-slate-500 mt-1">Kelola jenis paket pencucian, harga, dan durasi.</p>
    </div>
    <button onclick="openModal('modal-add')" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-sm transition flex items-center gap-2">
        <i class='bx bx-plus'></i> Tambah Layanan
    </button>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($layanans as $layanan)
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden group hover:border-blue-300 transition-colors relative flex flex-col">
        <!-- Status Badge -->
        <div class="absolute top-4 right-4 z-10">
            @if($layanan->is_active)
            <span class="bg-green-100 text-green-700 text-[10px] font-bold uppercase px-2 py-1 rounded shadow-sm">Aktif</span>
            @else
            <span class="bg-slate-100 text-slate-500 text-[10px] font-bold uppercase px-2 py-1 rounded shadow-sm">Nonaktif</span>
            @endif
        </div>
        
        <!-- Image placeholder / actual image -->
        <div class="h-40 bg-slate-100 w-full flex items-center justify-center relative overflow-hidden">
            @if($layanan->foto)
            <img src="{{ asset('storage/' . $layanan->foto) }}" class="w-full h-full object-cover">
            @else
            <i class='bx bx-image text-5xl text-slate-300'></i>
            @endif
        </div>

        <div class="p-5 flex-1 flex flex-col">
            <h3 class="font-black text-lg text-slate-800 mb-1">{{ $layanan->nama_layanan }}</h3>
            <p class="text-sm font-bold text-blue-600 mb-3">Rp {{ number_format($layanan->harga, 0, ',', '.') }}</p>
            
            <p class="text-xs text-slate-500 mb-4 line-clamp-3 flex-1">{{ $layanan->deskripsi ?? 'Tidak ada deskripsi' }}</p>
            
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 border-t border-slate-100 pt-4 mb-4">
                <i class='bx bx-time-five text-slate-400'></i> Estimasi: {{ $layanan->durasi }} Menit
            </div>
            
            <div class="flex items-center gap-2 mt-auto">
                <button onclick="openEditModal({{ $layanan->toJson() }})" class="flex-1 py-2 bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-bold rounded-lg border border-slate-200 transition">
                    <i class='bx bx-edit'></i> Edit
                </button>
                <form action="{{ route('admin.services.destroy', $layanan->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus layanan ini secara permanen?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-9 h-9 flex justify-center items-center bg-red-50 hover:bg-red-100 text-red-600 text-sm font-bold rounded-lg border border-red-100 transition">
                        <i class='bx bx-trash'></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full py-12 text-center bg-white border border-slate-200 rounded-2xl shadow-sm">
        <i class='bx bx-cube text-5xl text-slate-300 mb-3'></i>
        <h4 class="font-bold text-slate-700">Belum Ada Layanan</h4>
        <p class="text-sm text-slate-500 mt-1">Silakan tambahkan data layanan cuci pertama Anda.</p>
    </div>
    @endforelse
</div>

<!-- Modal Add -->
<div id="modal-add" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-2xl max-w-lg w-full shadow-xl overflow-hidden max-h-[90vh] flex flex-col">
        <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
            <h3 class="font-bold text-slate-800">Tambah Layanan Baru</h3>
            <button onclick="closeModal('modal-add')" class="text-slate-400 hover:text-slate-600"><i class='bx bx-x text-2xl'></i></button>
        </div>
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="overflow-y-auto p-6 flex-1">
            @csrf
            <div class="grid gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Nama Layanan</label>
                    <input type="text" name="nama_layanan" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Harga (Rp)</label>
                        <input type="number" name="harga" min="0" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Durasi / Estimasi Pengerjaan (Menit)</label>
                        <input type="number" name="durasi" min="1" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Upload Foto (Opsional)</label>
                    <input type="file" name="foto" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
                <div class="flex items-center gap-2 mt-2">
                    <input type="checkbox" name="is_active" id="is_active_add" checked class="w-4 h-4 text-blue-600 rounded border-slate-300">
                    <label for="is_active_add" class="text-sm font-semibold text-slate-700">Tersedia / Aktif</label>
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-3">
                <button type="button" onclick="closeModal('modal-add')" class="px-5 py-2 hover:bg-slate-50 text-slate-600 text-sm font-bold rounded-lg transition">Batal</button>
                <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-lg shadow-sm transition">Simpan Layanan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div id="modal-edit" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-2xl max-w-lg w-full shadow-xl overflow-hidden max-h-[90vh] flex flex-col">
        <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
            <h3 class="font-bold text-slate-800">Edit Layanan</h3>
            <button onclick="closeModal('modal-edit')" class="text-slate-400 hover:text-slate-600"><i class='bx bx-x text-2xl'></i></button>
        </div>
        <form id="editForm" method="POST" enctype="multipart/form-data" class="overflow-y-auto p-6 flex-1">
            @csrf
            @method('PUT')
            <div class="grid gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Nama Layanan</label>
                    <input type="text" name="nama_layanan" id="edit_nama" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Harga (Rp)</label>
                        <input type="number" name="harga" id="edit_harga" min="0" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Durasi / Estimasi Pengerjaan (Menit)</label>
                        <input type="number" name="durasi" id="edit_durasi" min="1" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" id="edit_deskripsi" rows="3" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Upload Foto Baru (opsional, akan menggantikan foto lama)</label>
                    <input type="file" name="foto" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
                </div>
                <div class="flex items-center gap-2 mt-2">
                    <input type="checkbox" name="is_active" id="edit_is_active" class="w-4 h-4 text-blue-600 rounded border-slate-300">
                    <label for="edit_is_active" class="text-sm font-semibold text-slate-700">Tersedia / Aktif</label>
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-3">
                <button type="button" onclick="closeModal('modal-edit')" class="px-5 py-2 hover:bg-slate-50 text-slate-600 text-sm font-bold rounded-lg transition">Batal</button>
                <button type="submit" class="px-5 py-2 bg-amber-500 hover:bg-amber-600 text-white text-sm font-bold rounded-lg shadow-sm transition">Update Layanan</button>
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
    function openEditModal(layanan) {
        document.getElementById('editForm').action = `/admin/services/${layanan.id}`;
        document.getElementById('edit_nama').value = layanan.nama_layanan;
        document.getElementById('edit_harga').value = Math.floor(layanan.harga);
        document.getElementById('edit_durasi').value = layanan.durasi;
        document.getElementById('edit_deskripsi').value = layanan.deskripsi || '';
        document.getElementById('edit_is_active').checked = layanan.is_active;
        openModal('modal-edit');
    }
</script>
@endpush
@endsection
