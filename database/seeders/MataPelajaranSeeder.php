<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MataPelajaran::create(['nama_matpel' => 'Matematika']);
        MataPelajaran::create(['nama_matpel' => 'Bahasa Indonesia']);
        MataPelajaran::create(['nama_matpel' => 'Bahasa Inggris']);
        MataPelajaran::create(['nama_matpel' => 'Ilmu Pengetahuan Alam (IPA)']);
        MataPelajaran::create(['nama_matpel' => 'Ilmu Pengetahuan Sosial (IPS)']);
        MataPelajaran::create(['nama_matpel' => 'Pendidikan Agama']);
        MataPelajaran::create(['nama_matpel' => 'Pendidikan Jasmani']);
        MataPelajaran::create(['nama_matpel' => 'Seni Rupa']);
        MataPelajaran::create(['nama_matpel' => 'Musik']);
        MataPelajaran::create(['nama_matpel' => 'Teknologi Informasi']);
    }
}
