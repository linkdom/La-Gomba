<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stock = new Stock([
            'product_id' => '1',
            'amount' => '18',
        ]);
        $stock->save();

        $stock = new Stock([
            'product_id' => '2',
            'amount' => '1',
        ]);
        $stock->save();

    }
}
