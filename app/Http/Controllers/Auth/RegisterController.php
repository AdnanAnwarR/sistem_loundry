<?php // Membuka tag PHP

namespace App\Http\Controllers\Auth; // Mendefinisikan namespace/lokasi direktori file ini di dalam aplikasi Laravel

use App\Http\Controllers\Controller; // Mengimpor class Controller dasar bawaan Laravel agar bisa diwarisi
use Illuminate\Support\Facades\Validator; // Mengimpor Facade Validator untuk mengecek kebenaran input dari pengguna
use Illuminate\Http\Request; // Mengimpor class Request untuk menangkap data yang dikirim melalui form/HTTP
use App\Models\User; // Mengimpor Model User agar bisa melakukan operasi database (simpan/baca) pada tabel users

class RegisterController extends Controller // Membuat class RegisterController yang mewarisi sifat dari class Controller utama
{ // Membuka blok class RegisterController
    public function index() // Membuat fungsi public 'index' yang biasanya dipanggil untuk menampilkan halaman
    { // Membuka blok fungsi index
        return view('form.register'); // Menampilkan file tampilan (view) blade yang ada di folder resources/views/form/register.blade.php
    } // Menutup blok fungsi index

    public function store(Request $request) // Membuat fungsi 'store' yang menerima parameter object Request (berisi data form)
    { // Membuka blok fungsi store
        $validator = Validator::make($request->all(), [ // Membuat variabel $validator yang mengecek semua data request ($request->all())
            'name' => 'required', // Aturan: input 'name' (Nama) wajib diisi
            'email' => 'required|email', // Aturan: input 'email' wajib diisi dan formatnya harus berupa email (ada @ dan domain)
            'phone' => 'required', // Aturan: input 'phone' (Nomor HP) wajib diisi
            'password' => 'required|min:8', // Aturan: input 'password' wajib diisi dan minimal panjangnya 8 karakter
            'terms' => 'required|in:on' // Aturan: checkbox 'terms' (Syarat) wajib diisi/dicentang (nilainya harus 'on')
        ], [ // Membuka array kedua yang berisi pesan error kustom jika validasi di atas ada yang gagal
            'name.required' => 'Nama wajib di isi', // Menyiapkan pesan error khusus jika 'name' tidak diisi
            'email.required' => 'Email wajib di isi', // Menyiapkan pesan error khusus jika 'email' tidak diisi
            'email.email' => 'Format email tidak valid', // Menyiapkan pesan error khusus jika format 'email' salah
            'phone.required' => 'Nomor telepon wajib di isi', // Menyiapkan pesan error khusus jika 'phone' tidak diisi
            'password.required' => 'Password wajib di isi', // Menyiapkan pesan error khusus jika 'password' tidak diisi
            'password.min' => 'Password minimal 8 karakter', // Menyiapkan pesan error khusus jika 'password' kurang dari 8 huruf/angka
            'terms.required' => 'Syarat dan ketentuan wajib di centang' // Menyiapkan pesan error khusus jika 'terms' tidak dicentang
        ]); // Menutup fungsi pembuat Validator

        if ($validator->fails()) { // Mengecek kondisi: jika ada salah satu saja aturan validasi yang gagal (tidak terpenuhi)
            return redirect() // Memerintahkan sistem untuk melakukan pengalihan halaman (redirect)
            ->route('register.index') // Mengalihkan pengguna kembali ke rute bernama 'register.index' (halaman form sebelumnya)
            ->withErrors([ // Membawa data error sementara (flash session) ke halaman tujuan
                $validator->errors() // Mengambil kumpulan pesan error yang terjadi dari proses validasi di atas
            ]) // Menutup fungsi withErrors
            ->withInput(); // Mengembalikan data yang sudah sempat diketik pengguna agar form tidak kosong melompong lagi
        } // Menutup blok kondisi if

        User::create([ // Jika lolos validasi, panggil fungsi create pada model User untuk memasukkan data baru ke database
            'name' => $request->name, // Mengisi kolom 'name' di database dengan nilai input 'name' dari form
            'email' => $request->email, // Mengisi kolom 'email' di database dengan nilai input 'email' dari form
            'no_hp' => $request->phone, // Mengisi kolom 'no_hp' di database dengan nilai input 'phone' dari form
            'role' => 'pelanggan', // Mengisi kolom 'role' secara default (hardcode) dengan teks 'pelanggan'
            'is_active' => true, // Mengisi kolom 'is_active' dengan nilai boolean true (menandakan akun langsung aktif)
            'password' => $request->password, // Mengisi kolom 'password' dengan nilai input 'password' dari form
        ]); // Menutup array data dan fungsi create()

        return redirect()->route('login.index')->with('success', 'Data berhasil disimpan. Silahkan login untuk melanjutkan'); // Mengalihkan pengguna ke halaman login sekaligus membawa pesan sukses (flash data)
    } // Menutup blok fungsi store
} // Menutup blok class RegisterController