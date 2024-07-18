<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategorisSeeder extends Seeder
{
    /**
     * @return void.
     */



    public function run()
    {
        $kategorises = [
            [
                'nama_kategori' => 'INDOOR',
            ],
            [
                'nama_kategori' => 'OUTDOOR',
            ]
        ];

        foreach ($kategorises as $kategori) {
            $kate = new Kategori();

            $kate->nama_kategori = $kategori['nama_kategori'];

            $kate->save();
        }
    }
}
