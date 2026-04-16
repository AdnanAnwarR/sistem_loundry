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
        $users = [
            [
                'id' => 1,
                'name' => 'jaka',
                'email' => 'jaka@example.com',
                'no_hp' => '87865786543',
                'role' => 'pelanggan',
                'is_active' => true,
                'password' => Hash::make('password'),
            ],
            [
                'id' => 2,
                'name' => 'joko',
                'email' => 'joko@example.com',
                'no_hp' => '84365783463',
                'role' => 'pelanggan',
                'is_active' => true,
                'password' => Hash::make('password'),
            ],
            [
                'id' => 3,
                'name' => 'bowo',
                'email' => 'bowo@example.com',
                'no_hp' => '82339434743',
                'role' => 'pelanggan',
                'is_active' => true,
                'password' => Hash::make('password'),
            ],
            [
                'id' => 4,
                'name' => 'dono',
                'email' => 'dono@example.com',
                'no_hp' => '82339434744',
                'role' => 'staff',
                'is_active' => true,
                'password' => Hash::make('password'),
            ],
            [
                'id' => 5,
                'name' => 'admin',
                'email' => 'admin@example.com',
                'no_hp' => '82339434745',
                'role' => 'admin',
                'is_active' => true,
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
