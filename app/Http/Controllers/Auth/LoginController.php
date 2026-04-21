<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    


    // Method untuk menampilkan halaman login
    public function index()
    {
        // Mengecek apakah user sudah berada dalam keadaan login (sudah terautentikasi)
        if (Auth::check())
        {
            // Jika sudah login, maka arahkan user ke method roles() untuk pengecekan hak akses (role) dan redirect yang sesuai
            return $this->roles();
        }
        // Jika belum login, maka tampilkan halaman form login
        return view('form.login');
    }

    // Method untuk mengarahkan pengguna berdasarkan role yang mereka miliki
    public function roles(){
        // Mengambil data user yang sedang login saat ini
        $user = Auth::user();

        // Mengecek apakah variabel $user kosong (tidak ada user yang login)
         if (!$user) {
            // Jika kosong, maka kembalikan user ke halaman form login
            return redirect()->route('login.index');
        }
        
        // Memeriksa nilai dari kolom role yang dimiliki oleh user tersebut
        switch ($user->role) {
            // Jika role user adalah 'admin'
            case 'admin':
                // Arahkan ke halaman admin dashboard dan sertakan pesan sukses
                return redirect()->route('admin.dashboard')->with('success', 'Welcome back, Admin!');
                // Hentikan eksekusi case admin
                break;
            // Jika role user adalah 'staff'
            case 'staff':
                // Arahkan ke halaman staff dashboard dan sertakan pesan sukses
                return redirect()->route('staff.dashboard')->with('success', 'Welcome back, Staff!');
                // Hentikan eksekusi case staff
                break;
            // Jika role user adalah 'pelanggan'
            case 'pelanggan':
                // Arahkan ke halaman user dashboard dan sertakan pesan sukses
                return redirect()->route('user.dashboard')->with('success', 'Welcome back!');
                // Hentikan eksekusi case pelanggan
                break;
            // Jika role tidak sesuai dengan salah satu di atas
            default:
                // Lakukan proses logout untuk mengeluarkan user dari sistem
                Auth::logout();
                // Arahkan kembali ke halaman form login dengan membawa pesan error terkait role invalid
                return redirect()->route('login.index')->withErrors(['role' => 'Role tidak valid']);
                // Hentikan eksekusi default
                break;
        }
    }

    // Method untuk memproses data login yang dikirimkan oleh pengguna
    public function process(Request $request)
    {
        // Membuat validasi untuk memastikan input email dan password dikirim dengan benar sesuai format
        $validator = Validator::make($request->all(), [
            // Field email wajib diisi dan harus berformat email yang valid
            'email' => 'required|email',
            // Field password wajib diisi
            'password' => 'required'
        ],[
            // Pesan error jika email kosong
            'email.required' => 'Email wajib di isi',
            // Pesan error jika format email tidak sesuai dengan standar penulisan email
            'email.email' => 'Format email tidak valid',
            // Pesan error jika password kosong
            'password' => 'Password wajib di isi'
        ]);

        // Memeriksa apakah proses validasi gagal (terdapat error dari input)
        if ($validator->fails()) {
            // Jika gagal, maka kembalikan pengguna ke halaman sebelumnya (form login)
            return back()
                // Menyertakan pesan error hasil validasi agar dapat ditampilkan pada form
                ->withErrors($validator)
                // Menyertakan inputan sebelumnya (kecuali password) agar kolom tetap terisi apa yang sudah diketik
                ->withInput();
        }

        // Mengambil hanya data 'email' dan 'password' dari request sebagai array untuk dicocokkan ke database
        $credentials = $request->only('email', 'password');

        // Melakukan proses percobaan login (attempt) dengan mencocokkan credentials dan opsi "remember me"
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Jika berhasil masuk, buat data sesi yang baru untuk mencegah eksploitasi peretasan (seperti session fixation)
            $request->session()->regenerate();
            
            // Karena login telah berhasil, panggil metode roles() untuk mengarahkan pengguna ke dashboard yang tepat
            return $this->roles();
        }

        // Jika kredensial (email & password) salah, arahkan kembali ke form login
        return back()
            // Berikan pesan error spesifik kepada pengguna mengenai kegagalan ini
            ->withErrors(['email' => 'Kredensial yang diberikan tidak sesuai.'])
            // Hentikan agar session form hanya memanggil kembali input email saja
            ->onlyInput('email');
    }

    // Method untuk memproses keluar dari akun (logout)
    public function logout()
    {
        // Menghapus seluruh data sesi di memori aplikasi
        Session::flush();
        // Beri tahu sistem otentikasi bahwa user telah sign out
        Auth::logout();
        // Arahkan kembali user ke halaman login awal
        return redirect('/login');
    }
}