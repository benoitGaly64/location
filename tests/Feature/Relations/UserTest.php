<?php

namespace Tests\Feature\Relations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;
use App\Portfolio;
use Spatie\Permission\Models\Role;
use App\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_User_Has_Portfolio()
    {
        $user = factory(User::class)->create();

        $portfolio = factory(Portfolio::class)->create();
        $user->portfolios()->attach($portfolio->id);

        $this->assertTrue($user->portfolios->contains($portfolio));
       
    }
    public function test_User_Has_Role()
    {
        $role1 = Role::create(['name' => 'writer']);
        $user = factory(User::class)->create();
        $user->assignRole($role1->name);


        $this->assertTrue($user->getRoleNames()->contains('writer'));
       
    }
}
