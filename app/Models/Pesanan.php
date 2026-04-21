<?php // Membuka tag PHP

namespace App\Models; // Menentukan lokasi (namespace) file model ini berada, yaitu di direktori app/Models

use Illuminate\Database\Eloquent\Factories\HasFactory; // Mengimpor trait HasFactory untuk keperluan pembuatan data dummy (seeder/testing)
use Illuminate\Database\Eloquent\Model; // Mengimpor class Model utama dari Eloquent ORM Laravel

class Pesanan extends Model // Membuat class 'Pesanan' yang mewarisi sifat dan fungsionalitas dari class 'Model' bawaan Laravel
{ // Membuka blok class Pesanan
    use HasFactory; // Mengaktifkan trait HasFactory agar model ini bisa berinteraksi dengan PesananFactory

    protected $table = 'pesanan'; // Memberitahu Laravel secara eksplisit bahwa model ini merepresentasikan tabel bernama 'pesanan' di database

    protected $fillable = [ // Mendefinisikan kolom-kolom apa saja yang aman dan diizinkan untuk diisi secara massal (Mass Assignment)
        'user_id', // Mengizinkan pengisian ID user (pelanggan yang memesan)
        'layanan_id', // Mengizinkan pengisian ID layanan (jasa/produk yang dipesan)
        'jadwal_id', // Mengizinkan pengisian ID jadwal (waktu pemesanan)
        'staf_id', // Mengizinkan pengisian ID staf (karyawan/admin yang menangani pesanan ini)
        'order_id', // Mengizinkan pengisian nomor pesanan unik (biasanya di-generate untuk keperluan payment gateway)
        'total_harga', // Mengizinkan pengisian total biaya pesanan
        'catatan', // Mengizinkan pengisian catatan tambahan dari pelanggan
        'status', // Mengizinkan pengisian status pesanan (misal: pending, proses, selesai)
        'status_pembayaran', // Mengizinkan pengisian status bayar (misal: belum bayar, lunas, gagal)
        'metode_bayar', // Mengizinkan pengisian metode pembayaran yang dipilih pelanggan
        'snap_token', // Mengizinkan pengisian token transaksi (biasanya dari payment gateway seperti Midtrans)
        'rating', // Mengizinkan pengisian nilai rating (bintang) yang diberikan pelanggan
        'ulasan', // Mengizinkan pengisian teks ulasan/review dari pelanggan
    ]; // Menutup array $fillable

    protected $casts = [ // Mengonversi (casting) tipe data saat diambil dari atau disimpan ke database
        'total_harga' => 'decimal:2', // Memastikan kolom 'total_harga' selalu dikembalikan sebagai angka desimal dengan 2 digit di belakang koma (cocok untuk format uang)
    ]; // Menutup array $casts

    // Relasi ke user (pelanggan)
    public function pelanggan() // Membuat fungsi 'pelanggan' untuk memanggil data user yang melakukan pesanan
    { // Membuka blok fungsi pelanggan
        return $this->belongsTo(User::class, 'user_id'); // Relasi "Many-to-One" (Inverse of hasMany). Artinya: Banyak Pesanan bisa dimiliki oleh 1 User (pelanggan). Menggunakan 'user_id' sebagai Foreign Key.
    } // Menutup blok fungsi pelanggan

    // Relasi ke layanan
    public function layanan() // Membuat fungsi 'layanan' untuk memanggil detail layanan yang dipesan
    { // Membuka blok fungsi layanan
        return $this->belongsTo(Layanan::class, 'layanan_id'); // Relasi "Many-to-One". Artinya: Pesanan ini merujuk pada 1 Layanan spesifik melalui Foreign Key 'layanan_id'.
    } // Menutup blok fungsi layanan

    // Relasi ke jadwal
    public function jadwal() // Membuat fungsi 'jadwal' untuk memanggil data waktu pesanan
    { // Membuka blok fungsi jadwal
        return $this->belongsTo(Jadwal::class, 'jadwal_id'); // Relasi "Many-to-One". Artinya: Pesanan ini terikat dengan 1 Jadwal spesifik melalui Foreign Key 'jadwal_id'.
    } // Menutup blok fungsi jadwal

    // Relasi ke staf pengelola
    public function staf() // Membuat fungsi 'staf' untuk memanggil data user (dengan role staf) yang menangani pesanan ini
    { // Membuka blok fungsi staf
        return $this->belongsTo(User::class, 'staf_id'); // Relasi "Many-to-One" ke model User, namun secara spesifik menggunakan 'staf_id' sebagai Foreign Key (bukan user_id standar).
    } // Menutup blok fungsi staf

    // Scope berdasarkan status
    public function scopeStatus($query, $status) // Membuat Local Scope bernama 'Status' yang menerima parameter dinamis ($status)
    { // Membuka blok scopeStatus
        return $query->where('status', $status); // Menambahkan klausa 'where' otomatis ke dalam query. Contoh penggunaan di controller: Pesanan::status('selesai')->get();
    } // Menutup blok scopeStatus

    // Scope berdasarkan status pembayaran
    public function scopeStatusPembayaran($query, $status) // Membuat Local Scope bernama 'StatusPembayaran' yang menerima parameter dinamis
    { // Membuka blok scopeStatusPembayaran
        return $query->where('status_pembayaran', $status); // Menambahkan filter 'where' untuk mengecek kolom status_pembayaran. Contoh penggunaan: Pesanan::statusPembayaran('lunas')->get();
    } // Menutup blok scopeStatusPembayaran
} // Menutup blok class Pesanan