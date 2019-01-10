<?php

use Illuminate\Database\Seeder;
use App\Models\Hh;

class HhsTableSeeder extends Seeder
{
    public function run()
    {
        $hhs = factory(Hh::class)->times(50)->make()->each(function ($hh, $index) {
            if ($index == 0) {
                // $hh->field = 'value';
            }
        });

        // Hh::insert($hhs->toArray());
    }

}

