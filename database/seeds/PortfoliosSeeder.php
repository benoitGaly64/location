<?php

use App\Portfolio;
use Illuminate\Database\Seeder;

class PortfoliosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PortFolio1 = Portfolio::create([
            'name' => 'Portfolio 1',
        ]);
        $PortFolio2 = Portfolio::create([
            'name' => 'Portfolio 2',
        ]);
    }
}
