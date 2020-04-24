<?php

namespace Tests\Feature\Relations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Spatie\Permission\Models\Permission;
use App\Portfolio;
use App\Possession;
use App\User;

class PortfolioTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Portfolio_Has_Possessions()
    {
        $portfolio = factory(Portfolio::class)->create();
        $possession = factory(Possession::class)->create([
            'portfolio_id' => $portfolio->id,
        ]);

        $this->assertTrue($portfolio->possessions->contains($possession));
       
    }
    public function test_Portfolio_Belongs_To_Users()
    {
        $user = factory(User::class)->create();

        $portfolio = factory(Portfolio::class)->create();
        $portfolio->users()->attach($user->id);

        $this->assertTrue($portfolio->users->contains($user));
       
    }
}
