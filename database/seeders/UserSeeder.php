<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'cau@cus.com',
            'password' => Hash::make('dev12345'),
            'role' => 4,  // Role 4 untuk Super Admin
            'sekolah_id' => 1,  // Sesuaikan dengan sekolah_id yang relevan
            'guru_id' => 1,  // Sesuaikan dengan guru_id yang relevan
            'ruangan_id' => 1,  // Sesuaikan dengan ruangan_id yang relevan
        ]);
    }
}
