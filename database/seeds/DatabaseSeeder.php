<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PortfoliosSeeder::class);
        $this->call(PossessionsSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(UsersProfileSeeder::class);

    }
}
