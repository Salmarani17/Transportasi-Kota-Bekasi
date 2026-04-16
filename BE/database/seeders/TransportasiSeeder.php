<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transportasi;

class TransportasiSeeder extends Seeder
{
    public function run(): void
    {
        // ================= LRT =================
        $lrt = Transportasi::create([
            'nama' => 'LRT',
            'jenis' => 'lrt',
            'jam_mulai' => '05:30',
            'jam_selesai' => '23:00',
        ]);

        $lrt->stasiun()->createMany([
            [
                'nama' => 'Jatibening Baru',
                'alamat' => 'Jatibening Baru, Bekasi',
                'urutan' => 1
            ],
            [
                'nama' => 'Cikunir 1',
                'alamat' => 'Jatibening, Bekasi',
                'urutan' => 2
            ],
            [
                'nama' => 'Cikunir 2',
                'alamat' => 'Jakasampurna, Bekasi',
                'urutan' => 3
            ],
            [
                'nama' => 'Bekasi Barat',
                'alamat' => 'Pekayon Jaya, Bekasi',
                'urutan' => 4
            ],
        ]);

        // ================= KRL =================
        $krl = Transportasi::create([
            'nama' => 'KRL Commuter',
            'jenis' => 'krl',
            'jam_mulai' => '04:30',
            'jam_selesai' => '23:30',
        ]);

        $krl->stasiun()->createMany([
            [
                'nama' => 'Bekasi',
                'alamat' => 'Bekasi Utara, Kota Bekasi',
                'urutan' => 1
            ],
            [
                'nama' => 'Bekasi Timur',
                'alamat' => 'Duren Jaya, Bekasi',
                'urutan' => 2
            ],
            [
                'nama' => 'Kranji',
                'alamat' => 'Bekasi Barat, Kota Bekasi',
                'urutan' => 3
            ],
        ]);

        // ================= TRANS BEKEN =================
        $bus = Transportasi::create([
            'nama' => 'Trans Beken',
            'jenis' => 'bus',
            'jam_mulai' => '05:00',
            'jam_selesai' => '21:00',
        ]);

        $bus->stasiun()->createMany([
            [
                'nama' => 'Terminal Bekasi',
                'alamat' => 'Bekasi',
                'urutan' => 1
            ],
            [
                'nama' => 'Harapan Indah',
                'alamat' => 'Bekasi',
                'urutan' => 2
            ],
        ]);
    }
}