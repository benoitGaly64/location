<?php

namespace Tests\Feature\Possessions;

use App\Portfolio;
use App\Possession;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Tests\TestCase;


class RouteTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        // first include all the normal setUp operations
        parent::setUp();

        // now re-register all the roles and permissions
        
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions('show possessions');

    }

    public function testRouteIndexWithoutAutentication()
    {
            $response = $this->get('/possessions');
            $response->assertStatus(403);
        
    }

    public function test_Route_Index_With_Autentication_But_Not_Permissions()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/possessions');
        $response->assertStatus(403);
        
    }

    public function test_Route_Index_With_Autentication_And_Permissions()
    {
        Permission::create(['name' => 'list possessions']);
        $user = factory(User::class)->create();
        $user->givePermissionTo('list possessions');
        
        $response = $this->actingAs($user)
            ->get('/possessions');
        $response->assertStatus(200);
    }

    public function test_List_Only_UserPossessions_Index_With_Autentication_And_Permissions()
    {
        Permission::create(['name' => 'list possessions']);
        $user = factory(User::class)->create();
        $user->givePermissionTo('list possessions');

        $portfolio = factory(Portfolio::class)->create();
        $possession = factory(Possession::class)->create([
            'portfolio_id' => $portfolio->id,
        ]);
        $user->portfolios()->attach($portfolio->id);

        $otherportfolio = factory(Portfolio::class)->create();
        $otherpossession = factory(Possession::class)->create([
            'portfolio_id' => $otherportfolio->id,
        ]);
        $this->assertTrue($portfolio->possessions->contains($possession));
        $this->assertTrue($user->portfolios->find($portfolio)->possessions->contains($possession));
        $this->assertFalse($user->portfolios->find($portfolio)->possessions->contains($otherpossession));
       
    }

    

}
