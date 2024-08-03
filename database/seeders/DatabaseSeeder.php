<?php

namespace Database\Seeders;

use App\Models\JadwalKerja;
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

        User::factory()->create([
            'role' => 'admin',
            'email' => 'admin@gmail.com',
        ]);

        $hariKerja = [
            'senin' => ['09:00', '17:00'],
            'selasa' => ['09:00', '17:00'],
            'rabu' => ['09:00', '17:00'],
            'kamis' => ['09:00', '17:00'],
            'jumat' => ['09:00', '17:00'],
            'sabtu' => ['09:00', '14:00']
        ];

        foreach ($hariKerja as $hari => $jam) {
            JadwalKerja::updateOrCreate(
                ['hari' => $hari],
                [
                    'jamMasuk' => $jam[0],
                    'jamKeluar' => $jam[1]
                ]
            );
        }
    }
}
