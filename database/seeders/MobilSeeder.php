<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Mobil;

class MobilSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        Mobil::create([
            'merek' => 'Toyota',
            'model' => 'Camry',
            'no_plat' => 'ABC123',
            'tarif_sewa' => 100.00,
        ]);

        Mobil::create([
            'merek' => 'Honda',
            'model' => 'Civic',
            'no_plat' => 'XYZ789',
            'tarif_sewa' => 80.00,
        ]);

        Mobil::create([
            'merek' => 'Ford',
            'model' => 'Focus',
            'no_plat' => 'DEF456',
            'tarif_sewa' => 90.00,
        ]);

        Mobil::create([
            'merek' => 'Chevrolet',
            'model' => 'Malibu',
            'no_plat' => 'GHI789',
            'tarif_sewa' => 110.00,
        ]);

        Mobil::create([
            'merek' => 'Nissan',
            'model' => 'Altima',
            'no_plat' => 'JKL012',
            'tarif_sewa' => 95.00,
        ]);
    }
}
