<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'nama_guru' => 'Budi Santoso',
            'email' => 'budi.santoso@school.com',
            'alamat' => 'Jl. Merdeka No. 123, Jakarta'
        ]);

        Guru::create([
            'nama_guru' => 'Siti Nurhaliza',
            'email' => 'siti.nurhaliza@school.com',
            'alamat' => 'Jl. Ahmad Yani No. 456, Bandung'
        ]);

        Guru::create([
            'nama_guru' => 'Ahmad Wijaya',
            'email' => 'ahmad.wijaya@school.com',
            'alamat' => 'Jl. Sudirman No. 789, Surabaya'
        ]);

        Guru::create([
            'nama_guru' => 'Desi Ratnawati',
            'email' => 'desi.ratnawati@school.com',
            'alamat' => 'Jl. Gatot Subroto No. 321, Medan'
        ]);

        Guru::create([
            'nama_guru' => 'Rina Kusuma',
            'email' => 'rina.kusuma@school.com',
            'alamat' => 'Jl. Diponegoro No. 654, Yogyakarta'
        ]);
    }
}
