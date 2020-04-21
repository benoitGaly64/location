<?php

use Illuminate\Database\Seeder;

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
        $user = Factory(App\User::class)->create([
            'name' => 'Example User',
            'email' => 'test@example.com',
            'password' => bcrypt('test'),
        ]);
        $user->assignRole('writer');

        $user = Factory(App\User::class)->create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
        ]);
        $user->assignRole('admin');

        $user = Factory(App\User::class)->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('superadmin'),
        ]);
        $user->assignRole('super-admin');
    }
}
