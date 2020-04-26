<?php

use App\UsersProfile;
use Illuminate\Database\Seeder;

class UsersProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Factory(UsersProfile::class)->create([
            'user_id' => 1
        ]);
        $user2 = Factory(UsersProfile::class)->create([
            'user_id' => 2
        ]);
        $user3 = Factory(UsersProfile::class)->create([
            'user_id' => 3
        ]);
    }
}
