<?php

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Seeder;
use App\Models\Zone;

class ZoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zone::create([
            'zone_name' => 'Zona A',
            'zone_code' => 'jfnwefjbrewekgjer348454564',
        ]);
        Zone::create([
            'zone_name' => 'Zona B',
            'zone_code' => 'NFI34534KT54',
        ]);
        Zone::create([
            'zone_name' => 'Zona C',
            'zone_code' => 'UFN34PIU5',
        ]);
        Zone::create([
            'zone_name' => 'Zona D',
            'zone_code' => 'FN34O5G45G5FJKRENE',
        ]);
    }
}