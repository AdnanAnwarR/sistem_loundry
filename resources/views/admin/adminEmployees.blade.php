@extends('layouts.admin')

@section('title', 'Employee Directory - Fluid Ops')

@section('content')
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-8 gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Employee Directory</h2>
                    <p class="text-gray-500 text-sm mt-1">Manage your service staff, monitor real-time availability, and coordinate operational flow.</p>
                </div>
                <button onclick="openModal('modal-add-employee')" class="px-5 py-2.5 bg-blue-600 text-white rounded-xl text-sm font-medium hover:bg-blue-700 flex items-center gap-2 shadow-sm transition"><i class='bx bx-plus'></i> Add Employee</button>
            </div>

            @php
                $totalEmployees = $employees->count();
                $activeEmployees = $employees->where('is_active', true)->count();
                $inactiveEmployees = $employees->where('is_active', false)->count();
            @endphp
            <!-- Stats -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-8 flex justify-between items-center">
                <div>
                    <p class="text-xs text-gray-400 font-bold tracking-wider mb-2 uppercase">Total Workforce</p>
                    <h3 class="text-4xl font-bold text-gray-800">{{ $totalEmployees }}</h3>
                </div>
                <div class="flex gap-8">
                    <div class="text-right">
                        <p class="text-xs text-gray-400 font-bold tracking-wider mb-2 uppercase">Active</p>
                        <h3 class="text-2xl font-bold text-blue-600">{{ $activeEmployees }}</h3>
                    </div>
                    <div class="text-right border-l pl-8 border-gray-100">
                        <p class="text-xs text-gray-400 font-bold tracking-wider mb-2 uppercase">Nonactive</p>
                        <h3 class="text-2xl font-bold text-gray-500">{{ $inactiveEmployees }}</h3>
                    </div>
                </div>
            </div>

            <!-- Table Area -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                <!-- Toolbar -->
                <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-white">
                    <div class="relative w-64">
                         <i class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400'></i>
                         <input type="text" placeholder="Search employees..." class="w-full bg-gray-50 border border-gray-200 rounded-lg py-2 pl-9 pr-4 text-sm focus:outline-none focus:border-blue-400">
                    </div>
                    <div class="flex gap-3">
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 flex items-center gap-2"><i class='bx bx-filter'></i> Filters</button>
                        <button class="px-4 py-2 border border-blue-50 text-blue-600 rounded-lg text-sm font-medium hover:bg-blue-50 flex items-center gap-2 bg-white"><i class='bx bx-sort'></i> Sorted by: Recently Active</button>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[800px]">
                        <thead>
                            <tr class="text-xs text-gray-400 border-b border-gray-100 uppercase">
                                <th class="py-4 px-6 font-semibold tracking-wider">Employee Name</th>
                                <th class="py-4 px-6 font-semibold tracking-wider">Role</th>
                                <th class="py-4 px-6 font-semibold tracking-wider">Contact Info</th>
                                <th class="py-4 px-6 font-semibold tracking-wider">Status</th>
                                <th class="py-4 px-6 font-semibold tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-700">
                            @forelse($employees as $staff)
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-blue-100 overflow-hidden flex items-center justify-center text-blue-600 font-bold">
                                            {{ strtoupper(substr($staff->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800">{{ $staff->name }}</p>
                                            <p class="text-xs text-gray-500">Employee ID: #FL-{{ str_pad($staff->id, 4, '0', STR_PAD_LEFT) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-medium">Layanan / Operasional</span>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-gray-800 text-sm">{{ $staff->email }}</p>
                                    <p class="text-xs text-gray-500">{{ $staff->no_hp ?? '-' }}</p>
                                </td>
                                <td class="py-4 px-6">
                                    @if($staff->is_active)
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold text-green-600 flex inline-flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-green-500"></span> Active</span>
                                    @else
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold text-gray-400 flex inline-flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-gray-300"></span> Banned</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-right flex flex-row items-center justify-end gap-2">
                                    <form action="{{ route('admin.users.toggle', $staff->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin mengubah status staff ini?');">
                                        @csrf
                                        @method('PUT')
                                        @if($staff->is_active)
                                            <button type="submit" class="px-3 py-1.5 rounded-lg text-red-600 bg-red-50 hover:bg-red-100 text-xs font-bold transition">Block</button>
                                        @else
                                            <button type="submit" class="px-3 py-1.5 rounded-lg text-green-600 bg-green-50 hover:bg-green-100 text-xs font-bold transition">Unblock</button>
                                        @endif
                                    </form>
                                    <form action="{{ route('admin.users.destroy', $staff->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus staff ini secara permanen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-8 h-8 rounded-lg text-gray-400 hover:text-red-600 hover:bg-red-50 flex items-center justify-center"><i class='bx bx-trash text-lg'></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center text-gray-500">
                                    <i class='bx bx-group text-4xl mb-2 text-gray-300'></i>
                                    <p>Belum ada data staff/teknisi.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Placeholder -->
                <div class="p-6 border-t border-gray-100 flex items-center justify-between">
                    <p class="text-sm text-gray-500">Menampilkan staff/teknisi terbaru</p>
                </div>
            </div>

        </div>

<!-- Modal Add Employee -->
<div id="modal-add-employee" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-2xl max-w-sm w-full shadow-xl overflow-hidden flex flex-col">
        <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
            <h3 class="font-bold text-slate-800">Tambah Akun Staff Baru</h3>
            <button onclick="closeModal('modal-add-employee')" class="text-slate-400 hover:text-slate-600"><i class='bx bx-x text-2xl'></i></button>
        </div>
        <form action="{{ route('admin.employees.store') }}" method="POST" class="p-6">
            @csrf
            <div class="grid gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Nama Staff</label>
                    <input type="text" name="name" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Alamat Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Nomor HP</label>
                    <input type="text" name="no_hp" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Password</label>
                    <input type="password" name="password" minlength="8" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-3">
                <button type="button" onclick="closeModal('modal-add-employee')" class="px-5 py-2 hover:bg-slate-50 text-slate-600 text-sm font-bold rounded-lg transition">Batal</button>
                <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-lg shadow-sm transition">Simpan</button>
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
</script>
@endpush
@endsection
