<?php

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Seeder;
use App\Models\Round;

class RoundTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Round::create([
            'round_date' => '2020-12-18',
            'round_time' => '23:12',
            'round_user' => 2,
            'round_zone'=> 1
        ]);
    }
}
