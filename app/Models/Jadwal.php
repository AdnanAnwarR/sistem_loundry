<?php // Membuka tag PHP

namespace App\Models; // Menentukan lokasi (namespace) file model ini berada, yaitu di dalam struktur folder app/Models

use Illuminate\Database\Eloquent\Factories\HasFactory; // Mengimpor trait HasFactory agar model ini bisa menggunakan fitur Factory (biasanya untuk membuat data dummy/seeder)
use Illuminate\Database\Eloquent\Model; // Mengimpor class Model dasar dari Eloquent ORM bawaan Laravel agar bisa diwarisi

class Jadwal extends Model // Membuat class 'Jadwal' yang mewarisi semua sifat dan fungsi dari class 'Model' Laravel
{ // Membuka blok class Jadwal
    use HasFactory; // Mengaktifkan trait HasFactory di dalam model ini

    protected $table = 'jadwal'; // Memberitahu Laravel secara eksplisit bahwa model ini terhubung dengan tabel bernama 'jadwal' di database (Jika tidak didefinisikan, Laravel akan berasumsi nama tabelnya adalah 'jadwals' dalam bentuk jamak/plural bahasa Inggris)

    protected $fillable = [ // Properti '$fillable' digunakan untuk mendaftarkan kolom-kolom apa saja yang diizinkan untuk diisi secara massal (Mass Assignment) melalui fungsi create() atau update()
        'tanggal', // Mengizinkan kolom 'tanggal' untuk diisi
        'slot_waktu', // Mengizinkan kolom 'slot_waktu' untuk diisi
        'kapasitas', // Mengizinkan kolom 'kapasitas' (kuota maksimal) untuk diisi
        'terisi', // Mengizinkan kolom 'terisi' (jumlah kuota yang sudah terpakai) untuk diisi
    ]; // Menutup array $fillable

    protected $casts = [ // Properti '$casts' digunakan untuk mengonversi tipe data secara otomatis saat data diambil dari database atau saat disimpan ke database
        'tanggal' => 'date', // Memastikan bahwa nilai dari kolom 'tanggal' akan selalu diubah (di-cast) menjadi instance objek 'date' (biasanya berupa objek Carbon di Laravel), sehingga memudahkan manipulasi format tanggal
    ]; // Menutup array $casts

    // Relasi ke pesanan
    public function pesanan() // Membuat fungsi bernama 'pesanan' untuk mendefinisikan relasi database antar model
    { // Membuka blok fungsi pesanan
        return $this->hasMany(Pesanan::class, 'jadwal_id'); // Mendefinisikan relasi "One-to-Many" (Satu ke Banyak). Artinya: 1 Jadwal bisa memiliki Banyak Pesanan. Parameter kedua 'jadwal_id' menegaskan nama Foreign Key yang ada di tabel pesanan.
    } // Menutup blok fungsi pesanan
} // Menutup blok class Jadwal