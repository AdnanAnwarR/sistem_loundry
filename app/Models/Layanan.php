<?php // Membuka tag PHP

namespace App\Models; // Menentukan lokasi direktori (namespace) model ini, yaitu di app/Models

use Illuminate\Database\Eloquent\Factories\HasFactory; // Mengimpor trait HasFactory untuk mempermudah pembuatan data dummy (testing/seeding)
use Illuminate\Database\Eloquent\Model; // Mengimpor class Model dasar dari Eloquent ORM Laravel

class Layanan extends Model // Mendefinisikan class 'Layanan' yang mewarisi semua fungsi dari class 'Model' bawaan Laravel
{ // Membuka blok class Layanan
    use HasFactory; // Mengaktifkan trait HasFactory agar model ini bisa dihubungkan dengan file Factory

    protected $table = 'layanan'; // Memberitahu Laravel secara eksplisit bahwa model ini terhubung dengan tabel bernama 'layanan' di database

    // Primary key custom (default id)
    protected $primaryKey = 'id'; // Menegaskan bahwa kolom Primary Key di tabel ini bernama 'id' (Meski defaultnya memang 'id', menulisnya secara eksplisit berguna jika suatu saat ingin diubah, misal menjadi 'id_layanan')
    public $incrementing = true; // Menandakan bahwa nilai Primary Key akan bertambah secara otomatis (Auto Increment) saat ada data baru
    protected $keyType = 'int'; // Menegaskan bahwa tipe data dari Primary Key adalah 'int' (integer/angka bulat)

    protected $fillable = [ // Mendaftarkan kolom-kolom yang diizinkan untuk diisi secara langsung/massal (Mass Assignment Protection)
        'nama_layanan', // Mengizinkan pengisian kolom 'nama_layanan'
        'harga', // Mengizinkan pengisian kolom 'harga'
        'durasi', // Mengizinkan pengisian kolom 'durasi'
        'deskripsi', // Mengizinkan pengisian kolom 'deskripsi'
        'foto', // Mengizinkan pengisian kolom 'foto' (biasanya menyimpan nama file/path direktori gambar)
        'is_active', // Mengizinkan pengisian kolom 'is_active' (status apakah layanan ini sedang tersedia atau tidak)
    ]; // Menutup array $fillable

    protected $casts = [ // Mengonversi (casting) tipe data asli dari database menjadi tipe data spesifik di PHP secara otomatis saat dipanggil
        'harga' => 'decimal:2', // Mengonversi nilai 'harga' menjadi format angka desimal dengan 2 digit di belakang koma (berguna untuk presisi mata uang)
        'durasi' => 'integer', // Memastikan nilai 'durasi' selalu berwujud integer murni
        'is_active' => 'boolean', // Memastikan nilai 'is_active' (yang mungkin tersimpan sebagai 0 atau 1 di database MySQL) dibaca sebagai true atau false di PHP
    ]; // Menutup array $casts

    // Relasi ke pesanan
    public function pesanan() // Membuat fungsi 'pesanan' untuk menghubungkan tabel layanan dengan tabel pesanan
    { // Membuka blok fungsi pesanan
        return $this->hasMany(Pesanan::class, 'layanan_id', 'id'); // Relasi "One-to-Many": 1 Layanan bisa dipesan berkali-kali. Parameter kedua adalah Foreign Key di tabel pesanan ('layanan_id'), dan parameter ketiga adalah Local Key di tabel ini ('id').
    } // Menutup blok fungsi pesanan

    // Scope untuk layanan aktif
    public function scopeActive($query) // Membuat 'Local Scope' dengan nama 'Active'. Ini memungkinkan Anda menulis Layanan::active()->get() di controller untuk mempersingkat penulisan query
    { // Membuka blok scope
        return $query->where('is_active', true); // Menambahkan filter otomatis ke dalam query: hanya mengambil baris data yang kolom 'is_active'-nya bernilai true
    } // Menutup blok scope
} // Menutup blok class Layanan