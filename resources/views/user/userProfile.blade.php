@extends('layouts.user')

@section('title', 'Profil Saya - Fluid Ops')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Profil Saya</h1>
    <p class="text-sm text-gray-500 mt-1">Kelola data diri, kontak, alamat, dan kata sandi akun Anda.</p>
</div>

<div class="flex flex-col lg:flex-row gap-8">
    
    <!-- Profile Display / Quick Change -->
    <div class="w-full lg:w-1/3">
        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 flex flex-col items-center justify-center relative overflow-hidden text-center mb-6">
            <div class="absolute top-0 w-full h-32 bg-gradient-to-r from-blue-500 to-blue-600 opacity-10"></div>
            <div class="relative w-24 h-24 mt-4 mb-4">
                <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=2563eb&color=fff&size=200" alt="Budi Santoso" class="w-full h-full object-cover rounded-full border-4 border-white shadow-md">
                <button class="absolute bottom-0 right-0 w-8 h-8 bg-white border border-gray-200 rounded-full flex items-center justify-center text-blue-600 hover:bg-gray-50 shadow-sm tooltip" title="Ubah Foto">
                    <i class='bx bx-camera'></i>
                </button>
            </div>
            <h2 class="text-xl font-bold text-gray-900">Budi Santoso</h2>
            <p class="text-sm text-gray-500 mb-6">budi.santoso@example.com</p>
            
            <div class="w-full grid grid-cols-2 gap-4 border-t border-gray-100 pt-6">
                <div>
                    <p class="text-2xl font-bold text-blue-600">12</p>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Laundry Aktif</p>
                </div>
                <div>
                    <p class="text-2xl font-bold text-green-500">45</p>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Selesai</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Form Data -->
    <div class="w-full lg:w-2/3">
        <!-- Update Info Akun -->
        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden mb-8">
            <div class="p-6 border-b border-gray-50 bg-gray-50/50">
                <h3 class="font-bold text-gray-900 flex items-center gap-2"><i class='bx bx-user-circle text-blue-600 text-xl'></i> Informasi Pribadi</h3>
            </div>
            <form action="#" class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <i class='bx bx-user absolute left-4 top-1/2 -translate-y-1/2 text-gray-400'></i>
                            <input type="text" value="Budi Santoso" class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <i class='bx bx-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400'></i>
                            <input type="email" value="budi.santoso@example.com" class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon (WhatsApp)</label>
                        <div class="relative">
                            <i class='bx bx-phone absolute left-4 top-1/2 -translate-y-1/2 text-gray-400'></i>
                            <input type="tel" value="081234567890" class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Domisili Utama</label>
                        <textarea rows="3" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none">Jl. Kenari No. 12, RT 01/RW 03, Kel. Suka Jaya, Kec. Sukabumi</textarea>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2.5 rounded-xl font-semibold text-sm hover:bg-blue-700 transition shadow-sm hover:shadow-md flex items-center gap-2">
                        <i class='bx bx-save'></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <!-- Update Keamanan (Password) -->
        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden border-t-4 border-t-red-500">
            <div class="p-6 border-b border-gray-50 bg-gray-50/50">
                <h3 class="font-bold text-gray-900 flex items-center gap-2"><i class='bx bx-lock-alt text-red-500 text-xl'></i> Keamanan Akun</h3>
            </div>
            <form action="#" class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kata Sandi Lama</label>
                        <div class="relative">
                            <i class='bx bx-key absolute left-4 top-1/2 -translate-y-1/2 text-gray-400'></i>
                            <input type="password" placeholder="••••••••" class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-red-200 focus:border-red-400 transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kata Sandi Baru</label>
                        <div class="relative">
                            <i class='bx bx-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400'></i>
                            <input type="password" placeholder="Minimal 8 karakter" class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-red-200 focus:border-red-400 transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Kata Sandi</label>
                        <div class="relative">
                            <i class='bx bx-lock-alt absolute left-4 top-1/2 -translate-y-1/2 text-gray-400'></i>
                            <input type="password" placeholder="Ulangi kata sandi baru" class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-red-200 focus:border-red-400 transition">
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="bg-red-50 text-red-600 border border-red-100 px-6 py-2.5 rounded-xl font-semibold text-sm hover:bg-red-600 hover:text-white transition shadow-sm flex items-center gap-2">
                        <i class='bx bx-refresh'></i> Perbarui Kata Sandi
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
