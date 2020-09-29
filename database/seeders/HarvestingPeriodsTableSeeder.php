<?php

namespace Database\Seeders;

use App\Models\HarvestingPeriod;
use Illuminate\Database\Seeder;

class HarvestingPeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $harvestingPeriod = new HarvestingPeriod([
            'from' => '2020-08-02',
            'to' => '2020-09-29',
            'product_id' => '1',
        ]);

        $harvestingPeriod->save();

        $harvestingPeriod = new HarvestingPeriod([
            'from' => '2020-10-02',
            'to' => '2020-10-29',
            'product_id' => '2',
        ]);

        $harvestingPeriod->save();

        $harvestingPeriod = new HarvestingPeriod([
            'from' => '2020-11-02',
            'to' => '2020-11-29',
            'product_id' => '1',
        ]);

        $harvestingPeriod->save();

        $harvestingPeriod = new HarvestingPeriod([
            'from' => '2020-12-02',
            'to' => '2020-12-29',
            'product_id' => '2',
        ]);

        $harvestingPeriod->save();

        $harvestingPeriod = new HarvestingPeriod([
            'from' => '2021-01-03',
            'to' => '2021-01-25',
            'product_id' => '1',
        ]);

        $harvestingPeriod->save();

        $harvestingPeriod = new HarvestingPeriod([
            'from' => '2021-10-02',
            'to' => '2021-10-29',
            'product_id' => '2',
        ]);

        $harvestingPeriod->save();
    }
}
