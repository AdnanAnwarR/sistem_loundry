<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function dashboard()
    {
        $staff_id = Auth::id();
        
        $availableTasks = Pesanan::whereIn('status', ['pending', 'dikonfirmasi'])->whereNull('staf_id')->count();
        $processingTasks = Pesanan::where('status', 'proses')->where('staf_id', $staff_id)->count();
        $completedTasks = Pesanan::where('status', 'selesai')->where('staf_id', $staff_id)->count();

        return view('staff.staffDashboard', compact('availableTasks', 'processingTasks', 'completedTasks'));
    }

    public function tasks()
    {
        $staff_id = Auth::id();
        
        // Tugas yang bisa diambil (Belum diproses & staf_id kosong)
        $availableTasks = Pesanan::with(['layanans', 'pelanggan', 'jadwal'])
            ->whereIn('status', ['pending', 'dikonfirmasi']) 
            ->where(function($query) use ($staff_id) {
                $query->whereNull('staf_id')->orWhere('staf_id', $staff_id);
            })
            ->orderBy('created_at', 'asc')
            ->get();

        // Tugas yang sedang dikerjakan oleh staff ini
        $myTasks = Pesanan::with(['layanans', 'pelanggan', 'jadwal'])
            ->where('staf_id', $staff_id)
            ->whereIn('status', ['proses'])
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('staff.staffTasks', compact('availableTasks', 'myTasks'));
    }

    public function updateStatus(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'status' => 'required|in:proses,selesai',
        ]);

        $pesanan->status = $request->status;
        $pesanan->staf_id = Auth::id();
        $pesanan->save();

        return back()->with('success', 'Status pengerjaan berhasil diupdate!');
    }

    public function history()
    {
        $staff_id = Auth::id();
        
        $historyTasks = Pesanan::with(['layanans', 'pelanggan', 'jadwal'])
            ->where('staf_id', $staff_id)
            ->where('status', 'selesai')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('staff.staffHistory', compact('historyTasks'));
    }
}
