<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Matikan pengecekan foreign key sementara waktu
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 2. Kosongkan tabel users dengan aman
        User::truncate();

        // 3. Hidupkan kembali pengecekan foreign key demi integritas data
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 4. Masukkan data akun utama (Admin)
        User::create([
            'username'  => 'admin_bukit_lawang',
            'password'  => Hash::make('admin123'),
            'full_name' => 'Administrator Bukit Lawang',
            'role'      => 'admin',
        ]);

        // 5. Masukkan data akun cadangan (Admin Villa)
        User::create([
            'username'  => 'admin_etalauser',
            'password'  => Hash::make('villa123'),
            'full_name' => 'Admin Villa Etalauser',
            'role'      => 'admin',
        ]);

        // 6. 🌟 MASUKKAN AKUN OWNER BARU (Untuk Verifikasi Logika Persetujuan JSON)
        User::create([
            'username'  => 'owner_bukit_lawang',
            'password'  => Hash::make('owner123'),
            'full_name' => 'Owner Utama Bukit Lawang',
            'role'      => 'owner',
        ]);
    }
}