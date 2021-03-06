<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create demo users
        $user = Factory(User::class)->create([
            'name' => 'Example User',
            'username' => 'test',
            'email' => 'test@example.com',
            'password' => bcrypt('test'),
        ]);
        $user->assignRole('writer');
        $user->portfolios()->attach('1');

        $user = Factory(User::class)->create([
            'name' => 'Example Admin User',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
        ]);
        $user->assignRole('admin');
        $user->portfolios()->attach('2');

        $user = Factory(User::class)->create([
            'name' => 'Example Super-Admin User',
            'username' => 'superadmin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('superadmin'),
        ]);
        $user->assignRole('super-admin');
        $user->portfolios()->attach(['1','2']);
    }
}
