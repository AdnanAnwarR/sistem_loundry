<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Layanan;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Dashboard User (Memantau booking aktif)
    public function dashboard()
    {
        $user_id = Auth::id();
        $activeOrders = Pesanan::with(['layanans', 'jadwal'])
            ->where('user_id', $user_id)
            ->whereNotIn('status', ['selesai', 'dibatalkan', 'ditolak'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.userDashboard', compact('activeOrders'));
    }

    // Halaman Pesanan Aktif (Booking)
    public function order()
    {
        $user_id = Auth::id();
        
        $activeOrders = Pesanan::with(['layanans', 'jadwal'])
            ->where('user_id', $user_id)
            ->whereNotIn('status', ['selesai', 'dibatalkan', 'ditolak'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        $layanans = Layanan::where('is_active', true)->get();

        return view('user.userOrder', compact('activeOrders', 'layanans'));
    }

    // Memproses Booking Laundry Baru
    public function storeOrder(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'services' => 'required|array|min:1',
            'services.*' => 'exists:layanan,id',
            'catatan' => 'nullable|string'
        ]);

        $user_id = Auth::id();
        
        // Cek apakah jadwal sudah ada, jika belum buat otomatis
        $jadwal = Jadwal::firstOrCreate(
            ['tanggal' => $request->tanggal],
            [
                'slot_waktu' => '08:00 - 20:00',
                'kapasitas' => 50,
                'terisi' => 0
            ]
        );

        $jadwal->increment('terisi');

        // Buat Order ID unik (misal BKG-1234)
        $order_id = 'BKG-' . rand(10000, 99999);

        // Buat Pesanan Baru
        $pesanan = Pesanan::create([
            'user_id' => $user_id,
            'jadwal_id' => $jadwal->id,
            'order_id' => $order_id,
            'total_harga' => 0, // Akan diset kasir
            'catatan' => $request->catatan,
            'status' => 'pending', 
            'status_pembayaran' => 'belum_dibayar'
        ]);

        // Pasangkan multi-service
        $pesanan->layanans()->attach($request->services);

        return redirect()->route('user.order')->with('success', 'Booking berhasil dibuat! Silakan bawa pakaian ke Kasir.');
    }

    // Halaman Riwayat Pesanan
    public function history()
    {
        $user_id = Auth::id();
        
        $historyOrders = Pesanan::with(['layanans', 'jadwal'])
            ->where('user_id', $user_id)
            ->where('status', 'selesai')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.userHistory', compact('historyOrders'));
    }
}
