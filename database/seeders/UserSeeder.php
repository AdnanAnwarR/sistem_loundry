<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [ // Membuat array berisi data user yang akan di-seed
            [ // Data user pertama
                'id' => 1, // ID user
                'name' => 'jaka', // Nama user
                'email' => 'jaka@example.com', // Email user
                'no_hp' => '87865786543', // Nomor handphone user
                'role' => 'pelanggan', // Peran (role) user
                'is_active' => true, // Status aktif user
                'password' => Hash::make('password'), // Mengenkripsi (hashing) password 'password'
            ],
            [ // Data user kedua
                'id' => 2, // ID user
                'name' => 'joko', // Nama user
                'email' => 'joko@example.com', // Email user
                'no_hp' => '84365783463', // Nomor handphone user
                'role' => 'pelanggan', // Peran (role) user
                'is_active' => true, // Status aktif user
                'password' => Hash::make('password'), // Mengenkripsi (hashing) password 'password'
            ],
            [ // Data user ketiga
                'id' => 3, // ID user
                'name' => 'bowo', // Nama user
                'email' => 'bowo@example.com', // Email user
                'no_hp' => '82339434743', // Nomor handphone user
                'role' => 'pelanggan', // Peran (role) user
                'is_active' => true, // Status aktif user
                'password' => Hash::make('password'), // Mengenkripsi (hashing) password 'password'
            ],
            [ // Data user keempat (staf)
                'id' => 4, // ID user
                'name' => 'dono', // Nama user
                'email' => 'dono@example.com', // Email user
                'no_hp' => '82339434744', // Nomor handphone user
                'role' => 'staff', // Peran (role) user
                'is_active' => true, // Status aktif user
                'password' => Hash::make('password'), // Mengenkripsi (hashing) password 'password'
            ],
            [ // Data user kelima (admin)
                'id' => 5, // ID user
                'name' => 'admin', // Nama user
                'email' => 'admin@example.com', // Email user
                'no_hp' => '82339434745', // Nomor handphone user
                'role' => 'admin', // Peran (role) user
                'is_active' => true, // Status aktif user
                'password' => Hash::make('password'), // Mengenkripsi (hashing) password 'password'
            ],
        ];

        foreach ($users as $user) { // Melakukan perulangan untuk setiap data user dalam array
            User::create($user); // Menyimpan data user ke dalam database
        }
    }
}
