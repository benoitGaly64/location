<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proprietaire = Role::create(['name' => 'proprietaire']);
        $proprietaire->givePermissionTo(
            'show profile',
            'edit profile',

            'list possessions',
            'show possessions',
            'create possessions',
            'edit possessions',
            'delete possessions',

            'list owner',
            'show owner',
            'create owner',
            'edit owner',

            'list portfolios',
            'show portfolios',
            'create portfolios',
            'edit portfolios',
            'delete portfolios',

        );

        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('list possessions','show possessions','show profile','edit profile');
        $role1->givePermissionTo('list portfolios','show portfolios','show profile','edit profile');
        
        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo(
            'list possessions',
            'show possessions',
            'create possessions',
            'edit possessions',
            'delete possessions',
            
            'show profile',
            'edit profile',
            
            'list owner',
            'show owner',
            'create owner',
            'edit owner',
            'delete owner'
        );
        $role2->givePermissionTo('list portfolios','show portfolios','create portfolios','edit portfolios','delete portfolios','show profile','edit profile');

        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

    }
}
