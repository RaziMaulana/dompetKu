<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Catatan;
use Illuminate\Database\Seeder;

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
            'phone' => '1234567890',
            'email' => 'test@example.com',
        ]);

        Catatan::create([
            'date' => '2025-03-27',
            'type_transaction' => 'pemasukan',
            'category' => 'Gaji',
            'amount' => 50000,
            'description' => 'Gaji bulan Maret 2025',
        ]);

    }
}
