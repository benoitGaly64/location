<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions for Possessions
        Permission::create(['name' => 'list possessions']);
        Permission::create(['name' => 'show possessions']);
        Permission::create(['name' => 'create possessions']);
        Permission::create(['name' => 'edit possessions']);
        Permission::create(['name' => 'delete possessions']);

        Permission::create(['name' => 'list portfolios']);
        Permission::create(['name' => 'show portfolios']);
        Permission::create(['name' => 'create portfolios']);
        Permission::create(['name' => 'edit portfolios']);
        Permission::create(['name' => 'delete portfolios']);
        
        
        
    }
}
