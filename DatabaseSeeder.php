<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Akun Kaprodi
        User::updateOrCreate([
            'email' => 'kaprodi@example.com',
        ], [
            'name' => 'Kaprodi',
            'email' => 'kaprodi@example.com',
            'password' => Hash::make('password'),
            'role' => 'kaprodi',
        ]);

        // Akun Kemahasiswaan
        User::updateOrCreate([
            'email' => 'kemahasiswaan@example.com',
        ], [
            'name' => 'Kemahasiswaan',
            'email' => 'kemahasiswaan@example.com',
            'password' => Hash::make('password'),
            'role' => 'kemahasiswaan',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Udin',
            'nim' => '12345678',
            'prodi' => 'Teknik Informatika',
            'email' => 'udin@email.com',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);
    }
}
