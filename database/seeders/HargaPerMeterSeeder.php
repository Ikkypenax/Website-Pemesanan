<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HargaPerMeter;

class HargaPerMeterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HargaPerMeter::create(['harga' => 150000]);
    }
}

