<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nis' => '12345',
            'nama' => 'Jeki',
            'password' => 'jeki123',
            'role' => 'siswa',
        ]);
        User::create([
            'nis' => '0',
            'nama' => 'Admin',
            'password' => 'admin123',
            'role' => 'admin',
        ]);
        
    }
}
