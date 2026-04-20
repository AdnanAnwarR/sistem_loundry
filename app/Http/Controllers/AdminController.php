<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Jadwal;
use App\Models\Layanan;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // ==========================================
    // DASHBOARD
    // ==========================================
    public function dashboard()
    {
        $totalIncome = Pesanan::where('status', 'selesai')->sum('total_harga');
        $totalBookings = Pesanan::count();
        $activeCustomers = User::where('role', 'pelanggan')->where('is_active', true)->count();
        
        $topServices = Layanan::withCount('pesanans')
            ->orderBy('pesanans_count', 'desc')
            ->take(5)
            ->get();

        return view('admin.adminDashboard', compact('totalIncome', 'totalBookings', 'activeCustomers', 'topServices'));
    }

    // ==========================================
    // SERVICES (LAYANAN)
    // ==========================================
    public function services()
    {
        $layanans = Layanan::orderBy('created_at', 'desc')->get();
        return view('admin.adminServices', compact('layanans'));
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'durasi' => 'required|integer|min:1',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? true : false;
        
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('layanan', 'public');
        }

        Layanan::create($data);
        return back()->with('success', 'Layanan laundry baru berhasil ditambahkan!');
    }

    public function updateService(Request $request, Layanan $layanan)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'durasi' => 'required|integer|min:1',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? true : false;

        if ($request->hasFile('foto')) {
            if ($layanan->foto) Storage::disk('public')->delete($layanan->foto);
            $data['foto'] = $request->file('foto')->store('layanan', 'public');
        }

        $layanan->update($data);
        return back()->with('success', 'Layanan laundry berhasil diperbarui!');
    }

    public function deleteService(Layanan $layanan)
    {
        if ($layanan->foto) Storage::disk('public')->delete($layanan->foto);
        $layanan->delete();
        return back()->with('success', 'Layanan berhasil dihapus!');
    }

    // ==========================================
    // SCHEDULES (JADWAL)
    // ==========================================
    public function schedules()
    {
        $jadwals = Jadwal::orderBy('tanggal', 'desc')->get();
        return view('admin.adminSchedules', compact('jadwals'));
    }

    public function storeSchedule(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date|unique:jadwal,tanggal',
            'slot_waktu' => 'required|string',
            'kapasitas' => 'required|integer|min:1',
        ]);

        $data = $request->all();
        $data['terisi'] = 0;
        $data['is_active'] = $request->has('is_active') ? true : false;

        Jadwal::create($data);
        return back()->with('success', 'Jadwal operasional baru berhasil dibuat!');
    }

    public function updateSchedule(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'tanggal' => 'required|date|unique:jadwal,tanggal,'.$jadwal->id,
            'slot_waktu' => 'required|string',
            'kapasitas' => 'required|integer|min:1',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? true : false;
        
        $jadwal->update($data);
        return back()->with('success', 'Detail Jadwal berhasil diubah!');
    }


    // ==========================================
    // ORDERS (BOOKING)
    // ==========================================
    public function orders(Request $request)
    {
        $query = Pesanan::with(['pelanggan', 'layanans', 'jadwal']);

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $orders = $query->orderBy('created_at', 'desc')->get();
        return view('admin.adminOrders', compact('orders'));
    }

    public function updateOrderStatus(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'status' => 'required|in:pending,dikonfirmasi,proses,selesai,dibatalkan,ditolak'
        ]);

        $pesanan->status = $request->status;
        $pesanan->save();

        return back()->with('success', 'Status Pesanan ' . $pesanan->order_id . ' dimutakhirkan menjadi ' . strtoupper($request->status));
    }

    public function deleteOrder(Pesanan $pesanan)
    {
        $pesanan->delete();
        return back()->with('success', 'Pesanan berhasil dihapus secara permanen!');
    }


    // ==========================================
    // USERS (EMPLOYEES & CUSTOMERS)
    // ==========================================
    public function customers()
    {
        $customers = User::where('role', 'pelanggan')->orderBy('created_at', 'desc')->get();
        return view('admin.adminCustomers', compact('customers'));
    }

    public function employees()
    {
        $employees = User::where('role', 'staff')->orderBy('created_at', 'desc')->get();
        return view('admin.adminEmployees', compact('employees'));
    }

    public function storeEmployee(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'no_hp' => 'nullable|string|max:20',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => 'staff',
            'is_active' => true,
        ]);

        return back()->with('success', 'Akun Staff/Teknisi baru berhasil dibuat!');
    }

    public function toggleUserStatus(User $user)
    {
        // Tolak jika admin menonaktifkan dirinya sendiri
        if ($user->id === Auth::id()) {
            return back()->with('success', 'Anda tidak dapat memblokir akun Anda sendiri!');
        }

        $user->is_active = !$user->is_active;
        $user->save();

        $state = $user->is_active ? 'Diaktifkan' : 'Dinonaktifkan';
        return back()->with('success', 'Akun ' . $user->name . ' Berhasil ' . $state . '!');
    }

    public function deleteUser(User $user)
    {
        // Tolak jika admin menghapus dirinya sendiri
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri!');
        }

        $user->delete();
        return back()->with('success', 'Akun pengguna berhasil dihapus!');
    }

}
