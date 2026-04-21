<?php // Membuka tag PHP

namespace App\Models; // Menentukan lokasi direktori (namespace) model ini, yaitu di app/Models

// use Illuminate\Contracts\Auth\MustVerifyEmail; // Baris ini dikomentari (non-aktif). Jika diaktifkan, user wajib verifikasi email sebelum bisa login.
use Illuminate\Database\Eloquent\Factories\HasFactory; // Mengimpor trait HasFactory untuk pembuatan data dummy
use Illuminate\Foundation\Auth\User as Authenticatable; // Mengimpor class Authenticatable. Ini berbeda dari model biasa karena class ini membawa fungsi-fungsi khusus untuk keperluan Login/Register/Session bawaan Laravel.
use Illuminate\Notifications\Notifiable; // Mengimpor trait Notifiable agar model ini bisa menerima notifikasi (seperti email reset password)

class User extends Authenticatable // Membuat class 'User' yang mewarisi fitur Autentikasi Laravel (bukan sekadar Model biasa)
{ // Membuka blok class User
    /** @use HasFactory<\Database\Factories\UserFactory> */ // Anotasi standar Laravel untuk membantu IDE mengenali Factory yang digunakan
    use HasFactory, Notifiable; // Mengaktifkan fitur Factory (untuk testing) dan Notifiable (untuk kirim email/notifikasi ke user)

    /**
     * The attributes that are mass assignable.
     * Atribut yang diizinkan untuk diisi secara massal (Mass Assignment)
     * @var list<string>
     */
    protected $fillable = [ // Mendaftarkan kolom-kolom yang boleh diisi langsung saat create() atau update()
        'name', // Mengizinkan pengisian kolom nama
        'email', // Mengizinkan pengisian kolom email
        'no_hp', // Mengizinkan pengisian kolom nomor HP
        'role', // Mengizinkan pengisian kolom hak akses (misal: admin, staff, pelanggan)
        'is_active', // Mengizinkan pengisian status aktif user
        'password', // Mengizinkan pengisian password
    ]; // Menutup array $fillable

    /**
     * The attributes that should be hidden for serialization.
     * Atribut yang akan disembunyikan saat data User diubah menjadi JSON/Array (sangat penting untuk keamanan API)
     * @var list<string>
     */
    protected $hidden = [ // Mendaftarkan kolom yang tidak boleh tampil saat model dipanggil
        'password', // Menyembunyikan data password agar tidak bocor ke publik saat data user di-return
        'remember_token', // Menyembunyikan token 'remember me' (fitur login tetap masuk)
    ]; // Menutup array $hidden

    /**
     * Get the attributes that should be cast.
     * Mengonversi (casting) tipe data saat data diambil atau disimpan
     * @return array<string, string>
     */
    protected function casts(): array // Mendefinisikan method casts() (penulisan gaya baru di Laravel 11+)
    { // Membuka blok fungsi casts
        return [ // Mengembalikan array berisi aturan konversi
            'email_verified_at' => 'datetime', // Mengonversi kolom 'email_verified_at' menjadi objek Datetime (agar mudah diatur format waktunya)
            'password' => 'hashed', // SANGAT PENTING: Otomatis melakukan enkripsi (hashing) pada password saat disimpan ke database. Anda tidak perlu lagi menulis Hash::make() di controller berkat fitur ini.
        ]; // Menutup array pengembalian
    } // Menutup blok fungsi casts

    // Relasi ke pesanan (sebagai customer)
    public function pesanan() // Membuat fungsi untuk mengambil data pesanan yang dibuat oleh user ini
    { // Membuka blok fungsi pesanan
        return $this->hasMany(Pesanan::class, 'id_customer'); // Relasi "One-to-Many": 1 User (Pelanggan) bisa memiliki Banyak Pesanan. Parameter kedua mengindikasikan Foreign Key di tabel pesanan adalah 'id_customer'.
    } // Menutup blok fungsi pesanan

    // Relasi ke pesanan (sebagai staff)
    public function pekerjaan() // Membuat fungsi untuk mengambil data pesanan yang sedang ditangani oleh user ini (jika rolenya staff)
    { // Membuka blok fungsi pekerjaan
        return $this->hasMany(Pesanan::class, 'staf_id'); // Relasi "One-to-Many": 1 User (Staff) bisa menangani Banyak Pesanan. Parameter kedua 'staf_id' adalah Foreign Key-nya.
    } // Menutup blok fungsi pekerjaan

    // Cek role: Apakah user ini Admin?
    public function isAdmin() // Membuat fungsi bantuan (helper) untuk mengecek apakah user adalah admin
    { // Membuka blok fungsi
        return $this->role === 'admin'; // Akan menghasilkan nilai true jika isi kolom 'role' adalah persis string 'admin'
    } // Menutup blok fungsi

    // Cek role: Apakah user ini Staff?
    public function isStaff() // Membuat fungsi bantuan (helper) untuk mengecek apakah user adalah staff
    { // Membuka blok fungsi
        return $this->role === 'staff'; // Akan menghasilkan nilai true jika isi kolom 'role' adalah persis string 'staff'
    } // Menutup blok fungsi

    // Cek role: Apakah user ini Pelanggan?
    public function isPelanggan() // Membuat fungsi bantuan (helper) untuk mengecek apakah user adalah pelanggan
    { // Membuka blok fungsi
        return $this->role === 'pelanggan'; // Akan menghasilkan nilai true jika isi kolom 'role' adalah persis string 'pelanggan'
    } // Menutup blok fungsi
} // Menutup blok class User