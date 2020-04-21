<?php

use App\Possession;
use Illuminate\Database\Seeder;

class PossessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Possession1 = Possession::create([
            'title' => 'Bien 1',
            'description' => 'Mon premier Bien',
            'address' => '123 rue abc',
            'zipCode' => '64000',
            'town' => 'Pau',
            'portfolio_id' => '1',
        ]);
        $Possession1 = Possession::create([
            'title' => 'Bien 2',
            'description' => 'Mon second Bien',
            'address' => '456 rue def',
            'zipCode' => '64000',
            'town' => 'Pau',
            'portfolio_id' => '1',
        ]);
        $Possession1 = Possession::create([
            'title' => 'Bien 3',
            'description' => 'Mon troisieme Bien',
            'address' => '789 rue ghi',
            'zipCode' => '64000',
            'town' => 'Pau',
            'portfolio_id' => '2',
        ]);
        $Possession1 = Possession::create([
            'title' => 'Bien 4',
            'description' => 'Mon quatrieme Bien',
            'address' => '123 rue jkl',
            'zipCode' => '64000',
            'town' => 'Pau',
            'portfolio_id' => '2',
        ]);
    }
}
